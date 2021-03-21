@extends('layouts.app')
@section('title','Изменение профиля')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Изменить профиль</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update',$user) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" hidden value="{{$user->id}}" name="id">
                            <div class="form-group row">
                                @error('name')
                                <div class="alert alert-danger" style="margin: 0 auto 10px auto">{{ $message }}</div>
                                @enderror
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                @error('email')
                                <div class="alert alert-danger" style="margin: 0 auto 10px auto">{{ $message }}</div>
                                @enderror
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">
                                </div>
                            </div>
                        @if(Auth::user()->id == $user->id)
                            <div class="form-group row">
                                @error('password')
                                <div class="alert alert-danger" style="margin: 0 auto 10px auto">{{ $message }}</div>
                                @enderror
                                <label for="password" class="col-md-4 col-form-label text-md-right">Old password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                @error('password_confirmation')
                                <div class="alert alert-danger" style="margin: 0 auto 10px auto">{{ $message }}</div>
                                @enderror
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">New password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                </div>
                            </div>
                        @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
