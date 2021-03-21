@extends('layouts.app')
@section('title','Категории')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Категории новостей</h1>
    </div>
</div>
<div class="container d-flex justify-content-around flex-wrap">
    @forelse($categories as $item)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$item->title}}</h5>
                <a href="{{route('category.news.news', $item->slug)}}" class="btn btn-primary">Вперед!</a>
            </div>
        </div>
    @empty
        <p>Нет категорий</p>
    @endforelse
</div>
@endsection
