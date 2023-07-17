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
                    <li class="breadcrumb-item active" aria-current="page">Profil Użytkownika</li>
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
                    ACCOUNT
                    <div class="d-flex align-items-center">
                        <img src="{{ Auth::user()->getPicture() }}" class="rounded-circle mb-3" height="105" alt="" loading="lazy">
                        <div class="ms-3">
                            <p class="fw-bold mt-0 mb-1 h5">
                                <span class="gdpr">
                                    <span class="name">{{ Auth::user()->imie }} {{ Auth::user()->nazwisko }}</span>
                                    <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                </span>
                            </p>
                            <p class="mb-0" style="color: {{Auth::user()->roles->first()->color}}">[{{Auth::user()->code}}] {{Auth::user()->login}}</p>
                            <p class="mt-1">
                                <span class="badge rounded-pill text-dark" style="background-color: {{ auth()->user()->roles->first()->color }}">{{ auth()->user()->roles->first()->name }}</span>
                                @if(count(Auth::user()->roles) > 1)
                                    <span class="badge rounded-pill" style="background-color:rgb(161, 161, 163)">+{{ count(auth()->user()->roles)-1 }}</span>
                                @endif

                            </p>
                        </div>
                    </div>
                    @if(count(Auth::user()->roles) > 1)
                        <p class="d-none">Pozostałe role: <br>
                            @foreach(Auth::user()->roles as $key => $item)
                                @if($key >= 1)
                                    <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                @endif
                            @endforeach
                        </p>
                    @endif
                    <hr>
                    <div class="text-start">
                        <p class="mb-1">
                            <b>Imię i nazwisko:</b>
                            <span class="gdpr">
                                <span class="name">{{ Auth::user()->imie }} {{ Auth::user()->nazwisko }}</span>
                                <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                            </span>
                        </p>
                        <p class="mb-1">
                            <b>Adres email:</b>
                            <span class="gdpr">
                                <span class="name">{{ Auth::user()->email }}</span>
                                <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                            </span>
                        </p>
                        <p class="mb-1"><b>Data dołączenia:</b> 23.10.2021</p>
                        <p class="mb-"><b>Zatrudniony:</b> <span class="text-info">2 raz!</span></p>
                        <hr>
                        <p class="mb-0"><b>Doświadczenie</b></p>
                        <button class="btn btn-block btn-primary grey darken-3"><i class="fas fa-eye"></i></button>
                        <div class="d-none">
                            <span class="">Były kierowca w:</span>
                            <ul class="list-unstyled">
                                <li>- KM Kozłów</li>
                                <li>- vBKM</li>
                                <li>- MZKP Strzelce</li>
                                <li>- vZTM Szczecin</li>
                                <li>- vZTM Warszawa</li>
                            </ul>
                            <p><b>Motywacje</b><br>
                                Posiadam duże doświadczenie zarówno na stanowisku kierowcy
                                jak i stanowisku dyspozytora (KM Kozłów).
                                Jazda w symulatorze OMSI 2 sprawia mi przyjemność
                                jednak nie w ramach jeżdżenia sobie ot tak dla siebie,
                                a właśnie w ramach wykonywania służb dla vfim
                            </p>
                        </div>
                        
                        <hr>
                        <div class="d-none">
                            <button class="btn btn-block btn-success">Przyjmij</button>
                            <button class="btn btn-block btn-danger">Odrzuć</button>
                        </div>
                        <p class="mb-1"><b>Przyjął do pracy:</b> <span style="color: {{Auth::user()->roles->first()->color}}">[{{Auth::user()->code}}] {{Auth::user()->login}}</span></p>
                        <div class="">
                            <p class="mb-1"><b>Data rozpoczęcia pracy:</b> 23.10.2021</p>
                            <p class="mb-1"><b>Wykonane służby:</b> <span class="text-success">2</span> / <span class="text-danger">0</span></p>
                            <p class="mb-1"><b>Przejechana odległość:</b> 80.41 km</p>
                            <p class="mb-1"><b>Zdobyte punkty:</b> 202</p>
                            @include('panel.konto.includes.workrange-days')
                        </div>
                    </div>

    			</div>
    		</div>
        </div>
        <div class="col-lg-12 col-xxl-9">
            <div class="card shadow mb-4 bg-">
                <div class="card-body pb-0">
                    @include('panel.konto.includes.wnioski')
                    @include('panel.konto.includes.raporty')
                </div>
            </div>
            <div class="row">
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
