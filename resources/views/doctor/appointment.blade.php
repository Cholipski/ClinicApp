@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <b>Informacje o wizycie</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="row mt-2">
                                <div class="col-md-12 py-1">
                                    <b>Imię: </b>{{ $patients->first_name }}
                                </div>
                                <div class="col-md-12">
                                    <b>Nazwisko: </b>{{ $patients->last_name }}
                                </div>
                                <div class="col-md-12 py-1">
                                    <b>Data: </b>{{ $patients->date }}
                                </div>
                                <div class="col-md-12">
                                    <b>Godzina: </b>{{ $patients->time }}
                                </div>
                                <div class="col-md-12 py-1">
                                    <b>Objawy: </b>{{ $patients->symptoms }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <b>Dane pacjenta</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="row mt-2">
                                <div class="col-md-12 py-1">
                                    <b>Imię: </b>{{ $patients->first_name }}
                                </div>
                                <div class="col-md-12">
                                    <b>Nazwisko: </b>{{ $patients->last_name }}
                                </div>
                                <div class="col-md-12 py-1">
                                    <b>Telefon: </b>{{ $patients->phone_number }}
                                </div>
                                <div class="col-md-12">
                                    <b>Email: </b>{{ $patients->email }}
                                </div>
                                <div class="col-md-12 py-1">
                                    <b>Adres: </b>{{ $patients->address }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6">
                            <b>Lista wizyt:</b>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Data</th>
                                    <th>Godzina</th>
                                    <th>Objawy</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{$appointment->id}}</td>
                                        <td>{{$appointment->date}}</td>
                                        <td>{{$appointment->time}}</td>
                                        <td>{{$appointment->symptoms}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <b>Lista recept:</b>
                            <table class="table">
                                <thead>
                                <th>Id</th>
                                <th>Wystawiono</th>
                                <th>Data realizacji</th>
                                <th>Kod dostępu</th>
                                <th>Kod kreskowy</th>
                                </thead>
                                <tbody>
                                @foreach($prescriptions as $prescription)
                                    <tr>
                                        <td>{{$prescription->id}}</td>
                                        <td>{{$prescription->invoice_date}}</td>
                                        <td>{{$prescription->implementation_date}}</td>
                                        <td>{{$prescription->access_code}}</td>
                                        <td>{{$prescription->barcode}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>
        <a  class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
            Recepta
        </a>
    </p>
    <div class="collapse" id="collapseExample">

        <form method="post" action="{{ route('doctor.prescription') }}">@csrf
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="card">
                        <input type="hidden" name="id_app" class="form-control" value="{{ $patients->id }}">
                        <div class="card-header">
                            <b>Recepta</b>
                        </div>
                        <div class="p-3">
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="row-md-12">
                                        <label class="labels">Nazwa</label><input type="text" name="name1" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row-md-12">
                                        <label class="labels">Dawkowanie</label><input type="text" name="dosage1" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row-md-12">
                                        <label class="labels">Opłata</label><input type="text" name="payment1" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row-md-12">
                                        <label class="labels">Ilość</label><input type="text" name="count1" class="form-control" value="">
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
                            <div class="mt-25 text-center"><button class="btn btn-dark profile-button" type="submit">Dodaj leki</button></div>
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
                        <div class="p-3">
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="row-md-12">
                                        <label class="labels">Opis zaleceń</label><textarea type="text" name="zalecenia" class="form-control" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </form>

    </div>



@endsection

