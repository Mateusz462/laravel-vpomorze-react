@extends('layouts.panel')

@section('title')
    Strona Główna- Panel Kierowcy
@endsection

<?php $strona = false; $data = 2; ?>
@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Strona Główna</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
        <!-- row -->
        <!-- <div class="row">
            <div class="col">
                <h3>Witaj {{ Auth::user()->login }}!</h3>
                <p>Dostępne są oferty pracy na wybrane stanowiska:</p>
            </div>
        </div> -->        

        <!--Grid row-->
        <div class="row">
            <div class="col-lg-12 col-xxl-9">
                <h3 class="mb-4"><i class="fas fa-home me-2"></i><b>Strona Główna</b></h3>
                <div class="row" v-if="!loading">
                    <div class="col-12">
                        <div class="card mb-4" style="background-color:rgba(208, 53, 95, 0.71)">
                            <div class="card-body">
                                W Panelu Wirtualnego Pomorza pojawiła się <b>ankieta do wypełnienia!</b><br>
                                <a class="" onclick="ZobaczModal()"><i class="fas fa-eye"></i> Zobacz więcej</a>
                            </div>
                        </div>
                    </div>
                </div>
                <home-component :userlogin="'{{ Auth::user()->login }}'">
                
                <div id="vztm-shoutbox">
                </div>
                
                <div class="card shadow mb-4 d-none">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-5">
                                <h3 class="font-weight-bold mb-2">
                                    <i class="fas fa-comment-alt"></i> Czat
                                </h3>
                            </div>
                            <!--col-->
                            <div class="col text-end">
                                <button class="btn btn-secondary btn-sm" onclick="GETMESSAGE()"><i class="fas fa-sync"></i> Załaduj</button>
                            </div>
                        </div>
                        <!--row-->
                        <div class="row">
                            <div class="col">
                                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" style="min-height:350px; max-height: 650px; overflow: hidden auto; overflow-y: auto;">
                                    <div id="chat-loading">
                                        <div class="mt-5 mb-5 d-flex justify-content-center d-none">
                                            <div class="p-3">
                                                <div class="first text-center">
                                                    <div class="spinner-border" style="width: 5rem; height:5rem" role="status"></div>
                                                    <h3 class="mt-3">Ładowanie wiadomości ...</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 mb-5 d-flex justify-content-center">
                                            <div class="p-3">
                                                <div class="first text-center">
                                                    <i class="fas fa-times-circle fa-6x"></i>
                                                    <h3 class="mt-3">Brak wiadomości</h3>
                                                    <p class="text-muted">
                                                        To jest początek tego czatu!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="chat-inner" style="height: 100%;"></div>
                                </div>
                                <div id="chat-send-form">
                                    <!---->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h3><i class="fas fa-calendar-alt"></i> Grafik</h3>
                        <div id="vztm-grap h"></div>
                        @role('Kierowca')
                            <div class="row g-0">
                                <div class="col">
                                    <div class="card bg-dark mt-3" style="border-radius: 0rem; box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);">
                                        <div class="card-body">

                                            <div class="first text-center">
                                                <i class="fas fa-calendar-times fa-3x"></i>
                                                <h3 class="mt-3">Dzień wolny</h3>
                                                <!-- <p class="text-muted">
                                                    dad
                                                </p> -->
                                                <button class="btn btn-success" type="button" name="button">Złóż wniosek o Kurs z Wolnego</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-dark mt-3" style="border-radius: 0rem; box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);">
                                        <div class="card-body">

                                            <div class="first text-center">
                                                <i class="fas fa-calendar-check fa-3x"></i>
                                                <h3 class="mt-3">14/2/A</h3>
                                                <!-- <p class="text-muted h3">
                                                    adsad
                                                </p> -->
                                                <button class="btn btn-primary" type="button" name="button">MAN NL273 Lion's City #104</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-dark mt-3" style="border-radius: 0rem; box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);">
                                        <div class="card-body">

                                            <div class="first text-center">
                                                <i class="fas fa-calendar-check fa-3x"></i>
                                                <h3 class="mt-3">Dzień wolny</h3>
                                                <!-- <p class="text-muted">
                                                    Jesteś na bieżąco!
                                                </p> -->
                                                <button class="btn btn-success" type="button" name="button">Złóż wniosek o Kurs z Wolnego</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-dark mt-3" style="border-radius: 0rem; box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);">
                                        <div class="card-body">

                                            <div class="first text-center">
                                                <i class="fas fa-calendar-check fa-3x"></i>
                                                <h3 class="mt-3">Dzień wolny</h3>
                                                <!-- <p class="text-muted">
                                                    Jesteś na bieżąco!
                                                </p> -->
                                                <button class="btn btn-success" type="button" name="button">Złóż wniosek o Kurs z Wolnego</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-dark mt-3" style="border-radius: 0rem; box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);">
                                        <div class="card-body">

                                            <div class="first text-center">
                                                <i class="fas fa-calendar-check fa-3x"></i>
                                                <h3 class="mt-3">Dzień wolny</h3>
                                                <!-- <p class="text-muted">
                                                    Jesteś na bieżąco!
                                                </p> -->
                                                <button class="btn btn-success" type="button" name="button">Złóż wniosek o Kurs z Wolnego</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-dark mt-3" style="border-radius: 0rem; box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);">
                                        <div class="card-body">

                                            <div class="first text-center">
                                                <i class="fas fa-calendar-check fa-3x"></i>
                                                <h3 class="mt-3">Dzień wolny</h3>
                                                <!-- <p class="text-muted">
                                                    Jesteś na bieżąco!
                                                </p> -->
                                                <button class="btn btn-success" type="button" name="button">Złóż wniosek o Kurs z Wolnego</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-dark mt-3" style="border-radius: 0rem; box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%);">
                                        <div class="card-body">

                                            <div class="first text-center">
                                                <i class="fas fa-calendar-check fa-3x"></i>
                                                <h3 class="mt-3">Dzień wolny</h3>
                                                <!-- <p class="text-muted">
                                                    Jesteś na bieżąco!
                                                </p> -->
                                                <button class="btn btn-success" type="button" name="button">Złóż wniosek o Kurs z Wolnego</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-muted mb-0">Brak służb w grafiku!</p>
                        @endrole
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h3><i class="fas fa-road"></i> Raporty</h3>
                        @role('Dyrektor')
                            <div class="row">
                                @for($i = 1; $i <= 1; $i++)
                                    <div class="col-6">
                                        <div class="card bg-dark border @if($i==1) border-secondary @else border-dark @endif mt-3">
                                            <div class="card-body">
                                                <h5 class="d-flex font-weight-semibold flex-nowrap my-1"><a href="#" class="text-info mr-2" data-abc="true">Służba z dnia @if($i==1) 19.01.2022 @else 20.01.2022 @endif</a></h5>
                                                <p class="mt-3">
                                                    <b>Służba: </b>34/1/A<br>
                                                    <b>Rodzaj służby:</b> Służba regularna dwuzmianowa <br>
                                                    <b>Dyspozytor: </b><span class="gdpr"><span class="name">mateusz</span></span> [AD-001]<br>
                                                    <b>Pojazd: </b> Solbus Urbino 13 Lions City<br>
                                                </p>
                                                <p class="mb-0">
                                                    <button type="button" class="btn btn-success"><i class="far fa-paper-plane"></i> Złóż raport</button>
                                                    @if($i==2)
                                                    <button type="button" class="btn btn-danger"><i class="fas fa-exclamation-triangle"></i> Zgłoś zdarzenie drogowe</button>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        @else
                            <p class="text-muted mb-0">Brak raportów do zdania!</p>
                        @endrole
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h3><i class="fas fa-bullhorn"></i> Ogłoszenia</h3>
                        @if(count($ogloszenia) < 1)
                            <p class="text-muted mb-0">Brak ogłoszeń!</p>
                        @else
                            <div class="row">
                                @foreach ($ogloszenia as $row)
                                    <div class="col-md-6 mt-2">
                                        <div class="card bg-dark text-white @if($row->is_pinned) border border-primary @else  @endif mb-3" style="border-radius: 15px;">
                                            <div class="card-body p-4">
                                                <h3 class="mb-3"><a href="{{ route('ogloszenia.show', $row->id)}}" class="text-white mr-2" data-abc="true">{{ $row->title }}</a></h3>
                                                <p class="small mb-0">
                                                    @if($row->is_pinned)
                                                        <i class="fas fa-star fa-lg"></i>
                                                    @else
                                                        <i class="far fa-star fa-lg"></i>
                                                    @endif
                                                    <span class="mx-2">|</span> Autor: <a href="#" class="text-white" data-abc="true"><strong>{{ $row->user->login }}</strong></a> <span class="mx-2">|</span> Dodano: {{ $row->created_at->format('d.m.Y H:i') }}
                                                </p>
                                                <p class="mt-3 h5">
                                                    @if($row->tags)
                                                        @foreach($row->tags as $key => $item)
                                                            <span class="border badge rounded-pill text-dark" style="border: 1px solid  #262626!important; background-color: {{ $item->color }}">{{ $item->name }}</span>
                                                        @endforeach
                                                    @else
                                                        <span class="badge badge-danger">Brak etykiet</span>
                                                    @endif
                                                </p>
                                                <hr class="my-4">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <p class="mb-0 text-uppercase">
                                                        <span class="text-muted small"><a href="{{ route('ogloszenia.show', $row->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Zobacz więcej</a></span>
                                                        <!-- <span class="ms-3 me-4">|</span> -->
                                                    </p>
                                                    <!-- <a href="#!">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp" alt="avatar" class="img-fluid rounded-circle me-3" width="35">
                                                    </a>
                                                    <button type="button" class="btn btn-outline-light btn-sm btn-floating">
                                                        <i class="fas fa-plus"></i>
                                                    </button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-lg-4">
                                        <div class="card bg-dark border border-1 mt-3">
                                            <div class="card-body">
                                                <h5 class="d-flex font-weight-semibold flex-nowrap my-1"><a href="{{ route('ogloszenia.show', $row->id)}}" class="text-default mr-2" data-abc="true">{{ $row->title }}</a></h5>
                                                <ul class="list-inline text-muted mb-0">
                                                    <li class="list-inline-item">Autor: <a href="#" class="text-muted" data-abc="true">{{ $row->user->login }}</a></li>
                                                    <li class="list-inline-item">Dodano: {{ $row->created_at->format('d.m.Y H:i') }}</li>
                                                </ul>
                                                <p class="mt-1 h5 pb-2">
                                                    @if($row->tags)
                                                        @foreach($row->tags as $key => $item)
                                                            <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                                        @endforeach
                                                    @else
                                                        <span class="badge badge-danger">Brak etykiet</span>
                                                    @endif
                                                </p>
                                                <p class="mt-2">
                                                    @if($row['text'] < '100')
                                                        {!! $row->text !!}
                                                    @elseif($row['text'] >= 100)
                                                        <?php echo (substr($row['text'], 0, 100) . '...');?>
                                                    @endif
                                                </p>
                                                <a href="{{ route('ogloszenia.show', $row->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Zobacz więcej</a>
                                            </div>
                                        </div>
                                    </div> -->
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h3><i class="far fa-handshake"></i> Zebrania</h3>
                        @if(count($events) < 1)
                            <p class="text-muted mb-0">Brak ogłoszeń!</p>
                        @else
                            <div class="row">
                                @foreach ($events as $row)
                                    <div class="col-md-6">
                                        <div class="card bg-dark text-white border border-1 mt-3">
                                            <div class="card-body">
                                                    <p class="text-primary mt-2">
                                                        <i class="fas fa-calendar-day"></i> {{ $row->date_to->format('D d M Y') }} {{ $row->hour_to }}
                                                    </p>
                                                    <h5 class="font-weight-bold mt-0">
                                                        {{ $row->title }}
                                                    </h5>
                                                    <p class="mt-2">
                                                        @if($row['text'] <= 150)
                                                            <?php echo (substr($row['description'], 0, 150) . '..');?>
                                                        @else
                                                            {{ $row->description }}
                                                        @endif
                                                        <small class="text-muted">(kliknij na przycisk aby otrzywać powiadomienie)</small>
                                                    </p>
                                                    <ul class="list-unstyled list-unbordered mb-3 text-white">
                                                        <li class="list-item">
                                                            <div class="d-flex align-items-start align-items-center">
                                                                <h5 class=""><i class="fab fa-discord"></i> Przewozy Akcent</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <button type="button" class="btn btn-success btn-block"><i class="fas fa-check"></i> Zainteresowany</button>
                                                        </div>
                                                        <div class="col-3">

                                                            <button type="button" class="btn btn-info btn-block" id="EventButton" onclick="ZobaczWniosek(1)">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                @role('Admina')
                    <div class="card mb-4">
                        <!--card-header-->
                        <div class="card-body">
                            <h3><i class="fas fa-user-secret"></i> Zalogowani użytkownicy</h3>
                            <div class="row">
                                @foreach ($users as $row)
                                    <div class="col-md-6 col-lg-4 col-xxl-3 mt-3">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start">
                                                    <img src="{{ $row->getPicture() }}" class="rounded-circle" height="77" alt="" loading="lazy">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-0">[{{$row->code}}] {{$row->login}}</p>
                                                        <p class="mb-0">
                                                            <span class="gdpr">
                                                                <span class="name">{{$row->imie}} {{$row->nazwisko}}</span>
                                                                <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                                            </span>
                                                        </p>
                                                        <p class="text-muted mb-0">
                                                            <span class="gdpr">
                                                                <span class="name">{{$row->email}}</span>
                                                                <span style="padding: 0 2px; background-color: #000; color: #f93154;" class="censor d-none">UKRYTO</span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-3 d-grid gap-2 d-md-block">
                                                    {{ $row->getLoginAsButtonAttribute('') }}
                                                    {{ $row->getClearSessionButtonAttribute('') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('settings.index')}}" class="btn btn-block btn-primary">Przejdź do zarządzania panelem</a>
                @endrole
            </div>
            <!-- row -->


            <div class="col-lg-12 col-xxl-3">
                <div class="card shadow mb-4 bg-dark">
                    <div class="card-body text-center">
                        <img class="rounded-circle mb-3" src="{{ Auth::user()->getPicture() }}" style="width: 125px">
                        <h3 style="color: {{Auth::user()->roles->first()->color}}">[{{Auth::user()->code}}] {{Auth::user()->login}}</h3>
                        <p class="mt-1">
                            @if(count(Auth::user()->roles) < 1)
                                Brak danych!
                            @else
                                @foreach(Auth::user()->roles as $key => $item)
                                    @if($key < 3)
                                        <span class="badge rounded-pill text-dark" style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                                    @endif
                                @endforeach
                                @if($key > 3)
                                    <span class="badge rounded-pill" style="background-color:rgb(161, 161, 163)">+{{ count(auth()->user()->roles)-3 }}</span>
                                @endif
                            @endif
                        </p>
                        <p class="card-text">
                            <a href="{{ route('profile.index') }}" class="btn btn-info btn-sm mb-1">
                                <i class="fas fa-user-circle"></i> Profil
                            </a>&nbsp;
                            <a href="{{ route('manager.index')}}" class="btn btn-danger btn-sm mb-1">
                                <i class="fas fa-cogs"></i> Zarządzanie
                            </a>
                        </p>
                    </div>
                    
                </div>
                <div class="card mt-3">
                    
                    <!-- Light color ripple changed via data-mdb-attribute -->
                    <div class="bg-image ripple rounded rounded-5" data-mdb-ripple-color="light">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="img-fluid "/>
                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)"></div>
                        <div class="card-img-overlay">
                            <h5 class="card-title"><i class="fas fa-medal me-1"></i>Screen tygodna</h5>
                            <p class="card-text">Autor: Remek <br> Dodano 2 dni temu</p>
                        </div>
                    </div>

                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h3><i class="fas fa-poll"></i> Ankiety</h3>
                        <div class="col">
                            <div class="card bg-dark text-white border border-1 mt-3">
                                <div class="card-body">
                                    <h5 class="d-flex font-weight-semibold flex-nowrap my-1"><a href="#" class="text-default mr-2" data-abc="true">Propozycję nt. zmian w WP.</a></h5>
                                    <ul class="list-inline text-muted mb-0">
                                        <li class="list-inline-item">By <a href="#" class="text-muted" data-abc="true">mateusz</a></li>
                                        <li class="list-inline-item">21:29:05 01.08.2021</li>
                                    </ul>
                                    <p class="mt-2">
                                        W poniższej ankiecie, możecie wypisać swoje propozycje dt. zmian w Wirtualnym Panelu. Wszystkie propozycje zostaną omówione na dzisiejszym zebraniu.
                                    </p>
                                    <button type="button" class="btn btn-primary"><i class="fas fa-share"></i> Wypełnij ankietę</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="EventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h2 class="mb-0">Jakie funkcje oferuje Panel Wirtualnego Pomorza?</h2>
                    </div>  
                    <div class="modal-body bg-dark">
                        <div id="modal-loading" class="text-center" style="display: none;">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    Panel posiada szereg funkcji, które umożliwiają użytkownikom komunikowanie się, 
                                    dzielenie się treściami i nawiązywanie nowych znajomości. 
                                    Oto niektóre z najważniejszych funkcji Panelu:
                                </p>
                                <ul>
                                    <li><b>Profil:</b> każdy użytkownik może stworzyć swój własny profil, w którym może przedstawiać się i udostępniać informacje o sobie.</li>
                                    <li><b>News Feed:</b> jest to strona główna użytkownika, na której wyświetlane są aktualności i posty od znajomych.</li>
                                    <li><b>Wiadomości:</b> umożliwiają one wysyłanie i otrzymywanie prywatnych wiadomości od innych użytkowników.</li>
                                    <li><b>Grupy:</b> pozwalają na tworzenie i dołączanie do grup tematycznych, w których użytkownicy mogą dyskutować i dzielić się informacjami.</li>
                                    <li><b>Strony:</b> umożliwiają tworzenie i dołączanie do stron związanych z różnymi tematami, takimi jak marki, produkty, muzyka i wiele innych.</li>
                                    <li><b>Wydarzenia:</b> pozwalają na tworzenie i uczestniczenie w wydarzeniach, takich jak imprezy, koncerty i wydarzenia społeczne.</li>
                                    <li><b>Marketplace:</b> umożliwia sprzedawanie i kupowanie produktów i usług w lokalnej społeczności.</li>
                                    <li><b>Reklamy:</b> pozwalają na promowanie produktów i usług do wybranej grupy odbiorców.</li>
                                </ul>
                                <p>Te funkcje i wiele innych sprawiają, że Panel jest jednym z najbardziej popularnych i uniwersalnych narzędzi społecznościowych na świecie.</p>
                                
                            </div>
                        </div>
                        <div id="modal-zawartosc" class="d-none">
                            <p id="modal-image">
                                <img src="{{ asset('img/zdjecie1.png') }}" class="img-fluid" />
                            </p>
                            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-info" data-mdb-toggle="tab" href="#tabs-info" role="tab" aria-controls="tabs-info" aria-selected="false">
                                        <h6 class="m-0 font-weight-bold">Informacje o wydarzeniu</h6>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-interesed" data-mdb-toggle="tab" href="#tabs-interesed" role="tab" aria-controls="tabs-interesed" aria-selected="false">
                                        <h6 id="modal-count-users-header" class="m-0 font-weight-bold">Zainteresowani: 8</h6>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content">
                                <div class="tab-pane fade show active" id="tabs-info" role="tabpanel" aria-labelledby="tabs-info">
                                    <p id="modal-timestamp" class="text-muted mt-2">
                                        <span class="text-primary">
                                            <i class="fas fa-calendar-day"></i> czw mar 17. 08.15
                                        </span> - Zakończenie: czw mar 81. 21:45
                                    </p>
                                    <h5 id="modal-title" class="font-weight-semibold mt-0">

                                    </h5>
                                    <ul class="list-unstyled list-unbordered pt-3 mb-3 text-white">
                                        <li class="list-item">
                                            <h5>
                                                <i class="fab fa-discord"></i> Przewozy Akcent
                                            </h5>
                                        </li>
                                        <li class="list-item">
                                            <h5 id="modal-count-users">
                                                <i class="fas fa-bell"></i> Zainteresowani: 6
                                            </h5>
                                        </li>
                                        <li class="list-item">
                                            <h5 id="modal-creator">
                                                <i class="fas fa-user-plus"></i> Utworzył:
                                                <img src="{{ asset('storage/avatars/avatar.jpeg') }}" class="rounded-circle" height="30" alt="" loading="lazy">
                                                {{ Auth::user()->login }}
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade show" id="tabs-interesed" role="tabpanel" aria-labelledby="tabs-interesed">
                                    @if(count($users) > 0)
                                        <ul class="list-unstyled list-unbordered pt-3 mb-3 text-white">
                                            @foreach ($users as $row)
                                                <li class="list-item mb-2 bg-dark rounded-pill pe-5">
                                                    <div class="d-flex align-items-start align-items-center">
                                                        <img src="{{ $row->getPicture() }}" class="rounded-circle" height="50" alt="" loading="lazy">
                                                        <div class="ms-3">
                                                            <h5 class="">[{{$row->code}}] {{$row->login}}</h5>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
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
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <button type="button" class="btn btn-success btn-block"><i class="fas fa-check"></i> Zainteresowany</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-secondary btn-block" data-mdb-dismiss="modal"><i class="fas fa-times"></i> Zamknij</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <div class="row">
                            <div class="col-9">
                                <button type="button" class="btn btn-success btn-block d-none"><i class="fas fa-check"></i> Zainteresowany</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary btn-block" data-mdb-dismiss="modal"><i class="fas fa-times"></i> Zamknij</button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
