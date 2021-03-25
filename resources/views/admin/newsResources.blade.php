@extends('layouts.app')
@section('title','Админка - работа с пользователями')
@section('admin')
    @include('admin.adminMenu')
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Ресурсы для загрузки новостей</h1>
        </div>
    </div>

    <div class="container d-flex flex-column">
        <div class="container d-flex justify-content-around flex-wrap">
            @forelse($resources as $item)
                <form method="POST" action="{{route('admin.resources.destroy',$item)}}">
                    @csrf
                    @method('DELETE')
                    <div class="card mb-5" style="width: 18rem;">
                        <div class="card-body">
                            <h3>{{$item->title}}</h3>
                            <p>{{$item->link}}</p>
                        </div>
                        <div class="d-flex justify-content-around mb-2">
                            <a class="btn btn-success" href="{{route('admin.resources.edit',$item->id)}}">Edit</a>
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </div>
                    </div>
                </form>
            @empty
                <p>Нет ресурсов</p>
            @endforelse
        </div>
    </div>
@endsection
