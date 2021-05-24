@extends('admin.layouts.master')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card d-flex justify-content-center align-items-center" style="min-height: 100px;">
                        <h2 class="text-bold" style="font-size: 2rem; font-weight: 900 ">Szybki przegląd</h2>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="height: 120px; background: linear-gradient(180deg, #FFFFFF 92%, #d9534f 8%);">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Liczba dzisiejszych pacjentów</h6>
                                    <h2>{{ $amount }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-injured"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="height: 120px; background: linear-gradient(180deg, #FFFFFF 92%, #5cb85c 8%);">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Liczba lekarzy</h6>
                                    <h2>{{ $doctor_amount }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="height: 120px; background: linear-gradient(180deg, #ffffff 92%, #f0ad4e 8%);">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Liczba wizyt do zaakceptowania</h6>
                                    <h2>{{ $amount_appointments }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="height: 120px; background: linear-gradient(180deg, #FFFFFF 92%, #5bc0de 8%);">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Ogólna liczba pacjentów</h6>
                                    <h2>{{ $users_amount }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="min-height: 422px;">
                        <div class="card-header">
                            <h3>Dzisiejsza lista pacjentów do przyjęcia</h3>
                            <div class="card-header-right">
                            </div>
                        </div>
                        <div class="card-body" style="margin-top: 1.5rem">
                            <div class="w-100" style="width:100%; height:270px; overflow-x: auto; display: flex; flex-wrap: wrap; flex-direction: column;">
                                @for($i =0; $i<count($patient);$i++)
                                    <div class="card animate-pulse ml-3" style="width: 12rem; height: 17rem">
                                        <div class="card-body text-center border">
                                        <h5 class="card-title font-weight-bold border-bottom p-3">{{$patient[$i]['name']}} {{$patient[$i]['last_name']}}</h5>
                                        <p class="card-text">Lekarz: {{$doctor[$i]['doctor_name']}} {{$doctor[$i]['doctor_last_name']}}</p>
                                        <p class="card-text">Przjęcie pacjenta o godzinie: {{$patient[$i]['time']}}</p>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="min-height: 422px;">
                        <div class="card-header justify-content-center">
                            <h3 >Zegar</h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div id="MyClockDisplay" onload="showTime()" style="margin-top: 5rem;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-3">Wizyty do zaakceptowania</h3>
                <div class="table-responsive">
                    <table class="table table-hover" style="margin-top: 2.5rem">
                        <thead class="thead-dark">
                            <tr>
                                <th>Imię i naziwsko pacjenta</th>
                                <th>Doktor</th>
                                <th>Data wizyty</th>
                                <th>Godzina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i =0; $i<count($patient);$i++)
                                <tr>
                                    <td>{{$patient[$i]['name']}} {{$patient[$i]['last_name']}}</td>
                                    <td>{{$doctor[$i]['doctor_name']}} {{$doctor[$i]['doctor_last_name']}}</td>
                                    <td>{{$patient[$i]['date']}}</td>
                                    <td>{{$patient[$i]['time']}}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
