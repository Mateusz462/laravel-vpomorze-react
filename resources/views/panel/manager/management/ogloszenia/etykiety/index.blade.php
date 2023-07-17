@extends('layouts.panel')

@section('title')
    Ogłoszenia - Panel Zarządzania Wirtualnego Pomorza
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
                    <li class="breadcrumb-item"><a href="{{ route('manager.management.ogloszenia.index') }}">Ogłoszenia</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Etykiety</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Etykiety
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('manager.management.ogloszenia.tags.create') }}">Stwórz etykietę</a>
                        <a class="dropdown-item" href="{{ route('manager.management.ogloszenia.index') }}">Ogłoszenia</a>
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
                                <i class="fas fa-tags"></i> Etykiety
                            </h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('manager.management.ogloszenia.index') }}" class="btn btn-outline-info"><i class="fas fa-bullhorn"></i> Ogłoszenia</a>
                            <a href="{{ route('manager.management.ogloszenia.tags.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Dodaj etykietę</a>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                         @if(count($AnnLabel) > 0)
                             <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Etykieta</th>
                                            <th>Akcje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($AnnLabel as $row)
                                            <tr>
                                                <td>
                                                    <!-- #c3bd5f -->
                                                    <h4><span class="badge rounded-pill text-dark" style="background-color: {{ $row->color }}">{{ $row->name }}</span></h4>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <a href="{{ route('manager.management.ogloszenia.tags.edit', $row->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--table-->
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
                        {{ $AnnLabel->links() }}
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
