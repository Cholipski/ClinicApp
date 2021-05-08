@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('errmessage'))
            <div class="alert alert-danger">
                {{Session::get('errmessage')}}
            </div>
        @endif
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
        <div class="card">
            @if(isset($appointments))
                <table id="appointments" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Specjalizacja</th>
                        <th scope="col">Imię lekarza</th>
                        <th scope="col">Nazwisko lekarza</th>
                        <th scope="col">Data</th>
                        <th scope="col">Godzina</th>
                        <th scope="col">Status</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>
                                {{$appointment->specialist}}
                            </td>
                            <td>
                                {{$appointment->first_name}}
                            </td>
                            <td>
                                {{$appointment->last_name}}
                            </td>
                            <td>
                                {{$appointment->date}}
                            </td>
                            <td>
                                {{$appointment->time}}
                            </td>
                            <td>
                                @if($appointment->status == 0)
                                    Wizyta zarezerwowana
                                @else
                                    Wizyta potwierdzona
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-dark passingID" data-toggle="modal" data-id="{{$appointment->id}}" data-target="#cancelModal">Odwołaj</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="d-flex justify-content-center">
                    <span id="no-appointment-cancel">
                        Nie znaleziono żadanych wizyt które możesz odwołać
                    </span>
                </div>
            @endif
        </div>
        <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelAppointment" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anulowanie wizyty</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Czy na pewno chcesz odwołać wizytę??
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
                        <form method="post" action="{{route('cancel_appointment.store')}}">@csrf
                            <input type="text" hidden id="appointment_id" name="appointment_id">
                            <button type="submit" class="btn btn-danger">Odwołaj wizytę</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on("click", ".passingID", function () {
            const appointment_id = $(this).data('id');
            $(".modal-footer #appointment_id").val( appointment_id );
        });
    </script>
@endsection
