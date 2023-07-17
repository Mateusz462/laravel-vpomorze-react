@guest
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-5">
        <!-- Container wrapper -->
        <div class="container-fluid px-4">
            <!-- Navbar brand -->
            <a class="navbar-brand " href="{{ url('/') }}">
                <div class="h3 me-2 mb-1 d-flex align-items-center">
                    <span class="me-2">Grandioso App</span> <i class="fas fa-music text-success"></i>
                </div>
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Strona główna</a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <a href="{{ route('login') }}" class="btn btn-link px-3 me-2">
                        Logowanie
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary me-3">
                        Rejestracja
                    </a>
                    <a class="btn btn-dark px-3" href="#" role="button">
                        O stronie
                    </a>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
@else
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->

            <!-- Toggle button -->
            <button id="sidebarToggleTop" class="btn text-white shadow-0 p-0 mr-3 d-block">
                <i class="fas fa-bars fa-lg"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="navbar-collapse" id="navbarButtonsExample">

                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Toggler -->
    				<!-- Search form -->
                    <li class="nav-item me-3 me-lg-1 active">
                        <a class="nav-link" href="{{ url('home') }}">
                            <span>Strona Główna</span>
                        </a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <!-- Right elements -->
                    <ul class="navbar-nav flex-row">
                        <!-- main menu -->
                        <li class="nav-item dropdown me-3 me-lg-1">
                            <div class="rounded-circle p-1 d-flex align-items-center justify-content-center text-muted" style="width: 38px; height: 38px" type="button" id="firstmenu" data-mdb-toggle="dropdown" aria-expanded="false" data-mdb-auto-close="outside">
                                <i class="fas fa-plus-circle fa-lg"></i>
                            </div>
                            <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="firstmenu" style="max-height: 600px; overflow-y: auto; width: 23em; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-20px, 49px, 0px);" data-popper-placement="bottom- end">
                                <!-- header -->
                                <li class="p-1 mx-2">
                                    <h2>Menu</h2>
                                </li>
                                <!-- search -->
                                <li class="p-1">
                                    <div class="input-group-text bg-gray border-0 rounded-pill" style="min-height: 40px; min-width: 230px">
                                        <i class="fas fa-search me-2 text-muted"></i>
                                        <input type="text" class="form-control rounded-pill border-0 bg-gray" placeholder="Search Menu"/>
                                    </div>
                                </li>
                                <!-- header admin -->
                                <li class="mt-2 mx-2">
                                  <h6>Administrator</h6>
                                </li>
                                <!-- admin users -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-users bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Użytkownicy</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin roles -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-theater-masks bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Rangi</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin permissions -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-fingerprint bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Uprawnienia</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin settings -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-cogs bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Ustawienia</p>
                                        </div>
                                    </a>
                                </li>
                                <hr>
                                <!-- options -->
                                <!-- header employee -->
                                <li class="mt-2 mx-2">
                                  <h6>Nauczyciel</h6>
                                </li>
                                <!-- admin users -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-users bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Uczniowie</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin roles -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-users bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Próby / sekcje</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin permissions -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-check-square bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Lista obecności</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin settings -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-cogs bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Ustawienia</p>
                                        </div>
                                    </a>
                                </li>
                                <hr>
                                <!-- header user -->
                                <li class="mt-2 mx-2">
                                  <h6>Uczeń</h6>
                                </li>
                                <!-- admin users -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-calendar-alt bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Grafik prób i koncertów</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin roles -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-users bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Sekcje</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- admin permissions -->
                                <li class="dropdown-item nav-item p-1 my-1 rounded" type="button">
                                    <a href="#" class="d-flex text-decoration-none text-white">
                                        <i class="fas fa-file bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Repertuar</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- feedback -->
                                <li class="dropdown-item p-1 rounded d-flex align-items-center" type="button">
                                    <i class="fas fa-exclamation-circle bg-gray p-2 rounded-circle"></i>
                                    <div class="ms-3">
                                        <p class="m-0">Przekaż opinię</p>
                                        <p class="m-0 text-muted fs-7">
                                            Pomóż nam ulepszyć GrandiosoApp.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- main menu -->
                        <!-- message menu -->
                        <li class="nav-item dropdown me-3 me-lg-1">
                            <a href="#" class="nav-link dropdown-toggle hidden-arrow" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-comments fa-lg"></i>
                                <span class="badge rounded-pill badge-notification bg-danger">6</span>
                            </a>
                            <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="notMenu21" style="width: 25em; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-20px, 49px, 0px); max-height: 600px; overflow-y: auto;" data-popper-placement="bottom-end">
                                <!-- header -->
                                <li class="p-1">
                                    <div class="" data-mdb-toggle="dropdown">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <h2>Wiadomości</h2>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-2 p-1 border-bottom">
                                    <div class="p-3">
                                        <div class="first text-center">
                                            <i class="fas fa-times-circle fa-6x"></i>
                                            <h3 class="mt-3">Brak wiadomości</h3>
                                            <p class="text-muted">
                                                Jesteś na bieżąco!
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- news 1 -->
                                <li class="my-2 p-1 border-bottom">
                                    <a href="#" class="d-flex align-items-center justify-content-between text-decoration-none text-white">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="ms-3">
                                                <p class="fw-bold m-0">
                                                    Sprawdzono Twój raport z dnia 12.03.2023
                                                </p>
                                                <p class="text-muted mb-0">Kliknij aby przejść do raportu</p>
                                                <span class="text-muted">15:12 01.06.2022</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- news 2 -->
                                <li class="bg-dark mt-3 p-1 text-center" style="border-radius: 10px;">
                                    <a href="#" class="text-decoration-none text-white">Zobacz wszystko</a>
                                </li>
                            </ul>
                        </li>
                        <!-- notifications -->
                        <li class="nav-item dropdown me-3 me-lg-1">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 me-lg-1 text-muted" style="width: 38px; height: 38px" type="button" id="notMenu21" data-mdb-toggle="dropdown" aria-expanded="false" data-mdb-auto-close="outside">
                                <div class="position-relative">
                                    <i class="fas fa-bell fa-lg"></i>
                                    <span class="badge rounded-pill badge-notification bg-danger">99+</span>
                                </div>
                            </div>
                            <!-- notifications dd -->
                            <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="notMenu21" style="width: 25em; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-20px, 49px, 0px); max-height: 600px; overflow-y: auto;" data-popper-placement="bottom-end">
                                <!-- header -->
                                <li class="p-1">
                                    <div class="" data-mdb-toggle="dropdown">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <h2>Powiadomienia</h2>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-2 p-1 border-bottom">
                                    <div class="p-3">
                                        <div class="first text-center">
                                            <i class="fas fa-times-circle fa-6x"></i>
                                            <h3 class="mt-3">Brak powiadomień</h3>
                                            <p class="text-muted">
                                                Jesteś na bieżąco!
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- news 1 -->
                                <li class="my-2 p-1 border-bottom">
                                    <a href="#" class="d-flex align-items-center justify-content-between text-decoration-none text-white">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="ms-3">
                                                <p class="fw-bold m-0">
                                                    Sprawdzono Twój raport z dnia 12.03.2023
                                                </p>
                                                <p class="text-muted mb-0">Kliknij aby przejść do raportu</p>
                                                <span class="text-muted">15:12 01.06.2022</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- news 2 -->
                                <li class="bg-dark mt-3 p-1 text-center" style="border-radius: 10px;">
                                    <a href="#" class="text-decoration-none text-white">Zobacz wszystko</a>
                                </li>
                            </ul>
                        </li>
                        <!-- profile menu button -->
                        <li class="nav-item dropdown me-3 me-lg-1">
                            <div class="rounded-circle p-1 d-flex align-items-center justify-content-center text-muted" style="width: 38px; height: 38px" type="button" id="usermenu" data-mdb-toggle="dropdown" aria-expanded="false" data-mdb-auto-close="outside">
                                <i class="fas fa-chevron-circle-down fa-lg"></i>
                            </div>
                            <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="usermenu" style="width: 23em; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-20px, 49px, 0px);" data-popper-placement="bottom-end">
                                <!-- avatar -->
                                <a href="#" class="dropdown-item p-1 rounded d-flex" type="button">
                                    <img src="{{ Auth::user()->getPicture() }}" alt="avatar" class="rounded-circle me-2" style="width: 45px; height: 45px; object-fit: cover">
                                    <div>
                                        <p class="m-0">{{ Auth::user()->login }}</p>
                                        <p class="m-0 text-muted">Zobacz swój profil</p>
                                    </div>
                                </a>
                                <hr>
                                <!-- feedback -->
                                <li class="dropdown-item p-1 rounded d-flex align-items-center" type="button">
                                    <i class="fas fa-exclamation-circle bg-gray p-2 rounded-circle"></i>
                                    <div class="ms-3">
                                        <p class="m-0">Przekaż opinię</p>
                                        <p class="m-0 text-muted fs-7">
                                            Pomóż nam ulepszyć GrandiosoApp.
                                        </p>
                                    </div>
                                </li>
                                <hr>
                                <!-- options -->
                                <!-- 1 -->
                                <li class="dropdown-item p-1 my-1 rounded" type="button">
                                    <ul class="list-unstyled">
                                        <li class="nav-item">
                                            <div class="d-flex" data-bs-toggle="dropdown">
                                                <i class="fas fa-cog bg-gray p-2 rounded-circle"></i>
                                                <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                                    <p class="m-0">Ustawienia i prywatność</p>
                                                    <i class="fas fa-chevron-right"></i>
                                                </div>
                                            </div>
                                            <!-- nested menu -->
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-cog"></i>
                                                        </div>
                                                        <p class="m-0">Ustawienia</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-lock"></i>
                                                        </div>
                                                        <p class="m-0">Kontrola prywatności</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-unlock-alt"></i>
                                                        </div>
                                                        <p class="m-0">Skróty dotyczące prywatności</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-list"></i>
                                                        </div>
                                                        <p class="m-0">Dziennik aktywności</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-globe"></i>
                                                        </div>
                                                        <p class="m-0">Język</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- 2 -->
                                <li class="dropdown-item p-1 my-1 rounded" type="button">
                                    <ul class="list-unstyled">
                                        <li class="nav-item">
                                            <div class="d-flex" data-bs-toggle="dropdown">
                                                <i class="fas fa-question-circle bg-gray p-2 rounded-circle"></i>
                                                <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                                    <p class="m-0">Pomoc i wsparcie</p>
                                                    <i class="fas fa-chevron-right"></i>
                                                </div>
                                            </div>
                                            <!-- nested menu -->
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-question-circle"></i>
                                                        </div>
                                                        <p class="m-0">Centrum pomocy</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                        <p class="m-0">Skrzynka odbiorcza Panelu Pomocy</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px">
                                                            <i class="fas fa-exclamation-circle"></i>
                                                        </div>
                                                        <p class="m-0">Zgłoś problem</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- 4 -->
                                <li class="dropdown-item p-1 my-1 mb-3 rounded" type="button">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a href="{{ route('logout') }}" class="d-flex text-decoration-none text-white" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" style="cursor: pointer;">
                                                <i class="fas fa-sign-out-alt bg-gray p-2 rounded-circle"></i>
                                                <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                                    <p class="m-0">Wyloguj się</p>
                                                </div>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <div class="d-inline text-muted">
                                    <a href="#" class="text-decoration-none text-muted">
                                        Regulamin &nbsp;
                                    </a>
                                    <span> · </span>&nbsp;
                                    <a href="#" class="text-decoration-none text-muted">
                                        Polityka prywatności &nbsp;
                                    </a>
                                    GrandiosoApp © 2022 by Mateusz Wydra
                                </div>
                            </ul>
                        </li>
                    </ul>
                    <!-- Right elements -->
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    @yield('header')
@endguest
