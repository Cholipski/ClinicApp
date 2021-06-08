@extends('admin.layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card text-center" style="min-height: 422px">
                    <div class="card-header justify-content-center">
                        <h3>Podstawowe informacje o pacjencie</h3>
                    </div>
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="row w-100 justify-content-around">
                            <div class="col-md-6">
                                <img class="rounded-circle" width="150px" height="184px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" />
                            </div>
                            <div class="col-md-6">
                                @foreach ($patients as $patient)
                                    <p style="margin-top: 1rem">Imię: {{ $patient->first_name }}</p>
                                    <p>Naziwsko : {{ $patient->last_name }}</p>
                                    <p>Numer telefonu: {{ $patient->phone_number }}</p>
                                    <p>Adres zamieszkania: {{ $patient->address }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card text-center" style="min-height: 422px">
                    <div class="card-header justify-content-center">
                        <h3>Alergie pacjenta</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center" style="flex-wrap:nowrap">
                        @foreach ($patients as $patient)
                            <p>{{ $patient->alergies }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card" style="min-height: 300px">
                    <div class="card-header justify-content-center">
                        <h3>Podstawowe informacje o pacjencie</h3>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" style="margin-top: 2.5rem">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Data</th>
                                        <th>Czas</th>
                                        <th>Objawy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->time }}</td>
                                            <td>{{ $booking->symptoms }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card" style="min-height: 300px">
                    <div class="card-header justify-content-center">
                        <h3>Podstawowe informacje o pacjencie</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" style="margin-top: 2.5rem">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Data</th>
                                        <th>Kod</th>
                                        <th>Recepta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($prescriptions->count() > 0)
                                        @foreach ($prescriptions as $prescription)
                                            <tr>
                                                <th style="font-weight: normal">
                                                    Data: {{ $prescription->invoice_date }}
                                                </th>
                                                <th style="font-weight: normal">
                                                    Kod: {{ $prescription->access_code }}
                                                </th>
                                                <th style="font-weight: normal">
                                                    <button data-toggle="modal" data-data="{{ $prescription }}"
                                                        data-target="#showPrescriptionModal{{ $prescription->id }}"
                                                        class="btn btn-dark btnShowPrescription">Wyświetl receptę</button>
                                                    @include('doctor.prescriptionDetail',['doctor'=>auth()->user()])
                                                </th>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>Brak wystawionych recept</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
