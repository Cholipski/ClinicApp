@extends('layouts.app')

@section('content')

    @if(isset($prescription))

        <div class="container" style="border: 1px solid #a1a1a1;padding: 15px;width: 70%;">
            <div class="row mb-4">
                <div class="col-lg-3">
                    <a href="{{route('prescription.index')}}" class="btn btn-dark" style="width:100%">Powrót</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="container text-center">

                        <div>{!! DNS1D::getBarcodeHTML( strval($prescription->barcode) , 'C39',) !!}</div>
                        <div>
                           NUMER: {{$prescription->barcode}}
                        </div>
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
                            <div>{!!DNS2D::getBarcodeHTML( strval($prescription->access_code) , 'QRCODE',5,5)!!}</div>
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
                <div class="col-lg-6">
                    <div>
                        <b>Lek.</b> {{$doctor->first_name}} {{$doctor->last_name}}
                    </div>
                    <div>
                        <b>Spec.</b> {{$doctor->specialist}}
                    </div>
                    <div>
                        <b>Tel.</b> {{$doctor->phone_number}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <b>Imię i nazwisko: </b> {{$patient->first_name}} {{$patient->last_name}}
                    </div>
                    <div>
                        <b>Tel.</b> {{$patient->phone_number}}
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


    @else
        Nie znaleziono takiej recepty
    @endif



@endsection
