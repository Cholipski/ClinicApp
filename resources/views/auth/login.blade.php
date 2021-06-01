@extends('layouts.app')

@section('content')

@if(session()->has('error'))
<div class="alert alert-danger">{{session()->get('error')}}</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif



<div class="container"> <br> <br>
    <div class="row">
        <div class="col">
            <img src="{{URL::asset('/images/dr.png')}}" width="450" height="450">
        </div>
        <div class="col">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <br> <br> <br>
                <h3>Zaloguj się:</h3> <br>
                <div class="container col-md-8 offset-md-0">
                    <i class="fa fa-users"></i>
                    <label for="email">{{ __('Adres e-mail:') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <br>
                    <i class="fa fa-key"></i>
                    <label for="">{{ __('Hasło:') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
                <br>
                <div class="col-md-8 offset-md-0">
                    <button type="submit" class=" btn-login btn-dark">
                        {{ __('Zaloguj') }}
                    </button>
                    @if (Route::has('password.request'))
                    <a id="bt" class="btn btn-link bt" href="{{ route('password.request') }}">
                        {{ __('Zapomniałeś hasła?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    @endsection