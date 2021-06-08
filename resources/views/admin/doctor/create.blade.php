@extends('admin.layouts.master')


@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Lekarz</h5>
                        <span>Formularz dodawania lekarza</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dodaj lekarza</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Dodaj lekarza</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('doctor.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="first_name">Imię</label>
                                <input type="text" name="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    placeholder="Imię lekarza" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="last_name">Nazwisko</label>
                                <input type="text" name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    placeholder="Nazwisko lekarza" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="password">Hasło</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Hasło do konta lekarza" value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="gender">Płeć</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="male">Mężczyzna</option>
                                    <option value="female">Kobieta</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="education">Wykształcenie</label>
                                <input type="text" name="education"
                                    class="form-control @error('education') is-invalid @enderror"
                                    placeholder="Wykształcenie lekarza" value="{{ old('education') }}">
                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="address">Pokój lekarza</label>
                                <input type="text" name="room" class="form-control @error('room') is-invalid @enderror"
                                    placeholder="Pokój lekarza" value="{{ old('room') }}">
                                @error('room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="email">Adres e-mail</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Adres e-mail" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="phone_number">Numer telefonu</label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    placeholder="Numer telefonu" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="specialist">Specjalizacja</label>
                                <select class="form-control @error('specialist') is-invalid @enderror" name="specialist">
                                    <option value="">Wybierz specjalizacje</option>
                                    @foreach (App\Models\Specialist::get() as $spedialist)
                                        <option value="{{ $spedialist->name }}">{{ $spedialist->name }}</option>
                                    @endforeach
                                </select>
                                @error('specialist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="role_id">Uprawnienia</label>
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                    <option value="">Nadaj uprawnienia</option>
                                    @foreach (App\Models\Role::where('name', '!=', 'Pacjent')->get() as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-lg-6">
                                <div class="custom-file @error('image') is-invalid @enderror">
                                    <label for="image">Dodaj zdjęcie</label>
                                    <input type="file" name="image" class="file-upload-default" />
                                    @error('image')
                                        <span class="invalid-feedback" style="display: flex;" role="alert">
                                            <strong>Zdjęcie jest wymagane</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group" style="margin-top: 20px;">
                            <label for="description mt-5">O lekarzu</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                id="description" rows="4">
                                   {{ old('description') }}
                                    </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark mr-2">Dodaj</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
