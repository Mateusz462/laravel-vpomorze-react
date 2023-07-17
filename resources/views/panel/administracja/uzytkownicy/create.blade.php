@extends('layouts.panel')

@section('title')
    Stwórz nowego użytkownika - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Ustawienia</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Użytkownicy</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Stwórz nowego użytkownika</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Stwórz użytkownika
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.create') }}">Stwórz użytkownika</a>
                        <a class="dropdown-item" href="{{ route('users.list') }}">Wszyscy Użytkownicy</a>
                        <a class="dropdown-item" href="{{ url('admin.auth.user.deactivated') }}">Dezaktywowowani użytkownicy</a>
                        <a class="dropdown-item" href="{{ url('admin.auth.user.deleted') }}">Zwolnieni użytkownicy</a>
					</ul>
				</div>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Stwórz nowego użytkownika
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="card-title mb-0">
                                                Dane osobowe
                                            </h4>
                                            <div class="mt-4">
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="imie" name="imie" class="form-control" />
                                                    <label class="form-label" for="imie">Imie</label>
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="nazwisko" name="nazwisko" class="form-control" />
                                                    <label class="form-label" for="nazwisko">Nazwisko</label>
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="email" id="email" name="email" class="form-control" />
                                                    <label class="form-label" for="email">E-mail</label>
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="login" name="login" class="form-control" />
                                                    <label class="form-label" for="login">Login</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="card-title mb-0">
                                                Dane firmowe
                                            </h4>
                                            <div class="mt-4">
                                                <div class="form-group mt-4">
                                                    <label class="form-label" for="role">Stanowiska:</label>
                                                    <select class="form-control @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple >
                                                        @foreach($roles as $id => $roles)
                                                            <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('roles'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('roles') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="form12" class="form-control" />
                                                    <label class="form-label" for="form12">Przewoźnik</label>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="form-label" for="role">Dodatkowe uprawnienia:</label>
                                                    <select class="form-select" id="role" name="reason"multiple>
                                                        <option value="1">Poniedziałek</option>
                                                        <option value="2">Wtorek</option>
                                                        <option value="3">Środa</option>
                                                        <option value="4">Czwartek</option>
                                                        <option value="5">Piątek</option>
                                                        <option value="6">Sobota</option>
                                                        <option value="7">Niedziela</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="card-title mb-0">
                                                Informacje konta
                                            </h4>
                                            <div class="mt-4">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="form11Example4" checked />
                                                        <label class="form-check-label" for="form11Example4">
                                                            Status konta
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="form11Example4" checked />
                                                        <label class="form-check-label" for="form11Example4">
                                                            Blokada edycji konta
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="form11Example4" checked />
                                                        <label class="form-check-label" for="form11Example4">
                                                            Pozwól na wejście podczas prac technicznych
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="card-title mb-0">
                                                Uwagi konta
                                            </h4>
                                            <div class="mt-4">
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="form12" class="form-control" />
                                                    <label class="form-label" for="form12">Uwagi konta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Zapisz</button>
                                    <p class="card-title mb-0 mt-4">
                                        Hasło oraz kod służbowy wygeneruje się automatycznie. Użytkownik zostanie poinformowany o stworzeniu konta poprzez wiadomość e-mail. Dane do logowania wysłane będą w osobnym e-mailu.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection

@section('javascript')
@endsection
