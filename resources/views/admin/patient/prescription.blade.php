@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="patient_table" class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>imie</th>
                        <th>Nazwisko</th>
                        <th>data</th>
                        <th>kod</th>
                        <th>data</th>
                        <th>szczegoly</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescriptions as $prescription)
                        <tr>
                            <td>{{$prescription->id}}</td>
                            <td>{{$prescription->first_name}}</td>
                            <td>{{$prescription->last_name}}</td>
                            <td>{{$prescription->invoice_date}}</td>
                            <td>{{$prescription->code}}</td>
                            <td>{{$prescription->implementation_date}}</td>
                            <td>
                                <a href="{{ route('Prescription.show', $prescription->id) }}" class="menu-item">Szczegoly</a>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
