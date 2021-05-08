@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Wyszukaj specjalistę
                    </div>
                    <div class="card-body">
                        <form action="{{route('book.doctorlist')}}" method="post">@csrf
                            <div class="form-group">
                                <select class="form-select form-select-lg mb-3" name="specjalist">
                                    <option value="Internista">Internista</option>
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
                <div class="card">
                    <div class="card-header">
                        Lekarze
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Imię</th>
                                <th scope="col">Nazwisko</th>
                                <th scope="col">Akcje</th>
                            </tr>
                            </thead>
                            <tbody>


                                @if(count($doctors) != 0)
                                    @foreach($doctors as $doctor)
                                        <tr>
                                            <td><img src="{{asset('images')}}/{{$doctor->image}}" style="width:50px" alt=""></td>
                                            <td>{{$doctor->first_name}}</td>
                                            <td>{{$doctor->last_name}}</td>
                                            <td><a href="{{route('new_appointment.show',$doctor->id)}}" class="btn btn-dark">Pokaż dostepne terminy</a></td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                        </table>


                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
