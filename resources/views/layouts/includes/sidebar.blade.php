<div id="sidenav-1" class="sidenav bg-dark sidenav-light ps" role="navigation" data-hidden="false" data-scroll-container="#scrollContainer" data-accordion="" style="width: 240px; height: 100vh; position: fixed; transition: all 0.3s linear 0s; transform: translateX(0%);">
    <!-- <a class="ripple d-flex justify-content-center py-4" href="#!" data-ripple-color="primary">
        <img id="MDB-logo" src="https://mdbootstrap.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.png" alt="MDB Logo" draggable="false">
    </a> -->
    <h5 class="fw-bold d-flex justify-content-center py-4">
        Wirtualny Panel 2.0
    </h5>
    <ul class="sidenav-menu">
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('home') ? 'active' : ''  }}" href="{{ url('home') }}" tabindex="1">
            <i class="fas fa-tachometer-alt nav-icon"></i>Strona Główna</a>
        </li>
        <hr class="m-1 mx-3">
        <li class="mt-2 sidenav-item">
            <small class=" mx-3">Kierowca</small>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('raporty.index') ? 'd-none' : ''  }}" href="{{ route('raporty.index') }}" tabindex="1">
            <i class="fas fa-road nav-icon"></i>Raporty</a>
        </li>
        <li class="sidenav-item {{ Route::is('raporty.index') ? 'd-block active' : 'd-none'  }}">
            <!-- Buttons trigger collapse -->
            <a class="sidenav-link ripple ripple-primary active" data-mdb-toggle="collapse" href="#sidenav-collapse-1-0-0" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-road nav-icon"></i><span>Raporty</span><i class="fas fa-angle-down rotate-icon" style="transform: rotate(0deg);"></i>
            </a>
            <ul class="sidenav-collapse collapse" id="sidenav-collapse-1-0-0" style="">
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary" tabindex="1">Do złożenia</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary" tabindex="1">Złożone</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple active ripple-primary" tabindex="1">Nie złożone</a>
                </li>
            </ul>
            <!-- <a class="" data-toggle="collapse" href="#sidenav-collapse-1-0-0" role="button" tabindex="1" aria-expanded="false"></a> -->
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('grafik.index') ? 'bg-primary active' : ''  }}" href="{{ route('grafik.index') }}" tabindex="1">
            <i class="fas fa-calendar-alt nav-icon"></i>Grafik</a>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('wnioski.index') ? 'bg-primary active' : ''  }}" href="{{ route('wnioski.index') }}" tabindex="1">
            <i class="fas fa-mail-bulk nav-icon"></i>Wnioski</a>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('zgloszenia.index') ? 'bg-primary active' : ''  }}" href="{{ route('zgloszenia.index') }}" tabindex="1">
            <i class="fas fa-exclamation-triangle nav-icon"></i>Zgłoszenia</a>
        </li>
        <hr class="m-1 mx-3">
        <li class="mt-2 sidenav-item">
            <small class=" mx-3">Spisy</small>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('users.list') ? 'bg-primary active' : ''  }}" href="{{ route('users.list') }}" tabindex="1">
            <i class="fas fa-users nav-icon"></i>Pracownicy</a>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('pojazdy.index') ? 'bg-primary active' : ''  }}" href="{{ route('pojazdy.index') }}" tabindex="1">
            <i class="fas fa-bus-alt nav-icon"></i>Pojazdy</a>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('sluzby.index') ? 'bg-primary active' : ''  }}" href="{{ route('sluzby.index') }}" tabindex="1">
            <i class="fas fa-book nav-icon"></i>Służby</a>
        </li>
        <hr class="m-1 mx-3">
        <li class="mt-2 sidenav-item">
            <small class=" mx-3">Pozostałe</small>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('dokumenty.index') ? 'bg-primary active' : ''  }}" href="{{ route('dokumenty.index') }}" tabindex="1">
            <i class="fas fa-file-alt nav-icon"></i>Dokumenty</a>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('faq.index') ? 'bg-primary active' : ''  }}" href="{{ route('faq.index') }}" tabindex="1">
            <i class="far fa-question-circle nav-icon"></i>FAQ</a>
        </li>
        <li class="sidenav-item">
            <a class="sidenav-link ripple {{ Route::is('pobieralnia.index') ? 'bg-primary active' : ''  }}" href="{{ route('pobieralnia.index') }}" tabindex="1">
            <i class="fas fa-download nav-icon"></i>Pobieralnia</a>
        </li>
        <hr class="mb-1">
        <li class="sidenav-item">
            <!-- Buttons trigger collapse -->
            <a @if(request()->is('manager/*') || request()->is('manager')) style="background-color: hsla(0,0%,98.4%,.05);" @endif 
                class="sidenav-link ripple ripple-primary {{ request()->is('manager/*') || request()->is('manager') ? ' active' : 'collapsed'  }}" 
                data-mdb-toggle="collapse" href="#sidenav-collapse-manager" role="button" aria-expanded="{{ Route::is('manager.index') ? 'false' : 'true'  }}" aria-controls="collapseExample">
                <i class="fas fa-cogs nav-icon"></i><span>Zarządzanie</span><i class="fas fa-angle-down rotate-icon" style="transform: rotate(-180deg);"></i>
            </a>
            <ul class="sidenav-collapse collapse {{ request()->is('manager/*') || request()->is('manager') ? 'show' : ''  }}" id="sidenav-collapse-manager" style="">
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary {{ request()->is('manager/') || request()->is('manager') ? 'bg-primary active' : ''  }}" 
                        href="{{ route('manager.index')}}" tabindex="1">
                        <i class="far fa-circle nav-icon"></i>
                        <span>Zarząd</span>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary {{ request()->is('manager/admin/*') || request()->is('manager/admin') ? 'bg-primary active' : ''  }}" 
                        href="{{ route('manager.admin')}}" tabindex="1">
                        <i class="far fa-circle nav-icon"></i>
                        Administracja
                    </a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary {{ request()->is('manager/transport-department/*') || request()->is('manager/transport-department') ? 'bg-primary active' : ''  }}" 
                        href="{{ route('manager.transport-department')}}" tabindex="1">
                        <i class="far fa-circle nav-icon"></i>
                        Dział Przewozów
                    </a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary {{ request()->is('manager/hr/*') || request()->is('manager/hr') ? 'bg-primary active' : ''  }}" 
                        href="{{ route('manager.staff')}}" tabindex="1">
                        <i class="far fa-circle nav-icon"></i>
                        Dział Kadr
                    </a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary {{ Route::is('manager.traffic-supervision') ? 'bg-primary active' : ''  }}" 
                        href="{{ route('manager.traffic-supervision')}}" tabindex="1">
                        <i class="far fa-circle nav-icon"></i>
                        Nadzór Ruchu
                    </a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary {{ request()->is('manager/control-room/') || request()->is('manager/control-room/*') ? 'bg-primary active' : ''  }}" 
                        href="{{ route('manager.control-room')}}" tabindex="1">
                        <i class="far fa-circle nav-icon"></i>
                        Dyspozytornia
                    </a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple ripple-primary {{ Route::is('manager.workshop') ? 'bg-primary active' : ''  }}" 
                        href="{{ route('manager.workshop')}}" tabindex="1">
                        <i class="far fa-circle nav-icon"></i>
                        Warsztat
                    </a>
                </li>
            </ul>
            <!-- <a class="" data-toggle="collapse" href="#sidenav-collapse-1-0-0" role="button" tabindex="1" aria-expanded="false"></a> -->
        </li>
        <li class="sidenav-item d-none">
            <a class="sidenav-link ripple ripple-primary" data-toggle="collapse" href="#sidenav-collapse-1-0-1" role="button" tabindex="1" aria-expanded="true"><i class="fas fa-lock pr-3"></i><span>Password</span><i class="fas fa-angle-down rotate-icon" style="transform: rotate(180deg);"></i></a>
            <ul class="sidenav-collapse collapse show" id="sidenav-collapse-1-0-1" style="">
                <li class="sidenav-item">
                    <a class="sidenav-link ripple" tabindex="1">Request password</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link ripple" tabindex="1">Reset password</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
    </div>
    <div class="text-center m t-auto" style="height: 100px;">
        <hr class="mb-4 mt-0">
        <p class="d-none">MDBootstrap.com</p>
    </div>
</div>
<style>
  #sidenav-1 {
    position: relative;
  }
</style>