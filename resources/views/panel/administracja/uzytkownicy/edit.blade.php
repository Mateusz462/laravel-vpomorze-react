@extends('layouts.panel')

@section('title')
    Edytuj konto użytkownika - Panel Zarządzania Wirtualnego Pomorza
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
                    <li class="breadcrumb-item active" aria-current="page">Edytuj konto użytkownika</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Edytuj konto użytkownika
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.create') }}">Edytuj konto użytkownika</a>
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
                                Edytuj konto użytkownika
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4">
                        <form action="{{ route('users.user.update', $user->id) }}" method="post">
                            @method('PATCH')
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
                                                    <input type="text" id="imie" name="imie" class="form-control @error('imie') is-invalid @enderror" value="{{ old('imie', $user->imie) }}" autocomplete="imie"/>
                                                    <label class="form-label" for="imie">Imie</label>
                                                    @error('imie')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="nazwisko" name="nazwisko" class="form-control @error('nazwisko') is-invalid @enderror" value="{{ old('nazwisko', $user->nazwisko) }}" autocomplete="nazwisko"/>
                                                    <label class="form-label" for="nazwisko">Nazwisko</label>
                                                    @error('nazwisko')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" autocomplete="email"/>
                                                    <label class="form-label" for="email">E-mail</label>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="login" name="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login', $user->login) }}" autocomplete="login"/>
                                                    <label class="form-label" for="login">Login</label>
                                                    @error('login')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
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
                                                    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                                                        @foreach($roles as $id => $roles)
                                                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('roles'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('roles') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-outline mt-4">
                                                    <input type="text" id="company" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" autocomplete="name"/>
                                                    <label class="form-label" for="company">Przewoźnik</label>
                                                    @error('company')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label class="form-label" for="perm">Dodatkowe uprawnienia:</label>
                                                    <select class="form-select" id="perm" name="perm" multiple>
                                                        <option value="1">Poniedziałek</option>
                                                        <option value="2">Wtorek</option>
                                                        <option value="3">Środa</option>
                                                        <option value="4">Czwartek</option>
                                                        <option value="5">Piątek</option>
                                                        <option value="6">Sobota</option>
                                                        <option value="7">Niedziela</option>
                                                    </select>
                                                    @error('perm')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
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
                                                    <input class="form-check-input" type="checkbox" id="status" checked />
                                                    <label class="form-check-label" for="status">
                                                        Status konta
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="status_block" checked />
                                                    <label class="form-check-label" for="status_block">
                                                        Blokada edycji konta
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="technic_access" checked />
                                                    <label class="form-check-label" for="technic_access">
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
                                                    <input type="text" id="account_notes" class="form-control" />
                                                    <label class="form-label" for="account_notes">Uwagi konta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Zapisz</button>
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
