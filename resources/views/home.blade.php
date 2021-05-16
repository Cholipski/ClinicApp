@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <a class="patient-menu" href="{{route('profile.index')}}">
                <div class="card">
                    <div class="card-header">
                        <i class="far fa-id-card main-icon"></i>
                    </div>
                    <div class="card-body">
                        Profil pacjenta
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="patient-menu" href="">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-history main-icon"></i>
                    </div>
                    <div class="card-body">
                        Historia wizyt
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="patient-menu" href="{{route('new_appointment.index')}}">
                <div class="card">
                    <div class="card-header">
                        <i class="far fa-calendar-alt main-icon"></i>
                    </div>
                    <div class="card-body">
                        Umów wizytę
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-lg-4">
            <a class="patient-menu" href="{{route('cancel_appointment.index')}}">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-window-close main-icon"></i>
                    </div>
                    <div class="card-body">
                        Odwołaj wizytę
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="patient-menu" href="{{route('prescription.index')}}">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-prescription-bottle main-icon"></i>
                    </div>
                    <div class="card-body">
                        Recepty
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="patient-menu" href="">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-thumbs-up main-icon"></i>
                    </div>
                    <div class="card-body">
                        Zalecenia
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
