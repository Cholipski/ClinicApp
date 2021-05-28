@extends('admin.layouts.master')
@section('content')
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
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->id}}</td>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->last_name}}</td>
                            <td>{{$patient->time}}</td>
                            <td>
                                <a href="{{ route('doctor.appointment',$patient->id) }}" class="btn btn-dark">Rozpocznij</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
