@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="patient_table" class="table">
                    <thead>
                    <tr>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                        <th>Data</th>
                        <th>Kod</th>
                        <th>Podglad</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescriptions as $prescription)
                        <tr>
                            <td>{{$prescription->first_name}}</td>
                            <td>{{$prescription->last_name}}</td>
                            <td>{{$prescription->invoice_date}}</td>
                            <td>{{$prescription->barcode}}</td>
                            <td>
                                <a href="{{ route('Prescription.show', $prescription->id) }}" class="menu-item"><i class="ik ik-eye"></i></a>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