@endsection

@section('js-files')
<script type="text/javascript">
    function ZobaczModal() {
        $("#EventModal").modal("show");
    }

    function ZobaczWniosek(id) {

        document.getElementById("modal-loading").style.display = "block";
        document.getElementById("modal-zawartosc").style.display = "none";

        $.get("zebranie/" + id, function (data) {
            //var dane = JSON.parse(data);
            $.get("user/" + id + "/edit", function (user) {
                console.log(user);
            })
            //$.each(data, function () {

                console.log(data);
                $('#modal-title').html(data.title);
                $('#modal-creator').html('<i class="fas fa-user-plus"></i> Utworzył:<img src="" class="rounded-circle" height="30" alt="" loading="lazy"> ' + data.user_id + '');
                $('#modal-image').html('<img src="/laravel-vpomorze/public/' + data.image + '" class="img-fluid" />');
                //
                // if (this.status === "2") document.getElementById("modal-podglad-ocena").innerHTML = '<div class="callout callout-' + this.kolor + '"><h5>WNIOSEK <b>' + this.nazwa_statusu + '</b></h5><p>' + this.uwagi + '</p><small>Rozpatrzono <b>' + this.rozpatrzono + '</b> przez <b>' + this.rozpatrzyl_id + '</b>.</small></div><hr />';
                //
                // if (this.status === "3") document.getElementById("modal-podglad-ocena").innerHTML = '<div class="callout callout-' + this.kolor + '"><h5>WNIOSEK <b>' + this.nazwa_statusu + '</b></h5><p>' + this.uwagi + '</p><small>Rozpatrzono <b>' + this.rozpatrzono + '</b> przez <b>' + this.rozpatrzyl_id + '</b>.</small></div><hr />';
                //
                // if (this.status === "4") document.getElementById("modal-podglad-ocena").innerHTML = '<div class="callout callout-' + this.kolor + '"><h5><b>' + this.nazwa_statusu + '</b></h5><p>' + this.uwagi + '</p><small>Rozpatrzono <b>' + this.rozpatrzono + '</b> przez <b>' + this.rozpatrzyl_id + '</b>.</small></div><hr />';
                //
                // $(".skladnik").css("display", "none");
                // $('.form-check-input').prop('checked', false);

            //});

        });

        $("#EventModal").modal("show");
        document.getElementById("modal-loading").style.display = "none";
        document.getElementById("modal-zawartosc").style.display = "block";
    }
</script>
@endsection
