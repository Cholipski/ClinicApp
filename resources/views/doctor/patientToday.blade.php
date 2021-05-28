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
                        <h5>Dzisiejsze wizyty</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/doctor/home"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">Dzisiejsze wizyty</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="patient_table" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Godzina</th>
                            <th>Wizyta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->last_name }}</td>
                                <td>{{ $patient->time }}</td>
                                <td>
                                    <a href="{{ route('doctor.appointment', $patient->id) }}"
                                        class="btn btn-dark">Rozpocznij</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
