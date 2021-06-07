@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        @if (Session::has('errmessage'))
            <div class="alert alert-danger">
                {{ Session::get('errmessage') }}
            </div>
        @endif
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Godziny przyjęć</h5>
                        <span>Lista wizyt</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Lista wizyt
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('appointment.check') }}" method="post">@csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Wybierz datę

                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control datetimepicker-input" id="datepicker"
                                data-toggle="datetimepicker" data-target="#datepicker" name="date">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Wybierz lekarza
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
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <button type="submit" class="btn btn-primary">Pokaż wizyty</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-header">

                @if (isset($date))
                    <b>Godziny wizyt na dzień {{ $date }}</b>
                @else
                    Godziny wizyt
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Identyfikator</th>
                        <th>Godzina</th>
                        <th>Status</th>
                    </thead>
                    <tbody>

                        @if (isset($date))
                            @foreach ($times as $time)
                                @if ($time->status == 0)
                                    <tr>
                                        <th scope="row">{{ $time->id }}</th>
                                        <td>{{ $time->time }}</td>
                                        <td class="bg-success"> Wolny </td>
                                    </tr>
                                @else
                                    <tr>
                                        <th scope="row">{{ $time->id }}</th>
                                        <td>{{ $time->time }}</td>
                                        <td class="bg-danger"> Zajęty </td>
                                    </tr>
                                @endif

                            @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
