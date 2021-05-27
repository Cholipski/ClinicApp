@extends('admin.layouts.master')


@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success d-flex" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::has('errmessage'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('errmessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Edycja danych lekarza</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/admin/doctor">Lista lekarzy</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="/admin/doctor">{{ $user->first_name }} {{ $user->last_name }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <form method="post" action="{{ route('doctor.update', $user->id) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-lg-1 d-none d-lg-block" style="min-height: 600px"></div>
                <div class="col-lg-3" style="min-height: 600px">
                    <div class="card" style="min-height: 600px">
                        <div class="card-header justify-content-center">
                            <h3>Dane lekarza</h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img class="rounded-circle mt-50" width="150px" height="150px"
                                    src="{{ asset('images') }}/{{ $user->image }}">
                                <h5 class="font-weight-bold mt-10">{{ $user->first_name }}
                                    {{ $user->last_name }}</h5>
                                <span class="text-black-50">{{ $user->education }}</span>
                                <span class="text-black-50">{{ $user->phone_number }}</span>
                                <span class="text-black-50">{{ $user->address }}</span>
                                <span class="text-black-50">{{ $user->specialist }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" style="min-height: 600px">
                    <div class="card text-center" style="min-height: 600px">
                        <div class="card-header justify-content-center">
                            <h3>Edycja danych lekarza</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">Imię</label>
                                    <input type="text" class="form-control" name="first_name" id="firstName"
                                        value="{{ $user->first_name }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Naziwsko</label>
                                    <input type="text" class="form-control" name="last_name" id="lastName"
                                        value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="edu">Wykształcenie</label>
                                    <input type="text" class="form-control" name="education" id="edu"
                                        value="{{ $user->education }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phoneNumber">Numer telefonu</label>
                                    <input type="text" class="form-control" name="phone_number" id="phoneNumber"
                                        value="{{ $user->phone_number }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cityAdress">Adres zamieszkania</label>
                                <input type="text" class="form-control" name="address" id="cityAdress"
                                    value="{{ $user->address }}">
                            </div>
                            <div class="form-group">
                                <label for="about">O lekarzu</label>
                                <textarea class="form-control" name="description" id="about"
                                    style="height:160px;">{{ $user->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-secondary">Zapisz zmiany</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
