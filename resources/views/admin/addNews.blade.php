@extends('layouts.app')
@section('title','Админка - создать новость')
@section('admin')
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Меню админа
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.add') }}">
                Добавить новость
            </a>
            <a class="dropdown-item" href="{{ route('admin.json') }}">
                Скачать новости (Json)
            </a>
        </div>
    </li>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Создать новость</h1>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавление новости</div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.add')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Название</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Текст</label>
                            <div class="col-md-6">
                                <textarea id="text" type="textfield" class="form-control" name="text" required>{{ old('text') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Категория</label>
                            <div class="col-md-6">
                                <select class="form-select form-control" aria-label="Category items" name="category_id" id="category_id" required>
                                    <option selected hidden>Категория</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item['id']}}" id="{{$item['id']}}" @if(old('category') == $item['id']) selected @endif>{{$item['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
