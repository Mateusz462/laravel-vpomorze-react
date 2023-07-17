@extends('layouts.panel')

@section('title')
    Linie - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Ustawienia</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Linie</li>
                </ol>
            </nav>
            @can('permission_create')
                <nav aria-label="breadcrumb">
                    <div class="breadcrumb-menu dropdown me-3 me-lg-1">
    					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
    						Wszystkie linie
    					</a>
    					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('settings.perms.create') }}">Stwórz linie</a>
    					</ul>
    				</div>
                </nav>
            @endcan
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        Dodaj nową linie
                    </h4>
                    <form action="{{ route('manager.transport.lines.store') }}" method="post">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                            <label class="form-label" for="name">Linia</label>
                            @error('imie')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="route" name="route" class="form-control @error('route') is-invalid @enderror" value="{{ old('route') }}" />
                            <label class="form-label" for="route">Wariant</label>
                            @error('imie')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <input type="text" id="direction" name="direction" class="form-control @error('direction') is-invalid @enderror" value="{{ old('direction') }}" />
                            <label class="form-label" for="direction">Kierunek</label>
                            @error('imie')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-auto mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="technic" />
                                <label class="form-check-label" for="technic">
                                    Linia techniczna
                                </label>
                                <i class="fas fa-question-circle"></i>
                            </div>
                        </div>
                        <div class="col-auto mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="suspended" />
                                <label class="form-check-label" for="suspended">
                                    Linia zawieszona
                                </label>
                                <i class="fas fa-question-circle"></i>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newroutetime" />
                                <label class="form-check-label" for="newroutetime">
                                    Zmiana Trasy
                                </label>
                                <i class="fas fa-question-circle"></i>
                            </div>
                        </div>
                        <div class="d-none">
                            <div class="form-outline mb-4">
                                <input type="text" id="text1" class="form-control"disabled />
                                <label class="form-label" for="text1">Ilość km</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="text2" class="form-control" disabled/>
                                <label class="form-label" for="text2">Punkty za 1km</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus me-1"></i>Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
		<div class="col-lg-9">
			<div class="card mb-4">
                <div class="row mb-1 p-4 pb-0">
                    <div class="col-12">
                        <h4 class="card-title mb-0">
                            Linie i warianty
                        </h4>
                    </div>
                </div>
				<div class="card-body pb-0">
                    <div id="lineslist-container" class="">
                        <div id="lineslist-loading" class="row">
                            <div class="col-12">
                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body text-center">
                                        <div class="text-center mb-3" v-if="loading">
                                            <div class="spinner-border mt-3 mb-2" style="width: 5rem; height:5rem" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div><br>
                                            <span class="text-center">Ładowanie linii...</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="lineslist-inner" class="row">
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

@section('javascript')
    <script type="text/javascript">
        var divlineslist = $('#lineslist-inner');
        $("#lineslist-loading").css("display", "block");
        $("#lineslist-inner").addClass("d-none");
        data = 'format=col-md-6 col-lg-4 col-xl-3'
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "http://localhost:8000/api/lines-get-all",
            data: data,
            success: function (response) {
                // console.log(response);
                divlineslist.empty();
                divlineslist.html(response);
                $('[data-mdb-toggle="tooltip"]').not( '[data-mdb-original-title]' ).tooltip();
                $("#lineslist-loading").css("display", "none");
                $("#lineslist-inner").removeClass("d-none");
            },error:function(response){
                divlineslist.empty();
                divlineslist.html('<div class="mt-5 mb-5 d-flex justify-content-center">'+
                    '<div class="p-3">'+
                        '<div class="first text-center">'+
                        '    <i class="fas fa-info-circle fa-6x"></i>'+
                        '    <h3 class="mt-3">Błąd ładowania danych</h3>'+
                        '    <p class="text-muted">'+
                        '        Spróbuj ponownie później'+
                        '    </p>'+
                    '    </div>'+
                    '</div>'+
                '</div>');
                $("#lineslist-loading").css("display", "none");
                $("#lineslist-inner").removeClass("d-none");
            }
        });
    </script>
@endsection
