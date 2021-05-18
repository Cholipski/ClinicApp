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
                        <th>Opcje</th>
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
                            <td>
                                <a href="{{route('patient.show',$patient->id)}}" class="btn btn-dark">KARTA PACJENTA</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

