@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-activ">
                <div class="card-header-verify">
                <div class="col-lg-12 mt-3" style="text-align:center;">
                <img class="mt-5"src="{{URL::asset('/images/logo.png')}}" width="60" height="60">
                <h1 class="mt-2">Przychodnia Kortowo</h1>
                
                </div>
                </div>
                

                <div class="card-body card-verify">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Wysłaliśmy ponownie link aktywacyjny') }}
                        </div>
                    @endif

                    {{ __('Przed korzystaniem z naszej aplikacji potwierdz swój adres e-mail') }}<br>
                    {{ __('Jeśli nie otrzymałeś wiadomość e-mail, kliknij w przycisk poniżej aby wysłać link aktywacyjny ponownie') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}"><br>
                        @csrf
                        <button type="submit" class="btn-verify p-0 m-0 mt-4">Wyślij link aktywacyjny</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
