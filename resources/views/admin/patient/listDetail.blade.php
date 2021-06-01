@extends('admin.layouts.master')

@section('content')

        <div class="card">
            <div class="card-header">
                Dane wizyty
            </div>
            <div class="card-body">
                                    <div class="col-md-4 py-1">
                                        <b>Imię: </b>{{$patients[0]['name']}}
                                    </div>
                                    <div class="col-md-4">
                                        <b>Nazwisko: </b>{{$patients[0]['last_name']}}
                                    </div>
                                    <div class="col-md-4 py-1">
                                        <b>Doktor: </b> {{$doctor[0]['name']}} {{$doctor[0]['last_name']}}
                                    </div>
                                    <div class="col-md-4">
                                        <b>Data: </b>{{$bookings[0]['date']}}
                                    </div>
                                    <div class="col-md-4">
                                        <b>Godzina: </b>{{$bookings[0]['time']}}
                                    </div>
                                    <div class="col-md-4">
                                        <b>Objawy: </b>{{$bookings[0]['symptoms']}}
                                    </div>
                                    <div class="col-md-4">
                                            @if(count($prescript)>0)
                                                <b>Recepta:</b> Wystawiona
                                            @else
                                                <b>Recepta:</b> Brak
                                            @endif
                                    </div>
                        <div class="col-md-4 py-3">
                            <a href="{{ route('admin.patient.list') }}" class="btn btn-dark">Powrót</a>
                        </div>
            </div>
        </div>




@endsection
