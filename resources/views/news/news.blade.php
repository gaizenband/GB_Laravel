@extends('layouts.app')
@section('title','Новости')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">@isset($category)Новости из категории "{{$category->title}}"@endisset @empty($category)Все новости@endempty </h1>
        </div>
    </div>



    <div class="container d-flex flex-column">
        <div class="container d-flex justify-content-around flex-wrap">
            @forelse($news as $item)

                <div class="card mb-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        @if(!$item->isPrivate || Auth::check())
                        <p class="card-text">{{$item->text}}</p>
                            <a href="{{route('category.news.show', [collect(request()->segments())->last(), $item->id])}}" class="btn btn-primary">Вперед!</a>
                        @else
                            <p>Зарегистрируйтесь для просмотра</p>
                        @endif
                    </div>
                </div>

            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
        <div class="align-self-center">
            {{ $news->links() }}

        </div>
    </div>
@endsection
