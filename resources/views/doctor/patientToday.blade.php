@extends('admin.layouts.master')
@section('content')
    @foreach($patients as $patient)
        <tr>
            <td>{{$patient->first_name}}</td>
            <td>{{$patient->last_name}}</td>
            <td>{{$patient->date}}</td>
            <td>{{$patient->time}}</td>
            <td>{{$patient->phone_number}}</td>

        </tr>
    @endforeach
@endsection

