@extends('layouts.panel')

@section('title')
    Etykiety - Panel Zarządzania Wirtualnego Pomorza
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
                    <li class="breadcrumb-item"><a href="{{ route('manager.management.ogloszenia.tags.index') }}">Etykiety</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dodaj etykietę</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Dodaj etykietę
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('manager.management.ogloszenia.tags.index') }}">Etykiety</a>
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
                                <i class="fas fa-edit"></i> Edytuj etykietę: {{ $tag->name }}
                            </h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('manager.management.ogloszenia.tags.index') }}" class="btn btn-outline-danger"><i class="fas fa-tags"></i> Etykiety</a>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                        <div class="mt-4">
                            <form action="{{ route('manager.management.ogloszenia.tags.update', $tag->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card mb-4 bg-dark">
                                            <div class="card-body">
                                                <h4 class="card-title mb-0">
                                                    <i class="fas fa-database"></i> Podstawowe dane
                                                </h4>
                                                <div class="mt-4">
                                                    <div class="form-outline mt-4">
                                                        <input type="text" id="name" name="name" class="form-control" value="{{ $tag->name }}"/>
                                                        <label class="form-label" for="name">Nazwa</label>
                                                    </div>
                                                    <div class="form-outline mt-4">
                                                        <input type="color" id="color" name="color" class="form-control" value="{{ $tag->color }}"/>
                                                        <label class="form-label" for="color">Kolor</label>
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
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
