@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
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
                        <span>Utwórz na najbliższe tygodnie</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Utwórz wizyty na najbliższe tygodnie</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('weekly_appointment.store') }}" method="post">@csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    Wybierz datę początkową

                                </div>
                                <div class="col-lg-6">
                                    Pominąć soboty i niedziele ?

                                    (TAK/NIE) <input type="checkbox" name="weekend">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control datetimepicker-input" name="daterange" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Dla którego lekarza wygenerować wizyty?
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
            <div class="card">
                <div class="card-header">
                    Wybierz godziny dostępnych wizyt (30 mint pacjent + 5 minut przerwa)
                    <span style="margin-left: 500px">
                        Wszystkie
                        <input type="checkbox" onclick="for(c in document.getElementsByName('time[]'))
                                    document.getElementsByName('time[]').item(c).checked=this.checked">
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><input type="checkbox" name="time[]" value="9">9:00</td>
                                <td><input type="checkbox" name="time[]" value="9.35">9:35</td>
                                <td><input type="checkbox" name="time[]" value="10.10">10:10</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><input type="checkbox" name="time[]" value="10.45">10:45</td>
                                <td><input type="checkbox" name="time[]" value="11.20">11:20</td>
                                <td><input type="checkbox" name="time[]" value="11.55">11:55</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><input type="checkbox" name="time[]" value="12.30">12:30</td>
                                <td><input type="checkbox" name="time[]" value="13.05">13:05</td>
                                <td><input type="checkbox" name="time[]" value="13.40">13:40</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><input type="checkbox" name="time[]" value="14.15">14:15</td>
                                <td><input type="checkbox" name="time[]" value="14.50">14:50</td>
                                <td><input type="checkbox" name="time[]" value="15.25">15:25</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td><input type="checkbox" name="time[]" value="16.00">16:00</td>
                                <td><input type="checkbox" name="time[]" value="16.35">16:35</td>
                                <td><input type="checkbox" name="time[]" value="17.10">17:10</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td><input type="checkbox" name="time[]" value="17.45">17:45</td>
                                <td><input type="checkbox" name="time[]" value="18.20">18:20</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Utwórz dostepne wizyty</button>
                </div>
            </div>
        </form>
    </div>
@endsection
