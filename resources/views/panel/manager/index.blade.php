@extends('layouts.panel')

@section('title')
    Ustawienia Panelu - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Zarządzania Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Menedżer firmy</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')

    <div class="container-fluid px-4">
        <div class="card mb-4" style="background-color:rgba(208, 53, 95, 0.71)">
            <div class="card-body">
                <h3 class="mb-2 m b-0">Witaj w menadżerze {{ Auth::user()->login }}!</h3>
                <b class="">Masz nowe zadania do wykonnia w panelu:</b>
                <ul class="mb-0">
                    <li> Sprawdź raporty z dnia 21.10.2022.</li>
                    Do sprawdzenia: <b class="text-success">21</b> raportów
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
		<div class="col-12">
			<div class="card mb-4">
                <!-- Tabs navs -->
                @include('panel.manager.includes.tablist')
                <!-- Tabs navs -->
                <!-- Tabs content -->
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane fade show active" id="tabs-admin" role="tabpanel" aria-labelledby="tabs-admin">
        				<div class="card-body pb-0">
        					<div class="row">
        						<div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-users-cog"></i> Użytkownicy w systemie</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('users.list') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="far fa-building"></i> Przewoźnicy w systemie</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('manager.management.carriers.index') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-tools"></i> </h3>
                                            <br>
                                            <p class="text-center"><a href="" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-bullhorn"></i> Ogłoszenia</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('manager.management.ogloszenia.index') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="far fa-handshake"></i> Zebrania</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('manager.management.meetings.index') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-poll"></i> Ankiety</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('survey.index') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="far fa-question-circle"></i> FAQ</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('home') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-download"></i> Pobieralnia</h3>
                                            <br>
                                            <p class="text-center"><a href="" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-medal"></i> Statystyki</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('manager.management.stats') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        				</div>
        				<!-- /.card-body -->
                    </div>
                </div>
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
