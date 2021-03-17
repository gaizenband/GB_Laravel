@extends('layouts.app')
@section('title','Админка - работа с пользователями')
@section('admin')
    @include('admin.adminMenu')
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Пользователи</h1>
        </div>
    </div>

    <div class="container d-flex flex-column">
        <div class="container d-flex justify-content-around flex-wrap">
            @forelse($users as $item)
                <form method="POST" action="{{route('admin.users.destroy',$item->id)}}">
                    @csrf
                    @method('DELETE')
                    <div class="card mb-5" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">{{$item->email}}</p>
                        </div>
                        <div class="d-flex justify-content-around mb-2">
                            <a class="btn btn-success" href="{{route('user.edit',$item->id)}}">Edit</a>
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </div>

                        <div class="form-group row">
                            <label for="isAdmin" class="col-md-4 col-form-label text-md-right">Админ</label>
                            <div class="col-md-6 d-flex align-items-center">
                                <input type="checkbox" value="1" name="isAdmin" @if ($item->isAdmin || old('isAdmin')) checked @endif onchange="changeAdminAttribute({{$item->id}})">
                            </div>
                        </div>

                    </div>
                </form>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
        <div class="align-self-center">
            {{ $users->links() }}

        </div>
    </div>
    <script src="{{ asset('js/adminAttrChange.js') }}" defer></script>
@endsection
