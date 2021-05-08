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
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">doctor</a>
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
                    @if(count($users) > 0)
                        @foreach($users as $user)
                    <tr>
                        <td><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt=""></td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->specialist}}</td>
                        <td>
                            <div class="table-actions">
                                <a href="#"><i class="ik ik-eye"></i></a>
                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                <a href="#"><i class="ik ik-trash-2"></i></a>
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
@endsection
