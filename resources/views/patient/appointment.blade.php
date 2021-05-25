@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            

                <div class="card-body img-banner">
                    <div class="col-md-6 col-sm-2">
                        <h1>Umów się do lekarza</h1>
                        <h2>Wyszukaj specjaliste</h2>
                        <form  action="{{route('book.doctorlist')}}" method="post">@csrf
                            <div class="form-group">
                                <select class="form-select form-select-lg mb-3 form-down" name="specjalist">
                                    <option value="Internista"> Internista</option>
                                    <option value="Gastrolog">Gastrolog</option>
                                    <option value="Okulista">Okulista</option>
                                    <option value="Pulmonolog">Pulmonolog</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Wyszukaj</button>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-lg-12">
            @if(isset($doctors))
            @if(count($doctors) != 0)
            @foreach($doctors as $doctor)
            <div class="col-sm-6 col-md-4 ">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="front">
                            <div class="card text-center">
                                <div class="card-body text-center">
                                    <p><img class="img-fluid" src="{{asset('images')}}/{{$doctor->image}}"></p>
                                    <h1>{{$doctor->specialist}}</h1>
                                    <h4 class="card-title">{{$doctor->first_name}} {{$doctor->last_name}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="back">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">O lekarzu:</h4>
                                    <p class="card-text">{{$doctor->description}}</p>
                                    <a href="{{route('new_appointment.show',$doctor->id)}}" class="btn btn-primary btn-available-date">Pokaż dostepne terminy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @endif
</div>
@endsection