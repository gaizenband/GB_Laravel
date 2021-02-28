@extends('layouts.app')
@section('title','Новости')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Новости из категории "{{$news[1]['title']}}"</h1>
        </div>
    </div>
    <div class="container d-flex justify-content-around">
       @forelse($news[0] as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$item['title']}}</h5>
                    <p class="card-text">{{$item['text']}}</p>
                    <a href="{{route('category.news.show', [$news[1]['slug'], $item['id']])}}" class="btn btn-primary">Вперед!</a>
                </div>
            </div>
        @empty
            <p>Нет новостей</p>
       @endforelse
    </div>
@endsection