@extends('layouts.app')

@section('content')
<div class="container card-register"> <br> <br>
    <div class="row">
        <div class="col">
            <img src="{{URL::asset('/images/dr.png')}}" width="450" height="450">
        </div>
        @if(Session::has('notification'))
            @if(Session::get('notification') == "Check your email")
                <div class="row">
                    <div class="col-lg-5">

                    </div>
                    <div class="col-lg-7">
                        Konto zostało utworzone. Sprawdź swój e-mail w celu potwierdzenia
                    </div>
                </div>
            @endif
        @else
          <form method="POST" action="{{ route('register') }}" class="col-xs-12 col-sm-12 col-md-6">
              @csrf
              <h2>Zarejestruj się:</h2>
              <div class="form-group">
                  <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="Imię:">
                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>

              <div class="form-group">
                  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Nazwisko:">
                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

              </div>

              <div class="form-group">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adres e-mail:">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

              </div>
              <div class="form-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Hasło:">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

              </div>
              <div class="form-group">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Potwierdź hasło:">
              </div>
              <div class="form-group">
                  <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                      <option value="">Proszę wybrać płeć</option>
                      <option value="male">Mężczyzna</option>
                      <option value="female">Kobieta</option>
                  </select>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-0">
                      <button type="submit" class="btn-login">
                          {{ __('Utwórz konto') }}
                      </button>
                  </div>
          </form>
        @endif
    </div>
</div>
@endsection
