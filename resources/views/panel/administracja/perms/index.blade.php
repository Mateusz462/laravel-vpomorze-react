@extends('layouts.panel')

@section('title')
    Permisje - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Menedżer firmy</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permisje</li>
                </ol>
            </nav>
            @can('permission_create')
                <nav aria-label="breadcrumb">
                    <div class="breadcrumb-menu dropdown me-3 me-lg-1">
    					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
    						Wszystkie permisje
    					</a>
    					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('settings.perms.create') }}">Stwórz permisje</a>
                            <a class="dropdown-item" href="{{ route('settings.perms.module.index') }}">Moduły permisji</a>
    					</ul>
    				</div>
                </nav>
            @endcan
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
                                <i class="fas fa-fingerprint"></i> Permisje
                            </h4>
                        </div>
                        <!--col-->
                        <div class="col text-end">
                            <a href="{{ route('settings.perms.module.index') }}" class="btn btn-outline-info"><i class="fas fa-atom"></i> Moduły permisji</a>
                            <a href="{{ route('settings.perms.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Stwórz permisje</a>
                        </div>
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                         @if(count($perms) > 0)
                             <div class="row">
                                @foreach ($perms as $row)
                                    <div class="col-lg-2">
                                        <div class="card shadow mb-4 bg-dark">
                                            <div class="card-body text-center">
                                                <p class="text-muted mt-1"><b>Nazwa permisji:</b> {{ $row->name }}</p>
                                                <p class="text-muted mt-1"><b>Opis:</b> {{ $row->description }}</p>
                                                <p class="text-muted mt-1">
                                                    <b>Moduł:</b>
                                                    @if($row->module)
                                                        {{ $row->module->name }}
                                                    @else
                                                        brak modułu
                                                    @endif
                                                </p>
                                                <hr>
                                                <p class="card-text">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-info"><i class="far fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="col-lg-12">
                                <div class="card shadow mb-4 bg-warning">
                                    <div class="card-body text-center">
                                        <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{ $perms->links() }}
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
