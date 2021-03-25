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
                <form method="POST" action="@if ($item->id){{ route('admin.resources.update', $item) }}@else{{ route('admin.resources.store') }}@endif">
                    @csrf
                    @if ($item->id) @method('PUT') @endif
                    <div class="card mb-5" style="width: 18rem;">
                        <div class="card-body">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="title">Название</label>
                            <input type="text" value="{{$item->title}}" name="title" id="title">
                            @error('link')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="link">Ссылка</label>
                            <input type="text" value="{{$item->link}}" name="link" id="link">
                        </div>
                        <div class="d-flex justify-content-around mb-2">
                            <input class="btn btn-success" type="submit" value="Save">
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
