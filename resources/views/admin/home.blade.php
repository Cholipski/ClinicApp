@extends('admin.layouts.master')
@section('content')
    liczba pacjentów {{ $users_amount }}<br>
    liczba lekarzy {{ $doctor_amount }}<br>
    liczba wizyt dzisiaj wszystkich {{ $amount }}<br>
    liczba wizyt do zaakceptowania {{ $amount_appointments }}<br>
    @for($i =0; $i<count($patient);$i++)
        <tr>
            <td>{{$patient[$i]['name']}}</td>
            <td>{{$patient[$i]['last_name']}}</td>
            <td>{{$patient[$i]['date']}}</td>
            <td>{{$patient[$i]['time']}}</td>
            <td>{{$doctor[$i]['doctor_name']}}</td>
            <td>{{$doctor[$i]['doctor_last_name']}}</td>
{{--            <td></td>--}}
{{--            <td>{{$patient[$i]['idp']}}</td>--}}
{{--            <td>{{$doctor[$i]['idd']}}</td>--}}

        </tr>
        <br>
    @endfor

@endsection
