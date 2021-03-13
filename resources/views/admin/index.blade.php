@extends('layouts.app')
@section('title','Админка')
@section('admin')
    <li class="nav-item dropdown {{request()->routeIs('admin.index') ? 'active':''}}">
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
        <h1 class="display-4">Админка</h1>
    </div>
</div>

<div class="container d-flex flex-column">
    <div class="container d-flex justify-content-around flex-wrap">

        @forelse($news as $item)
            <form method="POST" action="{{route('admin.news.destroy',$item->id)}}">
                @csrf
                @method('DELETE')
                <div class="card mb-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->text}}</p>
                    </div>
                    <div class="d-flex justify-content-around mb-2">
                        <a class="btn btn-success" href="{{ route('admin.news.edit',$item->id) }}">Edit</a>
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </div>

                </div>
            </form>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
    <div class="align-self-center">
        {{ $news->links() }}

    </div>
</div>

@endsection
