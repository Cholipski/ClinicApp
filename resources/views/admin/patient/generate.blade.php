@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Wizyty</h5>
                        <span>Generuj listę pacjentów</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            Generuj liste pacjentów
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @if (Session::has('errmessage'))
            <div class="alert alert-danger">
                {{ Session::get('errmessage') }}
            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <form action="{{ route('generate.list') }}" method="post">@csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Wybierz lekarza i generuj listę na dzisiejszy dzień
                        </div>
                        <div class="card-body">
                            <select class="form-control @error('role_id') is-invalid @enderror" name="doctor_id">
                                <option value="">Wybierz lekarza</option>
                                @foreach (App\Models\User::where('role_id', '=', '1')->get() as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->first_name }}
                                        {{ $doctor->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark">Zapisz listę na dzisiejszy dzień</a></button>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Wszyscy pacjenci zarejestrowani na dzisiejszy dzień
                </div>
                <div class="card-body">
                    <table id="patient_table" class="table">
                        <thead>
                            <tr>
                                <th>Pacjent</th>
                                <th>Lekarz</th>
                                <th>Godzina</th>
                                <th>Objawy</th>
                                <th>Telefon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>
                                        {{ App\Models\User::where('id', $booking->user_id)->value('first_name') }}
                                        {{ App\Models\User::where('id', $booking->user_id)->value('last_name') }}
                                    </td>
                                    <td>
                                        {{ App\Models\User::where('id', $booking->doctor_id)->value('first_name') }}
                                        {{ App\Models\User::where('id', $booking->doctor_id)->value('last_name') }}
                                    </td>
                                    <td>{{ $booking->time }}</td>
                                    <td>{{ $booking->symptoms }}</td>
                                    <td>{{ App\Models\User::where('id', $booking->user_id)->value('phone_number') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

@endsection
