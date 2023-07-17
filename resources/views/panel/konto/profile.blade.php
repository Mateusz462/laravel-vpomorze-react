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
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet"/>
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

                    <div class="d-flex align-items-center">
                        <img src="{{ $user->getPicture() }}" class="rounded-circle mb-3" height="105" alt="" loading="lazy">
                        <div class="ms-3">
                            <p class="fw-bold mt-0 mb-1 h5">
                                <span class="gdpr">
                                    <span class="name">{{ $user->imie }} {{ $user->nazwisko }}</span>
                                    <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                </span>
                            </p>
                            <p class="mb-0" style="color: {{ $user->roles->first()->color}}">[{{$user->code}}] {{$user->login}}</p>
                            <p class="mt-1">
                                <span class="badge rounded-pill text-dark" style="background-color: {{ $user->roles->first()->color }}">{{ $user->roles->first()->name }}</span>
                                @if(count($user->roles) > 1)
                                    <span class="badge rounded-pill" style="background-color:rgb(161, 161, 163)">+{{ count($user->roles)-1 }}</span>
                                @endif

                            </p>
                        </div>
                    </div>
                    @if(count($user->roles) > 1)
                        <p class="d-none">Pozostałe role: <br>
                            @foreach($user->roles as $key => $item)
                                @if($key >= 1)
                                    <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                @endif
                            @endforeach
                        </p>
                    @endif
                    <hr>
                    <div class="p- mb-3">
                        <div class="scroller-15bIdk scrollerSeparator-6DmwRQ thin-RnSY0a scrollerBase-1Pkza4" dir="ltr" style="overflow: auto; padding-right: 0px;">
                            <!-- Activity in game section -->
                            <div class="section-28YDOf">
                                <div class="activityUserPopoutV2-3eKqzY activity-3uaYny">
                                    <div class="headerContainer-1wJjOa flex-3BkGQD marginBottom8-emkd0_">
                                        <h2 class="defaultColor-1EVLSt heading-deprecated-12-semibold-3cWp6c defaultColor-1GKx81 headerTextNormal-Z8we9g headerText-3g1XK9 ellipsis-23LXbI" data-text-variant="heading-deprecated-12/semibold">
                                            <div class="overflow-1wOqNV">W grze</div>
                                        </h2>
                                    </div>
                                    <div class="bodyNormal-250CQK body-u1Y8uL flex-3BkGQD alignCenter-14kD11">
                                        <div class="assets-3PQvAh">
                                            <img alt="OMSI 2.3.004" src="https://cdn.discordapp.com/app-assets/1042719186062934016/1042757671008354344.png" class="assetsLargeImageUserPopoutV2-9ksyvz assetsLargeImage-8U5dlz noUserDrag-2HbVzE assetsLargeMaskUserPopoutV2-2oZjbP">
                                            <img alt="AUXI Plugin 1.3.1.1" src="https://cdn.discordapp.com/app-assets/1042719186062934016/1042721010245443594.png" class="assetsSmallImageUserPopoutV2-1goF56 assetsSmallImage-2JNB1y noUserDrag-2HbVzE" aria-label="AUXI Plugin 1.3.1.1">
                                        </div>
                                        <div class="contentImagesUserPopoutV2-2Mcg9w content-tXPNDw" style="flex: 1 1 auto;">
                                            <div class="defaultColor-1EVLSt text-sm-semibold-S5fJwz nameNormal-2fPMD2 ellipsis-23LXbI textRow-1sENuL" title="OMSI 2 (AUXI)" data-text-variant="text-sm/semibold">
                                                <span class="activityName-3YXl6e">OMSI 2 (AUXI)</span>
                                            </div>
                                            <div title="MA3 103.465 #140-#142 | MZKP Strzelce 2.71" class="details-2-ciHo ellipsis-23LXbI textRow-1sENuL">MA3 103.465 #140-#142 | MZKP Strzelce 2.71</div>
                                            <div class="state-2NT76I ellipsis-23LXbI textRow-1sENuL">
                                                <span title="(16:02) Os. Zwyciestwa Koncowy 11">(16:02) Os. Zwyciestwa Koncowy 11</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-2S1XBF flex-3BkGQD vertical-3aLnqW flex-3BkGQD directionColumn-3pi1nm justifyStart-2Mwniq alignStretch-Uwowzr wrap-7NZuTn buttonsWrapper-2ARRp1 vertical-qPeOMD" style="flex: 0 1 auto;">
                                        <button type="button" class="btn btn-primary btn-block text-lowercase grey darken-3">
                                            <div class="contents-3NembX">https://auxi.app/</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Roles section -->
                            <div class="section-28YDOf">
                                <div class="activityUserPopoutV2-3eKqzY activity-3uaYny">
                                    <div class="headerContainer-1wJjOa flex-3BkGQD marginBottom8-emkd0_">
                                        <h2 class="defaultColor-1EVLSt heading-deprecated-12-semibold-3cWp6c defaultColor-1GKx81 headerTextNormal-Z8we9g headerText-3g1XK9 ellipsis-23LXbI" data-text-variant="heading-deprecated-12/semibold">
                                            <div class="overflow-1wOqNV">Rangi</div>
                                        </h2>
                                    </div>
                                    <div class="root-jbEB5E flex-3BkGQD wrap-7NZuTn roles-3vQPxb" aria-label="Role" role="list" tabindex="0" data-list-id="roles-fa06f753-3011-4fb4-8970-18159620dd6e">
                                        <div class="role-2TIOKu flex-3BkGQD alignCenter-14kD11 rolePill-78LFtg" aria-label="Dyspozytornia" tabindex="-1" role="listitem" data-list-item-id="roles-fa06f753-3011-4fb4-8970-18159620dd6e___846101070785937459">
                                            <div class="roleRemoveButton-17oXnT" tabindex="-1" aria-hidden="false" aria-label="Usuń rolę Przewozy Akcent" role="button">
                                                <span class="roleCircle-3TFUOr desaturateUserColors-1O-G89" style="background-color: rgb(241, 196, 15);"></span>
                                                <svg aria-hidden="true" role="img" class="roleRemoveIcon-387wKV" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="var(--primary-630)" d="M18.4 4L12 10.4L5.6 4L4 5.6L10.4 12L4 18.4L5.6 20L12 13.6L18.4 20L20 18.4L13.6 12L20 5.6L18.4 4Z"></path>
                                                </svg>
                                            </div>
                                            <div aria-hidden="true" class="roleName-2ZJJYR">
                                                <div class="defaultColor-1EVLSt text-xs-medium-311pdh roleNameOverflow-Xok3NR" data-text-variant="text-xs/medium">Dyspozytornia</div>
                                            </div>
                                        </div>
                                        <div class="role-2TIOKu flex-3BkGQD alignCenter-14kD11 rolePill-78LFtg" aria-label="Przewozy Akcent" tabindex="-1" role="listitem" data-list-item-id="roles-fa06f753-3011-4fb4-8970-18159620dd6e___889207380506734662">
                                            <div class="roleRemoveButton-17oXnT" tabindex="-1" aria-hidden="false" aria-label="Usuń rolę Przewozy Akcent" role="button">
                                                <span class="roleCircle-3TFUOr desaturateUserColors-1O-G89" style="background-color: rgb(241, 196, 15);"></span>
                                                <svg aria-hidden="true" role="img" class="roleRemoveIcon-387wKV" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="var(--primary-630)" d="M18.4 4L12 10.4L5.6 4L4 5.6L10.4 12L4 18.4L5.6 20L12 13.6L18.4 20L20 18.4L13.6 12L20 5.6L18.4 4Z"></path>
                                                </svg>
                                            </div>
                                            <div aria-hidden="true" class="roleName-2ZJJYR">
                                                <div class="defaultColor-1EVLSt text-xs-medium-311pdh roleNameOverflow-Xok3NR" data-text-variant="text-xs/medium">Przewozy Akcent</div>
                                            </div>
                                        </div>
                                        <button aria-expanded="false" class="btn btn-primary text-lowercase grey darken-3 addButton-1_dZYu actionButton-1YKTU0 role-2TIOKu flex-3BkGQD alignCenter-14kD11 justifyCenter-rrurWZ rolePill-78LFtg" aria-label="Dodaj rolę" type="button" role="listitem" data-list-item-id="roles-fa06f753-3011-4fb4-8970-18159620dd6e___overflow-add-roles-415577862440222720" tabindex="-1">
                                            <svg class="addButtonIcon-3HZ_2f" aria-hidden="true" role="img" width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M20 11.1111H12.8889V4H11.1111V11.1111H4V12.8889H11.1111V20H12.8889V12.8889H20V11.1111Z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-start">
                        <p class="mb-1">
                            <b>Imię i nazwisko:</b>
                            <span class="gdpr">
                                <span class="name">{{ $user->imie }} {{ $user->nazwisko }}</span>
                                <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                            </span>
                        </p>
                        <p class="mb-1">
                            <b>Adres email:</b>
                            <span class="gdpr">
                                <span class="name">{{ $user->email }}</span>
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
                        <p class="mb-1"><b>Przyjął do pracy:</b> <span style="color: {{$user->roles->first()->color}}">[{{$user->code}}] {{$user->login}}</span></p>
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
