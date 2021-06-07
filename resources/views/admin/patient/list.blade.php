@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Pacjenci</h5>
                        <span>Historia wizyt</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            Historia wizyt
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
                            <th>data</th>
                            <th>czas</th>
                            <th>doktor</th>
                            <th>pacjent</th>
                            <th>zalecenie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->doctorName }} {{ $booking->doctorLastName }}</td>
                                <td>{{ $booking->patientName }} {{ $booking->patientLastName }}</td>
                                <td>{{ $booking->recommendation }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
