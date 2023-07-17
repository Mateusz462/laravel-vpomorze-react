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
        <div class="col-lg-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-info-circle"></i> Pamiętaj, wszelkie zmiany które zapiszesz, mogą mieć wpływ na funkcjonowanie całego systemu!
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h2"><b>Służba:</b> {{ $stint->name }}</p>
                    <p class="h3 mb-3"><b>Typ dnia:</b> {{ $stint->day_type }}</p>
                    <p class="card-text">
                        <button type="button" class="btn btn-white" data-mdb-toggle="tooltip" title="Edytuj wariant"><i class="far fa-edit"></i></button>    
                        <a href="{{ route('manager.transport.stints.index') }}" class="btn btn-primary"><i class="fas fa-undo me-1"></i>Wróć</a>
                    </p>
                </div>
            </div>
            <div class="card bg-dark mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">
                        Edytuj służbę
                    </h4>
                    <form action="{{ route('manager.transport.lines.store') }}" method="post">
                        @csrf
                        <div class="form-outline mb-3">
                            <input type="text" id="number" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" />
                            <label class="form-label" for="number">Nazwa służby</label>
                            @error('imie')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="role1">Typ dnia:</label>
                            <select class="form-select @error('tags') is-invalid @enderror" name="tag1s[]" multiple id="tag1s">
                                
                                <option value="11">MIDI</option>
                                <option value="12">MAXI</option>
                                <option value="13">Normal</option>
                                <option value="14">MEGA</option>
                                
                            </select>
                            @if($errors->has('tags'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tags') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-2 d-none">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" />
                                <label class="form-check-label" for="flexCheckDefault1">Pojazdy zabytkowe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" />
                                <label class="form-check-label" for="flexCheckDefault2">Nocka</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i>zapisz</button>
                    </form>
                </div>
            </div>
            <div id="brigadeslist-add-form">
                <div class="card bg-dark mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-3">
                            Dodaj nową brygadę
                        </h4>
                        <form action="{{ route('manager.transport.stints.brigade.store', ['stint' => $stint->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="stint" value="{{ $stint->id }}">
                            <div class="form-outline mb-3">
                                <input type="text" id="number" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" />
                                <label class="form-label" for="number">Numer brygady</label>
                                @error('imie')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="vehicle_class">Pojazdy dopuszczone:</label>
                                <select class="form-control @error('vehicle_class') is-invalid @enderror" name="vehicle_class[]" id="vehicle_class" multiple >
                                    <option value="MIDI">MIDI</option>
                                    <option value="MAXI">MAXI</option>
                                    <option value="Normal">Normal</option>
                                    <option value="MEGA">MEGA</option>
                                </select>
                                @if($errors->has('vehicle_class'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('vehicle_class') }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="old_vehicles" type="checkbox" value="1" id="old_vehicles" />
                                    <label class="form-check-label" for="old_vehicles">Pojazdy zabytkowe</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="night" type="checkbox" value="1" id="night" />
                                    <label class="form-check-label" for="night">Nocka</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-plus me-1"></i>Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-lg-9">
			<div class="card mb-4">
                <div class="row mb-1 p-4 pb-0">
                    <div class="col-12">
                        <h4 class="card-title mb-0">
                            Lista brygad dla służby {{ $stint->day_type }} - {{ $stint->name }}
                        </h4>
                    </div>
                </div>
				<div class="card-body pb-0">
                    <div id="brigadeslist-container" class="">
                        <div id="brigadeslist-loading" class="row">
                            <div class="col-12">
                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body text-center">
                                        <div class="text-center mb-3" v-if="loading">
                                            <div class="spinner-border mt-3 mb-2" style="width: 5rem; height:5rem" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div><br>
                                            <span class="text-center">Ładowanie brygad...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="brigadeslist-inner" class="row">
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
        var divbrigadeslist = $('#brigadeslist-inner');
        $("#brigadeslist-loading").css("display", "block");
        $("#brigadeslist-inner").addClass("d-none");
        $("#brigadeslist-add-form") 
        data = 'format=col-lg-6 col-xl-4'
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "http://localhost:8000/api/stints-brigades-get-all/{{ $stint->id }}",
            data: data,
            success: function (response) {
                divbrigadeslist.empty();
                divbrigadeslist.html(response);
                $('[data-mdb-toggle="tooltip"]').not( '[data-mdb-original-title]' ).tooltip();
                $("#brigadeslist-loading").css("display", "none");
                $("#brigadeslist-inner").removeClass("d-none");
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
                $("#brigadeslist-inner").removeClass("d-none");
            }
        });
    </script>
@endsection
