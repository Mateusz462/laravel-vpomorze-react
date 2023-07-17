@extends('layouts.panel')

@section('title')
    Przewoźnicy - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Zarządzania Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.') }}">Ustawienia</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Przewoźnicy</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
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
			<div class="card mb-4">
				<div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Użytkownicy <small class="text-muted">aktywni: {{ $users->total() }}</small>
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="row mt-4">
                         @if(count($users) > 0)
                            @foreach ($users as $row)
                                <div class="col-md-6 col-lg-3">
                                    <div class="card shadow mb-4 bg-dark">
                            			<div class="card-body text-center">
                            				<h4 class="mb-1"><a href="">[A-000] mateusz</a></h4>
                            				<a href="">Programista</a>
                                            <p class="text-muted mt-1">Zarząd WP</p>
                                            <ul class="list-group list-group-unbordered pt-3 mb-3">
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
            								</ul>
                                            <p class="card-text">
                                                <a href="http://localhost:8000/frontend.user.account" class="btn btn-info btn-sm mb-1">
                                                    <i class="fas fa-user-circle"></i> Profil
                                                </a>&nbsp;
                                                <a href="http://localhost:8000/panel/settings" class="btn btn-danger btn-sm mb-1">
                                                    <i class="fas fa-user-secret"></i> Zarządzanie
                                                </a>
                                            </p>
                            			</div>
                            		</div>
                                </div>
                                <!--col-->
                            @endforeach
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
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
