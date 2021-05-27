@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zweryfikuj adres e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Wysłaliśmy ponownie link aktywacyjny') }}
                        </div>
                    @endif

                    {{ __('Przed korzystaniem z naszej aplikacji potwierdz swój adres e-mail') }}
                    {{ __('Jeśli nie otrzymałeś wiadomość e-mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kliknij tutaj aby wysłać jeszcze raz ') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
