@extends('layouts.app')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('errmessage'))
        <div class="alert alert-danger">
            {{Session::get('errmessage')}}
        </div>
    @endif
    <div class="container rounded bg-white mt-5 mb-5">
        <form method="post" action="{{route('profile.store')}}">@csrf
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                        <span class="text-black-50">{{auth()->user()->email}}</span>
                        <span class="text-black-50">{{auth()->user()->pesel}}</span>
                        <span> </span>
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center tr"><span data-toggle="modal" data-target="#exampleModalCenter" style="width:100%" class="border px-3 p-1 text-center"><i class="fa fa-lock"></i>&nbsp;Zmień hasło</span></div><br>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edycja profilu</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Imię</label><input type="text" name="first_name" class="form-control" value="{{auth()->user()->first_name}}"></div>
                            <div class="col-md-6"><label class="labels">Nazwisko</label><input type="text" name="last_name" class="form-control" value="{{auth()->user()->last_name}}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Numer telefonu</label><input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}"></div>
                            <div class="col-md-12"><label class="labels">Adres zamieszkania</label><input type="text" name="address" class="form-control"  value=""></div></div>

                        <div class="mt-5 text-center"><button class="btn btn-dark profile-button" type="submit">Zapisz zmiany</button></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mt-4 p-3">
                        <div class="col-lg-12">
                            <span>Alergie</span>
                            <div class="d-flex justify-content-between align-items-center experience">
                                <div class="col-md-12"><textarea class="form-control" name="alergies" style="height:150px;">{{auth()->user()->alergies}}</textarea></div> <br>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 p-3">
                        <div class="col-lg-12">
                            <span>Przyjmowane leki</span>
                            <div class="d-flex justify-content-between align-items-center experience">
                                <div class="col-md-12"><textarea class="form-control" name="medicaments" style="height:150px;">{{auth()->user()->medicaments}}</textarea></div> <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
        <a href="{{ url('/') }}" class="btn btn-dark green col-md-1">Cofnij</a>  
    </div>
    
    
    
    
    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Zmień hasło</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="card card-outline-secondary">
                        <div class="card-body">
                            <form method="post" action="{{route('profile.changePassword')}}" class="form" role="form" autocomplete="off">@csrf
                                <div class="form-group">
                                    <input placeholder="Obecne hasło" type="password" class="form-control" name="old_password" id="inputPasswordOld" required="">
                                </div>
                                <div class="form-group">
                                    <input placeholder="Nowe hasło" type="password" class="form-control" name="new_password" id="inputPasswordNew" required="">
                                </div>
                                <div class="form-group">
                                    <input placeholder="Potwierdź hasło" type="password" class="form-control" name="re_password" id="inputPasswordNewVerify" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-center">Zmień</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
