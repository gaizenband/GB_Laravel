@extends('layouts.app')
@section('title','Админка - создать новость')
@section('admin')
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Меню админа
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.news.create') }}">
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
                    <form method="POST" action="@if ($news->id){{ route('admin.news.update', $news) }}@else{{ route('admin.news.store') }}@endif" enctype="multipart/form-data">
                        @csrf
                        @if ($news->id) @method('PUT') @endif

                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Название</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="@if (!$news->id){{ old('title') }}@else{{ $news->title }}@endif" required autofocus>
                            </div>
                        </div>

                        @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Текст</label>
                            <div class="col-md-6">
                                <textarea id="text" type="textfield" class="form-control" name="text" required>@if (!$news->id){{ old('text') }}@else{{ $news->text }}@endif</textarea>
                            </div>
                        </div>

                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Категория</label>
                            <div class="col-md-6">
                                <select class="form-select form-control" aria-label="Category items" name="category_id" id="category_id" required>
                                    <option selected hidden value="0">Категория</option>

                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}" id="{{$item->id}}" @if (old('category_id') == $item->id || $news->category_id == $item->id) selected @endif>{{$item->title}}</option>
                                    @endforeach
                                    <option value="123">Error</option>
                                </select>
                            </div>
                        </div>

                        @error('isPrivate')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="isPrivate" class="col-md-4 col-form-label text-md-right">Private</label>
                            <div class="col-md-6 d-flex align-items-center">
                                <input type="checkbox" value="1" id="isPrivate" name="isPrivate" @if ($news->isPrivate || old('isPrivate')) checked @endif>
                            </div>
                        </div>

                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6 d-flex align-items-center">
                                <input type="file" id="image" name="image">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    @if ($news->id)Изменить@elseСохранить@endif
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
