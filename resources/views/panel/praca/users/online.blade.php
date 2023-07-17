@extends('layouts.panel')

@section('title')
    Użytkownicy - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet"/>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top d-none">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Menedżer firmy</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Użytkownicy</li>
                </ol>
            </nav>
            <div class="col d-flex justify-content-md-end h-100 mx-3">
                <div class="rounded-3 d-flex justify-content-center align-items-center me-3">
                    <a class="btn btn-link active" href="{{ route('users.card') }}"><i class="fas fa-th"></i></a>
                </div>
                <div class="rounded-2 d-flex justify-content-center align-items-center">
                    <a class="btn btn-link" href="{{ route('users.list') }}"><i class="fas fa-bars"></i></a>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb-menu dropdown me-3 me-lg-1">
					<a class="breadcrumb-item dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						Wszyscy Użytkownicy
					</a>
					<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.card') }}">Wszyscy Użytkownicy</a>
                        <a class="dropdown-item" href="{{ route('users.create') }}">Stwórz użytkownika</a>
                        <a class="dropdown-item" href="{{ url('admin.auth.user.deactivated') }}">Dezaktywowowani użytkownicy</a>
                        <a class="dropdown-item" href="{{ url('admin.auth.user.deleted') }}">Zwolnieni użytkownicy</a>
					</ul>
				</div>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <h3 class="mb-4"><b><i class="fas fa-users me-2"></i>Użytkownicy</b></h3>
        </div>
    </div>
    <div class="col-4">
        <div class="itemCard-3Etziu wrapper-2RrXDg outer-2JOHae padded-2NSY6O interactive-2zD88a" tabindex="0" aria-expanded="false" aria-haspopup="menu" role="button">
            <div>
                <header class="headerFull-34WFWN header-3jUeHi">
                    <div class="wrapper-3Un6-K headerAvatar-GgCKcl" role="img" aria-label="Neoplanovsky, Dostępny" aria-hidden="false" style="width: 32px; height: 32px;">
                        <svg width="40" height="40" viewBox="0 0 40 40" class="mask-1y0tyc svg-1G_H_8" aria-hidden="true">
                            <foreignObject x="0" y="0" width="32" height="32" mask="url(#svg-mask-avatar-status-round-32)">
                                <div class="avatarStack-3Bjmsl"><img src="https://cdn.discordapp.com/avatars/601062679179689984/c1db002f5c80851d7ff88edec45a86be.webp?size=32" alt=" " class="avatar-31d8He" aria-hidden="true"></div>
                            </foreignObject>
                            <rect width="10" height="10" x="22" y="22" fill="#23a55a" mask="url(#svg-mask-status-online)" class="pointerEvents-2KjWnj"></rect>
                        </svg>
                    </div>
                    <div>
                        <div class="defaultColor-1EVLSt text-md-semibold-2VMhBr textContent-TsKzji" data-text-variant="text-md/semibold">Neoplanovsky</div>
                        <div class="text-sm-normal-AEQz4v textContent-TsKzji" data-text-variant="text-sm/normal" style="color: var(--header-secondary);"><span>TruckersMP – 59min</span></div>
                    </div>
                    <img src="https://cdn.discordapp.com/app-icons/989466304085917746/decc801127bd3e78300c7f288a502ff3.webp?size=64&amp;keep_aspect_ratio=false" alt="" class="headerIcon-2ra-HY">
                </header>
                <div class="body-16rSsp inset-SbsSFp">
                    <section class="section-3G9aLW">
                        <div class="activitySection-20iylG">
                            <div class="activitySectionAssets-1wpe42"><img alt="" src="https://cdn.discordapp.com/app-assets/989466304085917746/989472789541052476.png" class="largeImage-2EIggm largeImageMask-2KA28T"><img alt="Euro Truck Simulator 2" src="https://cdn.discordapp.com/app-assets/989466304085917746/989470608964329562.png" class="smallImage-m2dwC4"></div>
                            <div>
                                <div class="defaultColor-1EVLSt text-sm-semibold-S5fJwz textContent-TsKzji" data-text-variant="text-sm/semibold">ETS2: ProMods | ID: 977</div>
                                <div class="defaultColor-1EVLSt text-xs-normal-3O7EaX textContent-TsKzji" data-text-variant="text-xs/normal">In: Zamość | MAN TGX</div>
                                <div class="defaultColor-1EVLSt text-xs-normal-3O7EaX textContent-TsKzji" data-text-variant="text-xs/normal">
                                    <div>Upłynęło 59:16</div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-4">
        @if(count($users) > 0)
            <div class="row col-md-6 col-lg-12" style="font-size:12px;">
                @foreach ($users as $user)
                    <div class="card shadow mb-4 bg-dark border">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->getPicture() }}" class="rounded-circle" height="60" alt="" loading="lazy">
                                <div class="ms-3">
                                    <p class="fw-bold mt-0 mb-0 h6">
                                        <span class="gdpr">
                                            <span class="name">{{ $user->imie }} {{ $user->nazwisko }}</span>
                                            <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                        </span>
                                    </p>
                                    <p class="mb-0" style="color: {{ $user->roles->first()->color}}">[{{$user->code}}] {{$user->login}}</p>
                                    
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
                            <hr class="d-none">
                            <div class="p- dnone mb-3">
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
                        </div>
                    </div>
                @endforeach
            </div>
            <!--col-->
            {{ $users->links() }}
        @else
            <div class="col-lg-12">
                <div class="card shadow mb-4 bg-warning">
                    <div class="card-body text-center">
                        <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!--row-->
@endsection
