@extends('admin.layouts.master')

@section('content')
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="patient_table" class="table">
                        <thead>
                        <tr>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Email</th>
                            <th>Adres</th>
                            <th>Telefon</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->first_name}}</td>
                            <td>{{$patient->last_name}}</td>
                            <td>{{$patient->email}}</td>
                            <td>{{$patient->address}}</td>
                            <td>{{$patient->phone_number}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-success"><a href="{{ URL::to('/pdf-download') }}">Zapisz listę</a></button>
                </div>
            </div>
        </div>

@endsection