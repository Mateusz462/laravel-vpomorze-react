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
    <div class="row">
		<div class="col-12">
			<div class="card mb-4">
                <!-- Tabs navs -->
                @include('panel.manager.includes.tablist')
                <!-- Tabs navs -->
                <!-- Tabs content -->
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane fade show active" id="tabs-kadry" role="tabpanel" aria-labelledby="tabs-kadry">
                        <div class="card-body pb-0">
                            <div class="row">
        						<div class="col-md-12 col-lg-3">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-clipboard"></i> Urlopy</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('manager.hr.leaves.index') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
        						<div class="col-md-12 col-lg-3">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-briefcase"></i> Wnioski Rekrutacyjne</h3>
                                            <br>
                                            <p class="text-center"><a href="service" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
        						<div class="col-md-12 col-lg-3">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="far fa-building"></i> Wnioski Pracowników</h3>
                                            <br>
                                            <p class="text-center"><a href="" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="far fa-building"></i> Pracownicy</h3>
                                            <br>
                                            <p class="text-center"><a href="" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
        						<div class="col-md-12 col-lg-6">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-clipboard"></i> Raporty</h3>
                                            <br>
                                            <p class="text-center"><a href="" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
        						<div class="col-md-12 col-lg-6">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-briefcase"></i> Zgłoszenia</h3>
                                            <br>
                                            <p class="text-center"><a href="service" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
