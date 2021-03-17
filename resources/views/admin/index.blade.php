@extends('layouts.app')
@section('title','Админка')
@section('admin')
    @include('admin.adminMenu')
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Админка</h1>
    </div>
</div>

<div class="container d-flex flex-column">
    <div class="container d-flex justify-content-around flex-wrap">
        @forelse($items as $item)
            <form method="POST" action="@if(!$item->slug){{route('admin.news.destroy',$item->id)}}@else {{route('admin.category.destroy',$item->id)}}@endif">
                @csrf
                @method('DELETE')
                <div class="card mb-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        @if($item->text)<p class="card-text">{{$item->text}}</p>@endif
                    </div>
                    <div class="d-flex justify-content-around mb-2">
                        <a class="btn btn-success" href="@if(!$item->slug){{route('admin.news.edit',$item->id)}}@else {{route('admin.category.edit',$item->id)}}@endif">Edit</a>
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </div>

                </div>
            </form>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
    <div class="align-self-center">
        {{ $items->links() }}

    </div>
</div>

@endsection
