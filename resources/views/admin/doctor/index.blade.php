@extends('admin.layouts.master')


@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    @if (Session::has('errmessage'))
        <div class="alert alert-danger">
            {{ Session::get('errmessage') }}
        </div>
    @endif
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Lista lekarzy</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">Lista lekarzy</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th class="nosort">Zdjęcie</th>
                                <th>Imię</th>
                                <th>Nazwisko</th>
                                <th>Adres e-mail</th>
                                <th>Specjalizacja</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td><img src="{{ asset('images') }}/{{ $user->image }}" class="table-user-thumb"
                                                alt=""></td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->specialist }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <button href="#" data-toggle="modal" data-data="{{ $user }}"
                                                    data-target="#showDoctorModal" disabled class="btnShowDoctor"
                                                    style="background: none;border:none;"><i class="ik ik-eye"></i></button>
                                                <button onclick="location.href='{{ route('doctor.edit', $user->id) }}';"
                                                    style="background: none;border:none;"><i
                                                        class="ik ik-edit-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td>Brak lekarzy w bazie</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showDoctorModal" tabindex="-1" role="dialog" aria-labelledby="showDoctor"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informacje o lekarzu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img class="rounded-circle" width="150px" height="150px" id="doctorPhoto" src="" />
                    </div>
                    <h5 id="doctorName" class="font-weight-bold mt-10 text-center"></h5>
                    <p id="doctorSpecialist" class="text-center"></p>
                    <p id="doctorEmail" class="text-center"></p>
                    <p id="doctorPhone" class="text-center"></p>
                    <p id="doctorAddress" class="text-center"></p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btnShowDoctor').attr('disabled', false);

            $('#showDoctorModal').on('show.bs.modal', function(e) {
                const doctor = $(e.relatedTarget).data('data');
                $(".modal-body #doctorName").text(doctor.first_name + " " +
                    doctor.last_name);
                $(".modal-body #doctorPhone").text("Numer telefonu: " + doctor.phone_number);
                $(".modal-body #doctorEmail").text("Adres email: " + doctor.email);
                $(".modal-body #doctorSpecialist").text(doctor.specialist);
                $(".modal-body #doctorAddress").text("Adres zamieszkania: " + doctor.address);
                $(".modal-body #doctorPhoto").attr("src", `{{ asset('images') }}/${doctor.image}`);
            });
        });

    </script>
@endpush
