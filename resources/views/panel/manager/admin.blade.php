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
                    ADMIN
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
        									<h3 class="font-weight-bold text-center"><i class="fas fa-theater-masks"></i> Rangi</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('settings.roles.index') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
                                            <h3 class="font-weight-bold text-center"><i class="fas fa-fingerprint"></i> Permisje</h3>
                                            <br>
                                            <p class="text-center"><a href="{{ route('settings.perms.index') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
        						
        						<div class="col-md-6 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-shield-alt"></i> Ograniczenia Dostępu</h3>
        									<br>
                                            <p class="text-center"><a href="{{ route('settings.limitations') }}" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
        						<div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-bars"></i> Logi</h3>
                                            <br>
                                            <p class="text-center"><a href="" class="btn btn-outline-success btn-lg">Wybierz</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card border bg-dark mb-4">
                                        <div class="card-body">
        									<h3 class="font-weight-bold text-center"><i class="fas fa-cogs"></i> Ustawienia systemu</h3>
                                            <br>
                                            <p class="text-center"><a href="" class="btn btn-outline-success btn-lg">Wybierz</a></p>
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
