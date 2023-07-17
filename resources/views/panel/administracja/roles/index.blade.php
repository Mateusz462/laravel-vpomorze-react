@extends('layouts.panel')

@section('title')
    Rangi - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Menedżer firmy</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rangi</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Wszystkie Rangi
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('settings.roles.index') }}">Wszystkie Rangi</a>
                        <a class="dropdown-item" href="{{ route('settings.roles.create') }}">Stwórz range</a>
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
                                <i class="fas fa-theater-masks"></i> Rangi
                            </h4>
                        </div>
                        <!--col-->
                        <div class="col text-end">
                            <a href="{{ route('settings.roles.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Stwórz range</a>
                        </div>
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                        @if(count($roles) > 0)
                            <div class="row">
                                @foreach ($roles as $row)
                                    <div class="col-md-6 col-xl-4 col-xxl-3">
                                        <div class="card shadow mb-4 bg-dark">
                                            <div class="card-body text-center">
                                                <p class="mt-1" style="color: {{ $row->color }}">{{ $row->name }}</p>
                                                <p class="text-muted mt-1">Osoby z rangą: {{ $row->users()->count() }}</p>
                                                <p class="mt-1 d-none">Uprawnienia: @if($row->permissions->count() > 0) <span class="badge badge-info">{{ $row->permissions->count() }}</span>@endif</p>
                                                <div class="d-none">
                                                    @if($row->permissions->count() > 0)
                                                        @foreach($row->permissions as $key => $item)
                                                            <span class="badge badge-secondary">{{ $item->name }}</span>
                                                        @endforeach
                                                    @else
                                                        <span class="badge badge-danger">Brak permisji</span>
                                                    @endif
                                                </div>
                                                <p class="card-text">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        @can('role_edit')
                                                            <a href="{{ route('settings.roles.edit', $row->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                                        @endcan
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
                        {{ $roles->links() }}
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
