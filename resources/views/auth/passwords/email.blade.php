@extends('layouts.app')

@section('content')

<div class="container"> <br> <br>
    <div class="row">
        <div class="col">
            <img src="{{URL::asset('/images/dr.png')}}" width="450" height="450" class="Avatar">
        </div>
        <div class="col">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <br> <br> <br>
                <h3>Zresetuj hasło:</h3> <br>
                <div class="container form-group col-md-8 offset-md-0">
                <i class="fa fa-envelope"></i>
                    <label for="email">{{ __('Podaj adres e-mail:') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button type="submit" class=" btn-login">
                        {{ __('Zresetuj hasło') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    @endsection