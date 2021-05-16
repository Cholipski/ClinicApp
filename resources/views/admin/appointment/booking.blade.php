@extends('admin.layouts.master')

@section('content')
        <div class="container-fluid">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table id="patient_table" class="table">
                        <thead>
                        <tr>
                            <th>Identyfikator wizyty</th>
                            <th>Data</th>
                            <th>Godzina</th>
                            <th>Pacjent</th>
                            <th>Objawy</th>
                            <th>Doktor</th>
                            <th>Specjalizacja</th>
                            <th>Opcje</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->date}}</td>
                            <td>{{$booking->time}}</td>
                            <td>
                                {{App\Models\User::where('id', $booking->user_id)->value('first_name')}}
                                {{App\Models\User::where('id', $booking->user_id)->value('last_name')}}
                            </td>
                            <td>{{$booking->symptoms}}</td>
                            <td>
                                {{App\Models\User::where('id', $booking->doctor_id)->value('first_name')}}
                                {{App\Models\User::where('id', $booking->doctor_id)->value('last_name')}}
                            </td>
                            <td>
                                {{App\Models\User::where('id', $booking->doctor_id)->value('specialist')}}
                            </td>
                            <td>
                                <button class="btn btn-success"><a href="{{ route('booking.accepted_booked', $booking->id) }}">Potwierdź</a></button>
                                <button class="btn btn-danger"><a href="{{ route('booking.rejected_booked', $booking->id) }}">Odrzuć</a></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection
