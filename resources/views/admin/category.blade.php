@extends('layouts.app')
@section('title','Админка - работа с категориями')
@section('admin')
    @include('admin.adminMenu')
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
                    <form method="POST" action="@if ($category->id){{ route('admin.category.update', $category) }}@else{{ route('admin.category.store') }}@endif" enctype="multipart/form-data">
                        @csrf
                        @if ($category->id) @method('PUT') @endif

                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Название</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?? $category->title ?? '' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    @if ($category->id)Изменить@elseСохранить@endif
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
