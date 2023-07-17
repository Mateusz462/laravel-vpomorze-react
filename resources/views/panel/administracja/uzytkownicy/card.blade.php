@extends('layouts.panel')

@section('title')
    Użytkownicy - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Menedżer firmy</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Użytkownicy</li>
                </ol>
            </nav>
            <div class="col d-flex justify-content-md-end h-100 mx-3">
                <div class="rounded-3 d-flex justify-content-center align-items-center me-3">
                    <a class="btn btn-link active" href="{{ route('users.card') }}"><i class="fas fa-th"></i></a>
                </div>
                <div class="rounded-2 d-flex justify-content-center align-items-center">
                    <a class="btn btn-link" href="{{ route('users.list') }}"><i class="fas fa-bars"></i></a>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Wszyscy Użytkownicy
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.card') }}">Wszyscy Użytkownicy</a>
                        <a class="dropdown-item" href="{{ route('users.create') }}">Stwórz użytkownika</a>
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
        <div class="col">
            <h3 class="mb-4"><b><i class="fas fa-users me-2"></i>Użytkownicy</b></h3>
        </div>
    </div>
    <form action="{{ route('users.card') }}" method="get" class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-outline">
                        <input type="text" id="filter_login" name="filter_login" class="form-control" />
                        <label class="form-label" for="filter_login">Login</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-outline">
                        <input type="text" id="filter_email" name="filter_email" class="form-control" />
                        <label class="form-label" for="filter_email">Email</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-outline">
                        <input type="text" id="filter_code" name="filter_code" class="form-control" />
                        <label class="form-label" for="filter_code">Kod</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Szukaj</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
		<div class="col-12">
                    <div class="row">
                         @if(count($users) > 0)
                            @foreach ($users as $row)
                                <div class="col-md-6 col-lg-3">
                                    <div class="card shadow mb-4 bg-dark">
                            			<div class="card-body text-center">
                            				<img class="rounded-circle mb-3" src="{{ $row->getPicture() }}" style="width: 125px">
                            				<h4 class="mb-3"><a href="" style="color: {{$row->roles->first()->color}}">[{{$row->code}}] {{$row->login}}</a></h4>
                                            <p class="fw-bold mb-2">
                                                @if(count($row->roles) < 1)
                                                    Brak danych!
                                                @else
                                                    @foreach($row->roles as $key => $item)
                                                        @if($key < 2)
                                                            <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                                        @endif
                                                    @endforeach
                                                    @if($key > 2)
                                                        <span class="badge rounded-pill" style="background-color:rgb(161, 161, 163)">+{{ count($row->roles)-2 }}</span>
                                                    @endif
                                                @endif
                                            </p>
                                            <p class="text-muted mt-1">Zarząd WP</p>
                                            <ul class="list-group list-group-unbordered pt-3 mb-3 d-none">
                                                <li class="list-group-item"><b>Profil:</b></li>
            									<li class="list-group-item">
            										<p class="mb-0">
                                                        <b>Imię i nazwisko:</b>
                                                        <span class="gdpr">
                                                            <span class="name d-none">Mateusz Wydra</span>
                                                            <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor">UKRYTO</span>
                                                        </span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <b>Adres email:</b>
                                                        <span class="gdpr">
                                                            <span class="name d-none">mtszwydra@gmail.com</span>
                                                            <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor">UKRYTO</span>
                                                        </span>
                                                    </p>
                                                    <p class="mb-0">Etat: 3/7</p>
                                                    <p class="mb-0">Data zatrudnienia: 29.12.2020</p>
                                                    <p class="mb-0">Data rozpoczęcia pracy: 23.10.2021</p>
            									</li>
        									</ul>
                                            <!-- <ul class="list-group list-group-unbordered pt-3 mb-3">
                                                <li class="list-group-item">
        											<b>Stały przydział:</b> brak przydziału
        										</li>
                        						<li class="list-group-item">
                                                    <b>Pojazdy nieprzydzielanie:</b> brak danych!
                                                </li>
                        					</ul>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item"><b>Raporty:</b></li>
            									<li class="list-group-item">
            										<p class="mb-0">Oczekujące na ocenę <span class="badge bg-warning rounded-pill">1</span></p>
                                                    <p class="mb-0">Zaliczone: <span class="badge bg-success rounded-pill">13</span></p>
                                                    <p class="mb-0">Niezaliczone: <span class="badge bg-danger rounded-pill">3</span></p>
                                                    <p class="mb-0">Anulowane: <span class="badge bg-secondary rounded-pill">2</span></p>
                                                    <p class="mb-0">Oczekujące na złożenie: <span class="badge bg-primary rounded-pill">3</span></p>
            									</li>
            								</ul>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item"><b>Statystyki:</b></li>
            									<li class="list-group-item">
                                                    <p class="mb-0">Kilometry: <span class="badge bg-secondary rounded-pill">50 km</span></p>
                                                    <p class="mb-0">Punkty: <span class="badge bg-primary rounded-pill">130 ptk</span></p>
            									</li>
            								</ul> -->
                                            <p class="card-text pt-2">
                                                <a href="{{ route('profile.index') }}" class="btn btn-primary btn-block"><i class="fas fa-eye"></i> Zobacz profil</a>
                                                @can('user_edit')
                                                <a href="{{ route('users.user.edit', $row->id) }}" class="btn btn-info btn-block"><i class="far fa-edit"></i> Edytuj dane</a>
                                                @endcan
                                                <!-- <button type="button" class="btn btn-success btn-block" disabled><i class="fas fa-unlock-alt"></i> Przywróć konto do systemu</button> -->
                                                <button type="button" class="btn btn-danger btn-block" disabled><i class="fas fa-user-lock"></i> Zablokuj konto w systemie</button>
                                            </p>
                            			</div>
                            		</div>
                                </div>
                                <!--col-->
                            @endforeach
                            {{ $users->links() }}
                        @else
                            <div class="col-lg-12">
                                <div class="card shadow mb-4 bg-warning">
                                    <div class="card-body text-center">
                                        <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--row-->

		</div>
	</div>
@endsection
