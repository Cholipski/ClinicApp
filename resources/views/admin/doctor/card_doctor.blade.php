@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Karta lekarza</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </div>
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('card_doctor.check')}}" method="post">@csrf
                        <div class="card">
                            <div class="card-header">
                                Wybierz lekarza
                            </div>
                            <div class="card-body">
                                <select class="form-control @error('role_id') is-invalid @enderror" name="doctor_id">
                                    <option value="">Wybierz lekarza</option>
                                    @foreach(App\Models\User::where('role_id','=','1')->get() as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->first_name}} {{$doctor->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Pokaż wizyty</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    @if(isset($doctor_selected))
                    <div class="card">
                        <div class="card-header">
                            Dane lekarza
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3">
                                        <img class="rounded-circle" width="150px" height="150px" src="{{ asset('images') }}/{{ $doctor_selected->image}}">
                                    </div>
                                </div>
                                <div class="col-md-9 border-right">
                                    <div class="py-3">
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="col-md-12 py-1">
                                                    <b>Imię: </b>{{ $doctor_selected->first_name }}
                                                </div>
                                                <div class="col-md-12">
                                                    <b>Nazwisko: </b>{{ $doctor_selected->last_name }}
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <b>Wykształcenie: </b>{{ $doctor_selected->education }}
                                                </div>
                                                <div class="col-md-12">
                                                    <b>Numer telefonu: </b>{{$doctor_selected->phone_number}}
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <b>Adres zamieszkania: </b><br>
                                                    {{ $doctor_selected->address }}
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <b>O lekarzu</b>
                                                    <div class="d-flex justify-content-between align-items-center experience">
                                                        {{ $doctor_selected->description }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                @if(isset($doctor_selected))
                    <div class="card-header">
                        Lista pacjentów
                    </div>
                    <div class="card-body">
                        <table id="patient_table" class="table">
                            <thead>
                                <th>Imie i nazwisko</th>
                                <th>Email</th>
                                <th>Adres</th>
                                <th>Telefon</th>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                                        <td>{{$patient->email}}</td>
                                        <td>{{$patient->address}}</td>
                                        <td>{{$patient->phone_number}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    @if(isset($doctor_selected))
                    <div class="card-header">
                        Ostatnie wizyty
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Data</th>
                                <th>Godzina</th>
                                <th>Pacjent</th>
                                <th>Objawy</th>
                            </thead>
                            <tbody>
                                @foreach($appoinments as $appoinment)
                                    <tr>
                                        <td>{{$appoinment->date}}</td>
                                        <td>{{$appoinment->time}}</td>
                                        <td>
                                            {{App\Models\User::where('id', $appoinment->user_id)->value('first_name')}}
                                            {{App\Models\User::where('id', $appoinment->user_id)->value('last_name')}}
                                        </td>
                                        <td>{{$appoinment->symptoms}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    @if(isset($doctor_selected))
                    <div class="card-header">
                        Przypisane recepty dla pacjentów
                    </div>
                    <div class="card-body">
                        <table id="prescription_table" class="table">
                            <thead>
                                <th>Pacjent</th>
                                <th>Wystawiono</th>
                                <th>Data realizacji</th>
                                <th>Kod dostępu</th>
                                <th>Kod kreskowy</th>
                            </thead>
                            <tbody>
                                @foreach($prescriptions as $prescription)
                                    <tr>
                                        <td>
                                            {{App\Models\User::where('id', $prescription->id_patient)->value('first_name')}}
                                            {{App\Models\User::where('id', $prescription->id_patient)->value('last_name')}}
                                        </td>
                                        <td>{{$prescription->invoice_date}}</td>
                                        <td>{{$prescription->implementation_date}}</td>
                                        <td>{{$prescription->access_code}}</td>
                                        <td>{{$prescription->barcode}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    

@endsection
