@extends('admin.layouts.master')


@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    @if (Session::has('errmessage'))
        <div class="alert alert-danger">
            {{ Session::get('errmessage') }}
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
    <div class="container rounded bg-white mt-5 mb-5">
        <form method="post" action="{{ route('doctor.update', $user->id) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-50" width="150px" height="150px"
                            src="{{ asset('images') }}/{{ $user->image }}">
                        <h5 class="font-weight-bold mt-10">{{ $user->first_name }}
                            {{ $user->last_name }}</h5>
                        <span class="text-black-50">{{ $user->email }}</span>
                        <span class="text-black-50">{{ $user->specialist }}</span>
                    </div>
                </div>
                <div class="col-md-9 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edycja danych lekarza</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Imię</label><input type="text" name="first_name"
                                    class="form-control" value="{{ $user->first_name }}"></div>
                            <div class="col-md-6"><label class="labels">Nazwisko</label><input type="text" name="last_name"
                                    class="form-control" value="{{ $user->last_name }}"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row-md-12">
                                    <label class="labels">Wykształcenie</label><input type="text" name="education"
                                        class="form-control" value="{{ $user->education }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><label class="labels">Numer telefonu</label><input type="text"
                                            name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><label class="labels">Adres zamieszkania</label><input
                                            type="text" name="address" class="form-control" value="{{ $user->address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span>O lekarzu</span>
                                <div class="d-flex justify-content-between align-items-center experience">
                                    <textarea class="form-control" name="description"
                                        style="height:160px;">{{ $user->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-25 text-center"><button class="btn btn-dark profile-button" type="submit">Zapisz
                                zmiany</button></div>
                    </div>
                </div>


            </div>
        </form>
    </div>



@endsection
