@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Wszystkie wizyty
            </div>
            <div class="card-body">
                @if($appointments->count() > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Godzina</th>
                            <th scope="col">Specjalizacja</th>
                            <th scope="col">Imię lekarza</th>
                            <th scope="col">Nazwisko lekarza</th>
                            <th scope="col">Obajwy</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>
                                    {{$appointment->date}}
                                </td>
                                <td>
                                    {{$appointment->time}}
                                </td>
                                <td>
                                    {{$appointment->specialist}}
                                </td>
                                <td>
                                    {{$appointment->first_name}}
                                </td>
                                <td>
                                    {{$appointment->last_name}}
                                </td>
                                <td>
                                    {{$appointment->symptoms}}                              
                                </td>
                                <td>
                                    @if($appointment->status == 0)
                                        Wizyta zarezerwowana
                                    @elseif($appointment->status == 1)
                                        <span style="color:green">Wizyta potwierdzona</span>
                                    @elseif($appointment->status == 2)
                                        Wizyta zakończona
                                    @elseif($appointment->status == 3)
                                        <span style="color:red">Wizyta odrzucona</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="d-flex justify-content-center">
                        <span id="no-appointment-cancel">
                            Nie znaleziono żadanych wizyt w historii
                        </span>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{url()->previous()}}" class="btn btn-dark btn-md btn-block">Powrót</a>
                </div>
            </div>
        </div>
    </div>
@endsection
