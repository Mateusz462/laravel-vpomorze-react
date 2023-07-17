@extends('layouts.panel')

@section('title')
    Ankiety - Panel Zarządzania Wirtualnego Pomorza
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
                    <li class="breadcrumb-item"><a href="{{ route('survey.index') }}">Ankiety</a></li>
                    <li class="breadcrumb-item text-warning">To jest Pierwsza Ankieta</li>
                    <li class="breadcrumb-item active" aria-current="page">Odpowiedzi</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Ankiety
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('manager.management.ogloszenia.create') }}">Dodaj ankiete</a>
                        <a class="dropdown-item" href="{{ url('admin.auth.user.deactivated') }}">Etykiety</a>
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
                                <i class="fas fa-bullhorn"></i> Ankieta: <span class="text-warning">To jest Pierwsza Ankieta</span> - <small class="text-muted">odpowiedzi</small>
                            </h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('survey.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Zobacz raport</a>
                            <a href="{{ route('survey.create') }}" class="btn btn-danger"><i class="fas fa-plus"></i> Edytuj ankiete</a>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                         @if(count($ogloszenia) > 0)
                             <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Q1 Masz teraz czas?</th>
                                            <th>Q2 I jak? Masz?</th>
                                            <th>Q3 A miałeś?</th>
                                            <th>Q4 Które z opcji ci się najbardziej p...</th>
                                            <th>Q5 Jak to jest być mechanikiem? Dobrze?</th>
                                            <th>Q6 Napisz coś</th>
                                            <th>Q7 To wszystko</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                                <td>
                                                    Daj mi chwile
                                                </td>
                                                <td>
                                                    niue
                                                </td>
                                                <td>
                                                    Nigdy
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-black" disabled>1</button>
                                                        <button type="button" class="btn btn-dark" disabled>2</button>
                                                        <button type="button" class="btn btn-dark" disabled>3</button>
                                                        <button type="button" class="btn btn-black" disabled>4</button>
                                                        <button type="button" class="btn btn-black" disabled>5</button>
                                                        <button type="button" class="btn btn-black" disabled>6</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    Moim zdaniem to nie ma tak, że dobrze, albe że niedobrze
                                                </td>
                                                <td>
                                                    coś
                                                </td>
                                                <td>
                                                    ok
                                                </td>
                                            </tr>
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
                        {{ $ogloszenia->links() }}
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
