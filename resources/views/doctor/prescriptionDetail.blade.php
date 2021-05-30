<div class="modal fade" id="showPrescriptionModal{{ $prescription->id }}" tabindex="-1" role="dialog"
    aria-labelledby="showPrescription" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recepta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-center mt-4">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Kod dostępu:</h4>
                                <h2>{{ $prescription->access_code }}</h2>
                            </div>
                            <div class="col-lg-6">
                                <div>{!! DNS2D::getBarcodeSVG(strval($prescription->access_code), 'QRCODE', 5, 5) !!}</div>
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
                            <b>Lek.</b> {{ $doctor->first_name }} {{ $doctor->last_name }}
                        </div>
                        <div>
                            <b>Spec.</b> {{ $doctor->specialist }}
                        </div>
                        <div>
                            <b>Tel.</b> {{ $doctor->phone_number }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <b>Imię i nazwisko: </b> {{ $patient->first_name }} {{ $patient->last_name }}
                        </div>
                        <div>
                            <b>Tel.</b> {{ $patient->phone_number }}
                        </div>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-lg-12">
                        <b>Wystawiono:</b> {{ $prescription->invoice_date }}
                    </div>
                    <div class="col-lg-12">
                        <b>Data realizacji:</b> {{ $prescription->implementation_date }}
                    </div>
                </div>
                <hr>
                @php
                    $medicaments = App\Models\Medicament::where('id_prescription', $prescription->id)->get();
                @endphp
                @foreach ($medicaments as $medicament)
                    <div class="row text-center mt-2">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <b>Nazwa:</b> {{ $medicament->name }}
                            </div>
                            <div class="col-lg-12">
                                <b>Ilość opakowań:</b> {{ $medicament->count }}
                            </div>
                            <div class="col-lg-12">
                                <b>Dawkowanie:</b> {{ $medicament->dosage }}
                            </div>
                            <div class="col-lg-12">
                                <b>Odpłatność:</b> {{ $medicament->payment }} %
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
