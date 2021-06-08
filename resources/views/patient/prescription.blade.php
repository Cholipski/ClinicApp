@extends('layouts.app')

@section('content')

    @if(count($prescriptions)>0)
 <div class="container">
        <div class="recipe-box">
        <h1 style="text-align:center;">Twoje e-recepty</h1>
		<div class="row">
            @foreach($prescriptions as $prescription)
            <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <i class="fa fa-behance fa-3x" aria-hidden="true"></i>
						<div class="box-title">
							<h3>Numer Recepty: {{$prescription -> barcode}}</h3>
						</div>
						<div class="box-recipe-text">
							<span>Lekarz: {{$prescription -> first_name}} {{$prescription -> last_name}}</span><br>
							<span>Data wystawienia: {{$prescription -> invoice_date}}</span><br>
							<span>Data realizacji: {{$prescription -> implementation_date}}</span>
						</div>
						<div class="box-btn">
						    <a href="{{route('prescription.show',$prescription->id)}}" class="btn btn-dark">Wyświetl szczegóły</a>
						</div>
						
					 </div>
					 
				</div>	 
            @endforeach
			</div>
        </div>
		
		<a href="{{ url('/') }}" class="btn btn-dark col-lg-2 mt-4 ">Cofnij</a>
		
    </div>
	
    @else
        <div class="heading">Nie masz aktualnie wystawionej żadnej recepty</div>
		<center><a href="{{ url('/') }}" class="btn btn-dark col-lg-2 mt-5 ">Cofnij</a></center>
		
    @endif
	
	


@endsection
