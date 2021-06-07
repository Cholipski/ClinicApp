@extends('layouts.app')

@section('content')

    @if(isset($prescription))

        <div class="container mt-3" style="border-radius: 5px ;padding: 15px;width: 70%;background-color:white; box-shadow: 0 0 6px #a0a0a0;">
            <div class="row mb-4">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="container text-center">

                        <div>{!! DNS1D::getBarcodeSVG( strval($prescription->barcode) , 'C39+', 3,43) !!}</div>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Kod dostępu:</h4>
                            <h2>{{$prescription->access_code}}</h2>
                        </div>
                        <div class="col-lg-6">
                            <div>{!!DNS2D::getBarcodeSVG( strval($prescription->access_code) , 'QRCODE',5,5)!!}</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row text-center mt-4">
                <div class="col-lg-6">
                    <div>
                        <h1>Wystawił</h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <h1>Pacjent</h1>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-lg-6 text-style-recipt">
                    <div class="text-style-recipt">
                        <b>Lekarz:</b> {{$doctor->first_name}} {{$doctor->last_name}}
                    </div>
                    <div class="text-style-recipt">
                        <b>Specjalizacja:</b> {{$doctor->specialist}}
                    </div>
                    <div class="text-style-recipt">
                        <b>Telefon:</b> {{$doctor->phone_number}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-style-recipt">
                        <b>Imię i nazwisko: </b> {{$patient->first_name}} {{$patient->last_name}}
                    </div>
                    <div class="text-style-recipt">
                        <b>Telefon:</b> {{$patient->phone_number}}
                    </div>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-lg-12">
                    <b>Wystawiono:</b> {{$prescription->invoice_date}}
                </div>
                <div class="col-lg-12">
                    <b>Data realizacji:</b> {{$prescription->implementation_date}}
                </div>
            </div>
            <hr>
            @foreach($medicaments as $medicament)
                <div class="row text-center mt-2">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            Nazwa: {{$medicament->name}}
                        </div>
                        <div class="col-lg-12">
                            <b>Ilość opakowań:</b> {{$medicament->count}}
                        </div>
                        <div class="col-lg-12">
                            <b>Dawkowanie:</b> {{$medicament->dosage}}
                        </div>
                        <div class="col-lg-12">
                            Odpłatność: {{$medicament->payment}} %
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
       <center><a href="{{route('prescription.index')}}" class="btn btn-dark mt-4" style="width:30vh">Cofnij</a></center> 
        


    @else
       <div class="heading">Nie masz wystawionej żadnej recepty</div> 
       
    @endif



@endsection
