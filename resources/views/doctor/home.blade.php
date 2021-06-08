@extends('admin.layouts.master')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card d-flex justify-content-center align-items-center" style="min-height: 100px;">
                        <h2 class="text-bold mt-15" style="font-size: 1.5rem; font-weight: 700;">Dzień dobry,
                            doktorze {{ $doc->last_name }}
                        </h2>
                        <p class="text-muted">Tu znajdziesz wszystkie wstępne informacje aby
                            wspaniale zacząć dzień</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget"
                        style="height: 120px; background: linear-gradient(180deg, #FFFFFF 92%, #d9534f 8%);">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Liczba dzisiejszych pacjentów do przyjęcia</h6>
                                    <h2>{{ $bookings_1 }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-injured"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget"
                        style="height: 120px; background: linear-gradient(180deg, #FFFFFF 92%, #5cb85c 8%);">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Liczba pacjentów w bazie</h6>
                                    <h2>{{ $total }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget"
                        style="height: 120px; background: linear-gradient(180deg, #ffffff 92%, #f0ad4e 8%);">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Liczba dzisiejszych przyjętych pacjentów</h6>
                                    <h2>{{ $bookings_2 }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card text-center" style="min-height: 422px">
                        <div class="card-header justify-content-center">
                            <h3>Następny pacjent do przyjęcia</h3>
                        </div>
                        @if (isset($next))
                            <div class="card-body">
                                <h3 style="margin-top: 4rem">{{ $next->first_name }} {{ $next->last_name }}</h3>
                                <p class="card-text" style="font-size: 2rem; font-weight: 400">{{ $next->time }}</p>
                                <a href="{{route('doctor.patient', $next->id)}}" class="btn btn-secondary w-20 h-10" style="margin-top: 3rem;">Karta
                                    pacjenta</a>
                            </div>
                        @else
                            <div class="card-body">
                                <h3 style="margin-top: 6rem">Nie ma pacjenta w kolejce</h3>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="min-height: 422px;">
                        <div class="card-header justify-content-center">
                            <h3>Zegar</h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div id="MyClockDisplay" onload="showTime()" style="margin-top: 5rem;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="min-height: 422px;">
                        <div class="card-header">
                            <h3>Dzisiejsza lista pacjentów do przyjęcia</h3>
                            <div class="card-header-right">
                            </div>
                        </div>

                        <div class="card-body" style="margin-top: 1.5rem">
                            <div class="w-100"
                                style="width:100%; height:270px; overflow-x: auto; display: flex; flex-wrap: wrap; flex-direction: column;">

                                @foreach ($patients as $patient)
                                    <div class="card animate-pulse ml-3" style="width: 12rem; height: 14rem">
                                        <div class="card-body text-center border">
                                            <h5 class="card-title font-weight-bold border-bottom p-3">
                                                {{ $patient->name }} {{ $patient->last_name }}</h5>
                                            <p class="card-text">Lekarz: {{ $doc->first_name }} {{ $doc->last_name }}
                                            </p>
                                            <p class="card-text">Przyjęcie pacjenta o godzinie: {{ $patient->time }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










@endsection
