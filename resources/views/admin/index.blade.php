@extends('layouts.app')
@section('title','Админка')
@section('admin')
    <li class="nav-item dropdown {{request()->routeIs('admin.index') ? 'active':''}}">
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
        <h1 class="display-4">Админка</h1>
    </div>
</div>
@endsection
