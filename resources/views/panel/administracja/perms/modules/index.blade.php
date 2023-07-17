@extends('layouts.panel')

@section('title')
    Permisje - Moduły - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Ustawienia</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.perms.index') }}">Permisje</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Moduły permisji</li>
                </ol>
            </nav>
            @can('permission_create')
                <nav aria-label="breadcrumb">
                    <div class="breadcrumb-menu dropdown me-3 me-lg-1">
    					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
    						Moduły permisji
    					</a>
    					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('settings.perms.module.index') }}">Moduły permisji</a>
                            <a class="dropdown-item" href="{{ route('settings.perms.module.create') }}">Stwórz moduł</a>
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
                                Moduły permisji
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                         @if(count($module) > 0)
                             <div class="row">
                                @foreach ($module as $row)
                                    <div class="col-lg-2">
                                        <div class="card shadow mb-4 bg-dark">
                                            <div class="card-body text-center">
                                                <p class="text-muted mt-1"><b>Moduł:</b> {{ $row->name }}</p>
                                                <hr>
                                                <p class="card-text">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-info"><i class="far fa-edit"></i></button>
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
                        {{ $module->links() }}
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
