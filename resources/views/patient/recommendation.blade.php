@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="heading">Twoje zalecenia</h1>
        <div class="card mt-4">
            @if($appointments->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Godzina</th>
                    <th scope="col">Specjalizacja</th>
                    <th scope="col">Imię lekarza</th>
                    <th scope="col">Nazwisko lekarza</th>
                    <th scope="col">Zalecenia</th>
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
                            {{App\Models\Recommendation::where('appointment_id', $appointment->id)->value('content')}}                         
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="d-flex justify-content-center">
                <span id="no-appointment-cancel">
                    Brak przypisanych zaleceń
                </span>
            </div>
        @endif
        </div>
        <a href="{{ url('/') }}" class="btn btn-dark col-lg-2 mt-4 ">Cofnij</a>
    </div>
@endsection
