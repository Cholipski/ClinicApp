@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-doc">
                <div class="card-header">
                    Lekarz
                </div>
                <div class="card-body ">
                    @if(isset($doctor))
                    <div class="row">
                        <div class="col-lg-12">
                            <img style="width:100%" src="{{asset('images')}}/{{$doctor->image}}">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-lg-12">Imię: {{$doctor->first_name}}</div>

                    </div>
                    <div class="row pt-2">
                        <div class="col-lg-12">Nazwisko: {{$doctor->last_name}}</div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-lg-12">Specjalizacja: {{$doctor->specialist}}</div>
                    </div>
                    @endif
                </div>
                
            </div>
            

        </div>
        @if(isset($dates))
        <div class="col-lg-9">
            @if(Session::has('errmessage'))
            <div class="alert alert-danger">
                {{Session::get('errmessage')}}
            </div>
            @endif

            <div class="card card-doc">
                <div class="card-header">
                    Dostępne terminy
                </div>

                <div class="card-body">
                    <table id="patient_table" class="table">
                    
                <tbody>
                    @foreach($dates as $date)
                    <tr>
                        <td>{{$date->date}}</td>
                        <td><a class="btn btn-dark" href="{{route('book.showTimes',[$id,$date->date])}}">Pokaż dostepne godziny</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$dates->links()}}
            </div>
        </div>
        <a href="{{route('new_appointment.index')}}" class="btn btn-dark col-lg-2 mt-5 ">Cofnij</a>

    </div>
    @endif
    @if(isset($times))
    <div class="col-lg-9">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        @if(Session::has('errmessage'))
        <div class="alert alert-danger">
            {{Session::get('errmessage')}}
        </div>
        @endif
        <div class="card">
            <div class="heading-time mt-4">
                Dostępne godziny
                <hr>
            </div>
            <div class="card-body">
                <form action="{{route('new_appointment.store')}}" method="post">@csrf
                    <div class="row">
                        @foreach($times as $time)
                        <div class="col-lg-3">
                            <input type="radio" class="btn-check radio_appointment" name="available_time" id="{{$time->id}}" value="{{$time->id}}" autocomplete="off">
                            <label class="btn btn-dark btn_appointment" for="{{$time->id}}">{{$time->time}}</label>
                        </div>
                        @endforeach
                        <input type="text" hidden value="{{$doctor->id}}" name="doctor_id">
                    </div>

                    <div class="row mt-3 col-lg-12">
                        <div class="form-group">
                            <label for="symptomps">Podaj objawy</label>
                            <textarea name="symptomps" placeholder="wpisz swoje objawy">

                                        </textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 text-center ">
                            <button type="submit" style="width:100%;" class="btn btn-dark mt-1">Zarezerwuj wizytę</button>
                        </div>
                    </div>
                </form>
                
            </div>
            <a href="{{url()->previous()}}" class="btn btn-dark col-lg-2 mt-5 ">Cofnij</a>
        </div>
    </div>
    @endif
</div>

</div>
@endsection