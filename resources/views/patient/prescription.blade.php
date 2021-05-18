@extends('layouts.app')

@section('content')

    @if(count($prescriptions)>0)
        <div class="container">
            @foreach($prescriptions as $prescription)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Numer: {{$prescription -> barcode}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    Kod dostępu: {{$prescription -> access_code}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    Lekarz: {{$prescription -> first_name}} {{$prescription -> last_name}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    Data wystawienia: {{$prescription -> invoice_date}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    Data realizacji: {{$prescription -> implementation_date}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{route('prescription.show',$prescription->id)}}" class="btn btn-dark">Wyświetl szczegóły</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <div class="container text-center" style="border: 1px solid #a1a1a1;padding: 15px;width: 70%;">

            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('676554255367', 'C39')}}" alt="barcode" />

        </div>
    @endif



@endsection
