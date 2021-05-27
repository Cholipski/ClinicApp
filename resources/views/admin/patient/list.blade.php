@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="patient_table" class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>data</th>
                        <th>czas</th>
                        <th>symptomy</th>
                        <th>info</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->date}}</td>
                            <td>{{$booking->time}}</td>
                            <td>{{$booking->symptoms}}</td>
                            <td>
                                <a href="{{ route('Patient.show',$booking->id ) }}" class="menu-item"><i class="ik ik-eye"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
