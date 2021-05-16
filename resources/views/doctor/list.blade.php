@extends('admin.layouts.master')
@section('content')


    @if(count($users) > 0)
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->date}}</td>
                <td>{{$user->time}}</td>
                <td>{{$user->symptoms}}</td>
                <td>{{$user->status}}</td>
                <br>
            </tr>
        @endforeach
    @else
        <td>Brak wizyt </td>
    @endif
@endsection

