@extends('layouts.panel')

@section('title')
    Strona Główna- Panel Kierowcy
@endsection

@section('custom-style')
<style>
    .test {
        min-height: 250px
    }
    
</style>
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Profil Pojazdu</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <!--Grid row-->
    <div class="row">
        <div class="col-lg-12 col-xxl-3">
            <div class="card shadow mb-4 bg-dark">
    			<div class="card-body">

                    <div class="d-flex align-items-center">
                        <img src="{{ Auth::user()->getPicture() }}" class="rounded-circle mb-3" height="105" alt="" loading="lazy">
                        <div class="ms-3">
                            <p class="fw-bold mt-0 mb-1 h5">
                                Solaris Urbino 12 IV electric
                            </p>
                            <div class="registration-plate d-one">
                                <div class="registration-plate__container registration-plate__size--medium registration-plate__pl registration-plate__pl-electric">
                                    <div class="signature signature__euro"></div>
                                    <div class="registration">
                                        <span>WR 008CU</span>
                                        <span class="vintage-icon"></span>
                                    </div>                                               
                                </div>
                            </div>
                            <p class="mb-0" style="color: {{Auth::user()->roles->first()->color}}"></p>
                        </div>
                    </div>
                    @if(count(Auth::user()->roles) > 1)
                        <p class="">Kierowcy na stan: <br>
                            @foreach(Auth::user()->roles as $key => $item)
                                @if($key >= 1)
                                    <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">[{{Auth::user()->code}}] {{Auth::user()->login}}</span>
                                @endif
                            @endforeach
                        </p>
                    @endif
                    <hr>
                    <div class="text-start">
                        <p class="mb-1">
                            <b>Numer taborowy:</b>
                            #2003
                        </p>
                        <p class="mb-1">
                            <b>Marka i model:</b>
                            Solaris Urbino 12 IV electric
                        </p>
                        <p class="mb-1"><b>Rok produkcji:</b> 2021</p>
                        <p class="mb-"><b>Typ pojazdu:</b> <span class="text-info">MAXI Niskopodłogowy</span></p>
                        <hr>
                        <p class="mb-0"><b>Przebieg</b> <span class="text-success">ważny do XX.XX.XXXX</span></p>
                        <button class="btn btn-block btn-primary grey darken-3"><i class="fas fa-eye"></i></button>
                        <div class="d-none">
                            <p class="mb-1"><b>Data rozpoczęcia pracy:</b> 23.10.2021</p>
                            <p class="mb-1"><b>Wykonane służby:</b> <span class="text-success">2</span> / <span class="text-danger">0</span></p>
                            <p class="mb-0"><b>Przejechana odległość:</b> 80.41 km</p>
                        </div>
                        <hr>
                        <div class="">
                            <p class="mb-0"><b>Skrzynia biegów:</b> <span class="badge bg-danger float-right">Nie dotyczy</span></p>
                            <p class="mb-0"><b>Pulpit:</b> <span class="badge bg-success float-right">ACTIA II Podium</span></p>
                            <p class="mb-0"><b>Zajezdnia:</b> <span class="text-secondary float-right">MPK Radom</span></p>
                            <hr>
                            <p class="mb-0"><b>Klimatyzacja:</b><i class="fas fa-check text-success float-right"></i></p>
                            <p class="mb-0"><b>Ogrzewanie:</b><i class="fas fa-check text-success float-right"></i></p>
                            <p class="mb-0"><b>Brygadówka:</b><i class="fas fa-times text-danger float-right"></i></p>
                            <p class="mb-0"><b>Biletomat:</b><i class="fas fa-times text-danger float-right"></i></p>
                            <p class=""><b>Inne:</b><i class="fas fa-minus text-info float-right"></i></p>
                        </div>
                        
                        <div class="">
                            <button class="btn btn-block btn-success"><i class="fas fa-edit me-1"></i>Edytuj</button>
                            <button class="btn btn-block btn-danger"><i class="fas fa-trash me-1"></i>Usuń</button>
                        </div>
                    </div>

    			</div>
    		</div>
        </div>
        <div class="col-lg-12 col-xxl-9">
            <div class="card shadow mb-4 bg-">
                <div class="card-body pb-0">
                    @include('panel.dokumenty.tabor.includes.historia')
                    @include('panel.dokumenty.tabor.includes.dziennik')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-body text-center test">
                            
                            <i class="fas fa-cogs my-3 mb-" style="font-size: 48px;"></i>
                            <h4 class="mb-3">Statystyki dla pojazdu</h4>
                            <p class="mt-2 mb-1">Więcej statystyk o pojeździe, dostępne dla wybranych pracowników</p>
                            <span class="text-muted">W budowie</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-lg-4">
                    <div class="card shadow mb-4 bg-dark">
                        <div class="card-body text-center test">
                            <h4>Profil Użytkownika</h4>
                            <i class="fas fa-user-edit" style="font-size: 48px;"></i>
                            <p class="mt-2">Aktualizuj na bieżąco metody weryfikacji i informacje zabezpieczające.</p>
                            <button type="button" class="btn btn-link" name="button">Zaktualizuj Informacje</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow mb-4 bg-dark">
                        <div class="card-body text-center test">
                            <h4>Pracodawca</h4>
                            <i class="fas fa-briefcase" style="font-size: 48px;"></i>
                            <p class="mt-2">Zobacz wszystkie organizacje, do których należysz.</p>
                            <button type="button" class="btn btn-link" name="button">Zobacz więcej</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow mb-4 bg-dark">
                        <div class="card-body text-center test">
                            <h4>Ustawienia</h4>
                            <i class="fas fa-cog" style="font-size: 48px;"></i>
                            <p class="mt-2">Personalizuj ustawienia konta i patrz, jak są używane Twoje dane.</p>
                            <button type="button" class="btn btn-link" name="button">Wyświetl Ustawienia</button>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row d-none">
                <div class="col-lg-4">
                    <div class="card shadow mb-4 bg-dark">
                        <div class="card-body text-center">
                            <h4>Urządzenia</h4>
                            <i class="fas fa-laptop" style="font-size: 48px;"></i>
                            <p class="mt-2">Wyłącz utracone urządzenie, a następnie przejrzyj informacje o połączonych urządzeniach.</p>
                            <button type="button" class="btn btn-link" name="button">Zarządzaj Urządzeniami</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow mb-4 bg-dark">
                        <div class="card-body text-center">
                            <h4>Hasło</h4>
                            <i class="fas fa-key" style="font-size: 48px;"></i>
                            <p class="mt-2">Wybierz silniejsze hasło lub zmień je, jeśli zna je inna osoba.</p>
                            <button type="button" class="btn btn-link" name="button">Zmień Hasło</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow mb-4 bg-dark">
                        <div class="card-body text-center">
                            <h4>Logowania</h4>
                            <i class="fas fa-user-lock" style="font-size: 48px;"></i>
                            <p class="mt-2">Zobacz, kiedy i gdzie się zalogowano, i sprawdź, czy coś wygląda nietypowo.</p>
                            <button type="button" class="btn btn-link" name="button">Sprawdź Ostatnią Aktywność</button>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <!-- col -->
    </div>
@endsection
