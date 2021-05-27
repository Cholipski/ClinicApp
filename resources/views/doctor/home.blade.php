@extends('admin.layouts.master')
@section('content')
    dzisiaj - {{ $today  }}<br>
    ilosc pacjentow w bazie - {{ $total }}<br>
    imie - {{ $doc[0]['first_name'] }}<br>
    nazwisko  - {{ $doc[0]['last_name'] }}<br>
    bokings_1 - {{ $bookings_1 }}<br>
    bokings_0 - {{ $bookings_0 }}<br>
    @foreach($patients as $patient)
        <br>
        {{ $patient->name }}<br>
        {{ $patient->last_name }}<br>
        {{ $patient->time }}<br>
    @endforeach

    @if(isset($next))
        pierwszy w kolejce = {{$next->last_name}}{{$next->time}}
    @endif
@endsection

