@extends('admin.layouts.master')
@section('content')
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex flex-column align-items-center text-center mt-10">
                                    <img class="rounded-circle" width="150px" height="184px"
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" />
                                    <h3 class="font-weight-bold mb-10">{{ $patient->first_name }}
                                        {{ $patient->last_name }}</h3>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex flex-column justify-content-center">
                                <h6><b>Numer PESEL:</b> {{ $patient->pesel }}</h6>
                                <h6><b>Numer telefonu:</b> {{ $patient->phone_number }}</h6>
                                <h6><b>Alergie:</b> {{ $patient->alergies }}</h6>
                                <h6><b>Przyjmowane leki:</b> {{ $patient->medicaments }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex flex-column align-items-center text-center mt-10">
                                    <img class="rounded-circle" width="150px" style="margin: 17px 0;"
                                        src="https://cdn.pixabay.com/photo/2019/01/01/14/55/calendar-3906791_960_720.jpg" />
                                    <h3 class="font-weight-bold mb-10">{{ $patient->date }}
                                    </h3>
                                </div>
                            </div>

                            <div class="col-md-5 d-flex flex-column justify-content-center">
                                <h6><b>Godzina:</b> {{ $patient->time }}</h6>
                                <h6><b>Objawy:</b> {{ $patient->symptoms }}</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <b>Historia pacjenta</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Lista wizyt</b>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Godzina</th>
                                            <th>Objawy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->time }}</td>
                                                <td>{{ $appointment->symptoms }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <b>Lista recept</b>

                                <table class="table">
                                    <thead>
                                        <th>Wystawiono</th>
                                        <th>Data realizacji</th>
                                        <th>Kod dostępu</th>
                                    </thead>
                                    <tbody>
                                        @if ($prescriptions->count() > 0)
                                            @foreach ($prescriptions as $prescription)
                                                <tr>
                                                    <td>{{ $prescription->invoice_date }}</td>
                                                    <td>{{ $prescription->implementation_date }}</td>
                                                    <td>{{ $prescription->access_code }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td>Brak wystawionych recept</td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="{{ route('doctor.prescription') }}">@csrf
            <div class="row mb-15">
                <div class="col-lg-12 d-flex pl-40">
                    <label class="form-check-label" for="flexCheckChecked">
                        Czy wystawić receptę?
                    </label>
                    <input class="form-check-input" type="checkbox" id="flexCheckChecked" data-toggle="collapse"
                        href="#collapsePrescription" role="button" aria-expanded="false" name="isPrescriptionActive"
                        aria-controls="collapsePrescription">
                </div>
            </div>

            <div class="collapse" id="collapsePrescription">
                <div class="row">
                    <div class="col-md-12 border-right">
                        <div class="card">
                            <input type="hidden" name="id_app" class="form-control" value="{{ $patient->id }}">
                            <div class="card-header">
                                <b>Recepta</b>
                            </div>
                            <div class="p-3">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <label class="labels">Nazwa</label><input type="text" name="name1" value=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <label class="labels">Dawkowanie</label><input type="text" name="dosage1"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <label class="labels">Opłata</label><input type="text" name="payment1"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <label class="labels">Ilość</label><input type="text" name="count1"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="name2" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="dosage2" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="payment2" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="count2" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="name3" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="dosage3" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="payment3" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="count3" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="name4" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="dosage4" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="payment4" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="count4" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="name5" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="dosage5" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="payment5" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row-md-12">
                                            <input type="text" name="count5" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="card">
                        <div class="card-header">
                            <b>Zalecenia</b>
                        </div>
                        <div class="card-body">
                            <textarea type="text" name="zalecenia" class="form-control" value="" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark profile-button" type="submit">Zakończ wizytę</button>

        </form>
    </div>

@endsection
