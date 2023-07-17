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
@php $row = $line @endphp
    Pomiary
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card shadow mb-4" id="lineslist" >
                <div class="card-body text-center pb-0">
                    <div class="card shadow mb-4 {{ $row->color ? $row->color : 'bg-dark'  }}">
                        <div class="card-body text-start pb-">
                            <p class="mb- h2"><b>Linia:</b> {{ $row->name }}</p>
                            <p class="mb- h3"><b>Wariant:</b> {{ $row->route }}</p>
                            <p class="mb-2"><b>Kierunek:</b> {{ $row->direction }}</p>
                            <p class="card-text">
                                <button type="button" class="btn btn-white" data-mdb-toggle="tooltip" title="Edytuj wariant"><i class="far fa-edit"></i></button>    
                                <a href="{{ route('manager.transport.lines.index') }}" class="btn btn-primary"><i class="fas fa-undo me-1"></i>Wróć</a>
                            </p>
                        </div>
                    </div>
                    <h3 class="pb-2">Inne Linie:</h3>
                    <div id="lineslist-container" class="position-relative ps overflow-auto">
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
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-6 col-lg-9">
			<div class="card mb-4">
                <div class="row mb-1 p-4 pb-0">
                    <div class="col-12">
                        <h2 class="card-title text-center mb-2" data-mdb-toggle="tooltip" title="Linia: {{ $row->name }} / wariant: {{ $row->route }}">
                           Lista przystanków dla linii {{ $row->name }}/{{ $row->route }}
                        </h2>
                        <p id="day-type-text" class="h4 text-muted text-center">Rozkład: Powszedni roboczy</p>
                        <p class="text-center">
                            <a href="#" onClick="getBusstop('PR')" class="btn btn-secondary btn-sm">Powszedni roboczy</a>
                            <a href="#" class="btn btn-primary btn-sm disabled">Powszedni specjalny</a>
                            <a href="#" onClick="getBusstop('SR')" class="btn btn-secondary btn-sm">Sobotni roboczy</a>
                            <a href="#" class="btn btn-primary btn-sm disabled">Sobotni specjalny</a>
                            <a href="#" class="btn btn-primary btn-sm disabled">Powszedni okresowy</a>
                            <a href="#" onClick="getBusstop('NSR')" class="btn btn-secondary btn-sm">Niedzielne i Święta roboczy</a>
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div id="busstoplist-loading" class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4 bg-dark">
                                <div class="card-body text-center">
                                    <div class="text-center mb-3" v-if="loading">
                                        <div class="spinner-border mt-3 mb-2" style="width: 5rem; height:5rem" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div><br>
                                        <span class="text-center">Ładowanie listy przystanków...</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="busstoplist-inner" class="mb-4"></div>
                    <form id="form-add-busstop" class="mb-4">
                        <div id="form-add-busstop-loading" class="row" style="display: none">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4 bg-dark">
                                    <div class="card-body text-center">
                                        <div class="text-center mb-3" v-if="loading">
                                            <div class="spinner-border mt-3 mb-2" style="width: 5rem; height:5rem" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div><br>
                                            <span class="text-center">Wysyłanie danych...</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-add-busstop-inner">
                            <div class="row g-3">
                                <label>Dodaj przystanek:</label>
                                <div class="col-xs-8 col-sm-6 col-md-6 col-lg-10">
                                    <div class="form-outline">
                                        <input type="text" name="add-name" id="form-add-name" class="form-control" />
                                        <label class="form-label" for="form-add-name">Nazwa przystanku</label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" id="btn-add" class="btn btn-success">Zatwierdź</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mt-4">
                        <form action="" method="">
                            <div class="row">
                                <div class="col-2">
                                    <label for="przystanki">Skopiuj przystanki:</label>
                                                        <select id="przystanki" type="text" name="przystanki" class="form-control">
                                                
                                                    <option value="1">[P] TEST-01/1</option>
                                                
                                                    <option value="10">[S] TEST-01/1</option>
                                                
                                                    <option value="10">[S] TEST-01/1</option>
                                                
                                                    <option value="10">[S] TEST-01/1</option>
                                                
                                                    <option value="10">[S] TEST-01/1</option>
                                                
                                                    <option value="10">[S] TEST-01/1</option>
                                                                                                                </select>
                                                                                            </div>
                                <div class="col-3">
                                    <br>
                                    <button class="btn btn-danger" disabled=""><i class="fas fa-ban"></i> Skopiuj przystanki</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        data = 'format=col-12'
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "http://localhost:8000/api/lines-geat-all",
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
        getBusstop('PR')

        function getBusstop(day){
            var divbusstoplist = $('#busstoplist-inner');
            $("#busstoplist-loading").css("display", "block");
            $("#busstoplist-inner").css("display", "none");
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "http://localhost:8000/api/lines-get-busstop/{{ $row->id }}/"+day,
                //dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    divbusstoplist.empty();
                    divbusstoplist.html(response);
                    $('[data-mdb-toggle="tooltip"]').not( '[data-mdb-original-title]' ).tooltip();
                    $("#day-type-text").html('Rozkład: ' + $("#input-day-type-text").val());

                    $("#busstoplist-loading").css("display", "none");
                    $("#busstoplist-inner").css("display", "block");
                },error:function(response){
                    divbusstoplist.empty();
                    divbusstoplist.html('<div class="mt-5 mb-5 d-flex justify-content-center">'+
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
                    $("#busstoplist-loading").css("display", "none");
                    $("#busstoplist-inner").css("display", "block");
                }
            });

            
        }

        function FormDodawanie() {
            var form = '<div class="row g-3">'+
                            '   <label>Dodaj przystanek:</label>'+
                            '   <div class="col-xs-8 col-sm-6 col-md-6 col-lg-10">'+
                            '       <div class="form-outline">'+
                            '           <input type="text" name="add-name" id="form-add-name" class="form-control" />'+
                            '            <label class="form-label" for="form-add-name">Nazwa przystanku</label>'+
                            '        </div>'+
                            '    </div>'+
                            '    <div class="col-auto">'+
                            '        <button type="submit" id="btn-add" class="btn btn-success">Zatwierdź</button>'+
                            '    </div>'+
                            '</div>';
        }
        document.getElementById("form-add-busstop").addEventListener("submit", event => {
            

            event.preventDefault();
            var add_name = $("#form-add-name").val();
            var day_type = $("#input-day-type").val();
            var assignment = $(".busstop-assignment").length + 1
            var line_id = <?=$row->id?>;
            console.log(add_name, day_type, assignment, line_id);
            
            if (add_name.length === 0) {
                err = 1;
                $("#form-add-name").addClass("is-invalid");
                toastr.error('wszystkie wymagane pola.', 'Wypełnij poprawnie')
                console.error('Błąd! Wypełnij poprawnie wszystkie wymagane pola.')
            } else {
                $("#form-add-name").removeClass("is-invalid");
                $("#form-add-name").addClass("is-valid");

                $("#form-add-busstop-loading").css("display", "block");
                $("#form-add-busstop-inner").css("display", "none");
                function encodeQueryData(data) {
                    let ret = [];
                    for (let d in data)
                    ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
                    return ret.join('&');
                }
                var data = encodeQueryData({
                    'busstop': add_name,
                    'day_type': day_type,
                    'assignment': assignment,
                    'line_id': line_id,
                });

                $.ajax({
                    type: 'POST',
                    data: data,
                    url: 'http://localhost:8000/api/lines-add-busstop',
                    success: function (response) {
                        if(response.status == 'error'){
                            toastr.error(response)
                        }
                        $("#form-add-name").val("");
                        getBusstop(day_type)
                        console.log(response)
                    },error:function(response){
                        var error = '<div class="mt-5 mb-5 d-flex justify-content-center">'+
                            '<div class="p-3">'+
                                '<div class="first text-center">'+
                                '    <i class="fas fa-info-circle fa-6x"></i>'+
                                '    <h3 class="mt-3">Błąd wysyłania danych</h3>'+
                                '    <p class="text-muted">'+
                                '        <button class="btn btn-primary" onClick="FormDodawanie()">Spróbuj ponownie później</button>'+
                                '    </p>'+
                            '    </div>'+
                            '</div>'+
                        '</div>'
                        $('#form-add-busstop-inner').empty();
                        $('#form-add-busstop-inner').html(error);
                    }
                });
                $("#form-add-busstop-inner").css("display", "block");
                $("#form-add-busstop-loading").css("display", "none");
            }
            
        });
        
        function EditBusstop(id){
            $("#btn-times-" + id).show()
            $("#btn-edit-"+ id).hide()
            $("#busstop-time-"+ id).hide();
            $(".busstop-input-"+ id).removeClass("d-none");
            $("#busstop-button-"+ id).removeClass("d-none");   
        }

        function CancelEditBusstop(id){
            $("#btn-times-"+ id).hide()
            $("#btn-edit-"+ id).show()
            $("#busstop-time-"+ id).css("display", "block");
            $(".busstop-input-"+ id).addClass("d-none");
            $("#busstop-button-"+ id).addClass("d-none");
        }
    </script>
@endsection