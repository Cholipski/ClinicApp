@extends('admin.layouts.master')


@section('content')
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
                                                <a href="#"><i
                                                        class="ik ik-edit-2"></i></a>
                                                <a href="#" data-toggle="modal" data-id="{{ $user->id }}"
                                                    data-target="#deleteDoctorModal"><i class="ik ik-trash-2"></i></a>
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

        <div class="modal fade" id="deleteDoctorModal" tabindex="-1" role="dialog" aria-labelledby="deleteDoctor"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Usuwanie lekarza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Czy na pewno chcesz usunąć lekarza?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
                        <form method="post" {{-- action="{{route('doctor.delete')}}" --}}>
                            @csrf
                            <input type="hidden" hidden id="hiddenDoctorId" name="hiddenDoctorId">
                            <button type="submit" class="btn btn-danger">Usuń lekarza</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('#deleteDoctorModal').on('show.bs.modal', function(e) {
            const doctorId = $(e.relatedTarget).data('id');
            $(".modal-footer #hiddenDoctorId").val(doctorId);
        });

    </script>
@endpush
