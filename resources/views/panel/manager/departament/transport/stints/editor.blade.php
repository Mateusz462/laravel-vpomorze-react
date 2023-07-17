@extends('layouts.panel')

@section('title')
    Linie - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top border-bottom">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('manager.transport-department') }}">Dział Przewozów</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Służby</li>
                </ol>
            </nav>
            @can('permission_create')
                <nav aria-label="breadcrumb">
                    <div class="breadcrumb-menu dropdown me-3 me-lg-1 d-none">
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
        <div class="col-12">
            <div class="card shadow-5-strong border bg-dark mb-4">
                <div class="card-body text-center">
                    <h1>Służba: {{ $brigade->stint->day_type }}-{{ $brigade->stint->name }}/{{ $brigade->number }} dla ZTM Ostaszewo</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card -dark mb-4">
                <div class="card-body pb-0">
                    <p class="mb-0">
                        <b class="mb-4">Przewoźnik:</b>
                        <span class="badge badge-success float-right">
                            <i class="fas fa-shield-alt"></i> ZTM Ostaszewo
                        </span>
                    </p>
                    <p class="mb-0">
                        <b class="mb-3">Pojazdy dopuszczone:</b>
                        @foreach(json_decode($brigade->typ_pojazdu) as $opcja)
                            <span class="badge badge-info ms-1 float-right">
                                <i class="fas fa-bus-alt"></i> {{ $opcja }}
                            </span>
                        @endforeach
                    </p>
                    <p class="mb-0">
                        <b class="mb-4">Pojazdy zabytkowe:</b>
                        <span class="float-right">
                            @if($brigade->old_vehicles)
                                <i style="color: green;" class="fa fa-check"></i>
                            @else
                                <i style="color: red;" class="fa fa-times"></i>
                            @endif
                        </span>
                    </p>
                    <p class="mb-0">
                        <b class="mb-3">Nocka:</b>
                        <span class="float-right">
                            @if($brigade->night)
                                <i style="color: green;" class="fa fa-check"></i>
                            @else
                                <i style="color: red;" class="fa fa-times"></i>
                            @endif
                        </span>
                    </p>
                    <p class="">
                        <b class="mb-3">Rodzaj brygady:</b>
                        <span class="badge badge-danger float-right">
                            <i class="fas fa-times-circle"></i> Niezdefiniowany
                        </span>
                    <p>
                    <button class="btn btn-block btn-info"><i class="fas fa-edit me-2"></i>Edytuj</button>
                </div>
            </div>
            <div class="card shadow mb-4" id="lineslist" >
                <div class="card-body">
                    <h3 class="pb-2">Przypisz Linie:</h3>
                    <div id="lineslist-container">
                        <div id="lineslist-loading" class="row">
                            <div class="col-lg-12">
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
                        <div id="lineslist-inner"></div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-6 col-lg-9">
			<div class="card mb-4">
				<div class="card-body pb-0">
                    <div id="brigadeslist-container" class="">
                        <form class="row mb-3" action="" method="post">
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="">Godzina wyjazdu z zajezdni:</label>
                                    <input id="brygada" type="time" name="godzina_wyjazd" class="form-control" date-inputmask="HH:ii" value="">
                                </div>
                                <button type="submit" class="btn btn-success m">Zapisz</button>
                            </div>
                        </form>
                        <p class="mb-0">
                            Kursy:
                        </p>
                        <div id="brigadeslist-loading" class="row">
                            <div class="col-12">
                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body text-center">
                                        <div class="text-center mb-3" v-if="loading">
                                            <div class="spinner-border mt-3 mb-2" style="width: 5rem; height:5rem" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div><br>
                                            <span class="text-center">Ładowanie kursów...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kurslist-inner" class="row mb-3">
                            <div class="col-lg-6 col-xl-3">
                                <div class="card bg-dark mt-3">
                                    <div class="card-body">
                                        <b>1.</b> 1/01 <br>
                                        <label for="">Godzina odjazdu z pętli:</label>
                                        <input type="hidden" name="id[]" value="61">
                                        <div class="input-group mb-3">
                                            <input id="godzina" type="time" name="godzina[]" class="form-control" date-inputmask="HH:ii" value="05:20:00">
                                            <button class="btn btn-link btn-sm text-success" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="row mb-3" action="" method="post">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="">Godzina zjazdu do zajezdni:</label>
                                    <input id="brygada" type="time" name="godzina_zjazd" class="form-control" date-inputmask="HH:ii" value="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success m">Zapisz</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mb-3 d-none">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="">Miejsce zmiany:</label>
                                    <select class="form-control" name="">
                                        <option value="" selected disabled="">wybierz</option>
                                        <option value="1">Os. Południe</option>
                                        <option value="2">Nastepny Przystanek</option>
                                        <option value="3">Limanowskiego / Wałowa</option>
                                        <option value="4">Struga / Pl. Jagieloński</option>
                                        <option value="5">Os. Gołębiów I</option>
                                        <option value="6">1</option>
                                        <option value="7">Kozienicka / Żółkiewskiego</option>
                                        <option value="8">Gołębiów / Fołtyn</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-success m">Zapisz</button>
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
        
        const lineslistclass = document.querySelector('#lineslist-container');
        const lineslist = new PerfectScrollbar(lineslistclass);
        var divlineslist = $('#lineslist-inner');
        $("#lineslist-loading").css("display", "block");
        $("#lineslist-inner").css("display", "none");
        data = 'format=col-12&action=course-editor'
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
                $("#lineslist-inner").css("display", "block");
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
                $("#lineslist-inner").css("display", "block");
            }
        });


        var divbrigadeslist = $('#kurslist-inner');
        $("#brigadeslist-loading").css("display", "block");
        $("#kurslist-inner").addClass("d-none");

        const height = $('#brigadeslist-container').height()
        $("#lineslist-container").height(height);
        data = 'format=col-lg-6 col-xl-4'
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "http://localhost:8000/api/stints-brigades-get-all/{{ $brigade->stint->id }}",
            data: data,
            success: function (response) {
                //divbrigadeslist.empty();
                //divbrigadeslist.html(response);
                $('[data-mdb-toggle="tooltip"]').not( '[data-mdb-original-title]' ).tooltip();
                $("#brigadeslist-loading").css("display", "none");
                $("#kurslist-inner").removeClass("d-none");
                const height = $('#brigadeslist-container').height()
                $("#lineslist-container").height(height);
            },error:function(response){
                divbrigadeslist.empty();
                divbrigadeslist.append('<div class="mt-5 mb-5 d-flex justify-content-center">'+
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
                $("#brigadeslist-loading").css("display", "none");
                $("#kurslist-inner").removeClass("d-none");
                const height = $('#brigadeslist-container').height()
                $("#lineslist-container").height(height);
            }
        });
    </script>
@endsection
