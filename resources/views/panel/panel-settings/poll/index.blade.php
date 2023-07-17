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
                    <li class="breadcrumb-item active" aria-current="page">Ankiety</li>
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
                                <i class="fas fa-bullhorn"></i> Ankiety
                            </h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('survey.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Dodaj ankiete</a>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                         @if(count($survey) > 0)
                             <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Opublikowana</th>
                                            <th>Tytuł</th>
                                            <th>Wyświetlenia</th>
                                            <th>Odpowiedzi</th>
                                            <th>Stworzono</th>
                                            <th>Ostatnia odpowiedź</th>
                                            <th>Akcje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($survey as $row)
                                            <tr>
                                                <td>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="form11Example4" @if($row->status == 1) checked @endif/>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5>{{$row->name}}</h5>
                                                </td>
                                                <td>
                                                    Nigdy
                                                </td>
                                                <td>

                                                        Nigdy2
                                                </td>
                                                <td>

                                                    {{ $row->created_at }}
                                                </td>
                                                <td>
                                                    {{ $row->created_at }}
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('survey.take', $row->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('survey.show', $row->id)}}" class="btn btn-secondary"><i class="fas fa-chart-line"></i></a>
                                                        <a href="{{ route('survey.show', $row->id)}}" class="btn btn-success"><i class="far fa-address-card"></i></a>
                                                        <a href="{{ route('survey.edit', $row->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
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
                        {{ $survey->links() }}
                    </div>
                    <!--row-->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
@endsection
