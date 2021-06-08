@extends('admin.layouts.master')
@section('content')
    @foreach ($patients as $patient)
        <tr>
            imie <td>{{ $patient->first_name }}</td><br>
           nazwisko <td>{{ $patient->last_name }}</td><br>
           adres  <td>{{ $patient->address }}</td><br>
            tel <td>{{ $patient->phone_number }}</td><br>
            alergia <td>{{ $patient->alergies }}</td><br>
            leki <td>{{ $patient->medicaments }}</td><br>
        </tr>
    @endforeach
<b>Wizyty</b><br>
    @foreach ($bookings as $booking)
        <tr>
            data <td>{{ $booking->date }}</td><br>
           czas  <td>{{ $booking->time }}</td><br>
           objawy  <td>{{ $booking->symptoms }}</td><br>
        </tr>
    @endforeach
<b>recepty</b><br>
    @if ($prescriptions->count() > 0)
        @foreach ($prescriptions as $prescription)
            <tr>
              data <td>{{ $prescription->invoice_date }}</td><br>
               kod  <td>{{ $prescription->access_code }}</td><br>
                recepta <td>

                    <button data-toggle="modal" data-data="{{ $prescription }}"
                            data-target="#showPrescriptionModal{{ $prescription->id }}"
                            class="btn btn-dark btnShowPrescription">Pokaż
                        receptę</button>
                </td><br>
            </tr><br>
            @include('doctor.prescriptionDetail',['doctor'=>auth()->user()])
        @endforeach
    @else
        <td>Brak wystawionych recept</td>
    @endif

@endsection

