@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        @foreach($bookings as $booking)
            <tr>
                 id {{$booking->id}}</td> <br>
                doctor id <td>{{$booking->doctor_id}}</td><br>
                user id <td>{{$booking->user_id}}</td><br>
                data <td>{{$booking->date}}</td><br>
            </tr>
        @endforeach
<br>
            @if(count($prescript)>0)
                Recepta : Tak
{{--            @foreach($prescript as $pree)--}}
{{--                <tr>--}}
{{--                    id  <td>{{$pree->id}}</td> <br>--}}
{{--                    id  <td>{{$pree->id_doctor}}</td> <br>--}}
{{--                    id  <td>{{$pree->id_patient}}</td> <br>--}}
{{--                    id  <td>{{$pree->invoice_date}}</td> <br>--}}

{{--                </tr>--}}
{{--            @endforeach--}}
            @else
                Recepta : Nie
            @endif
    </div>

@endsection
