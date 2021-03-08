@extends('layouts.app')
@section('title','Новости')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Новости</h1>
        </div>
    </div>
    <div class="container card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{$news->title}}</h5>
            <img class="card-img" src="{{!$news->image ? asset('storage/default.jpeg') : $news->image}} " >
            <p class="card-text">{{$news->text}}</p>
        </div>
    </div>
@endsection
