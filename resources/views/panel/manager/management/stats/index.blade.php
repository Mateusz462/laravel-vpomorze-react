@extends('layouts.panel')

@section('title')
    Ustawienia Panelu - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    ADMIN
                    <li class="breadcrumb-item">Panel Zarządzania Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Menedżer firmy</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4 fw-bold"><i class="fas fa-medal me-2"></i>Statystyki firmy</h3>
        </div>
        <div class="col-md-6 col-lg-3">
            <h2 class="card-title ms-1 d-none d-md-inline">
                <strong>Menu</strong>
            </h2>
            <ul class="list-group mt-2">
                <li class="list-group-item align-items-center d-flex active">
                    <!-- hsl(330, 70%, 50%); -->
                    <a class="btn text-white btn-floating m-1 me-3"
                    style="background-color: hsl(50, 5%, 44%)" href="#!" role="button">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    Ogólne
                </li>
                <li class="list-group-item align-items-center d-flex">
                    <a class="btn text-white btn-floating m-1 me-3"
                    style="background-color: hsl(220, 44%, 41%);" href="#!" role="button">
                        <i class="fab fa-facebook-f fa-2x"></i>
                    </a>
                    Moduły
                </li>
                <li class="list-group-item align-items-center d-flex">
                    <a class="btn text-white btn-floating m-1 me-3"
                    style="background-color: hsl(205, 81%, 63%);" href="#!" role="button">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    Sekcje
                </li>
                <li class="list-group-item align-items-center d-flex">
                    <a class="btn text-white btn-floating m-1 me-3"
                    style="background-color: hsl(14, 98%, 50%);" href="#!" role="button">
                        <i class="fab fa-reddit-alien fa-2x"></i>
                    </a>
                    Rangi
                </li>
                <li class="list-group-item align-items-center d-flex">
                    <a class="btn text-white btn-floating m-1 me-3"
                    style="background-color: hsl(125, 80%, 40%);" href="#!" role="button">
                        <i class="fab fa-whatsapp fa-2x"></i>
                    </a>
                    Uprawnienia
                </li>
            </ul>
        </div>
        <div class="col-md-6 col-lg-9">
            <div class="row justify-content-center mb-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3><b>101</b></h3>
                            <p class="mb-0">Razem Pracowników</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-success"><b>84</b></h3>
                            <p class="mb-0">Dzisiejsza obecność</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-danger"><b>12</b></h3>
                            <p class="mb-0">Dziś nieobecny</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3><b>5</b></h3>
                            <p class="mb-0">Urlopy</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3><b>40</b></h3>
                            <p class="mb-0">Razem Pojazdów</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-success"><b>35</b></h3>
                            <p class="mb-0">Wyjechało dzisiaj</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-warning"><b>3</b></h3>
                            <p class="mb-0">Rezerwa Pojazdów</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3><b>2</b></h3>
                            <p class="mb-0">W naprawie</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-"><b>12</b></h3>
                            <p class="mb-0">Linii</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3><b>20</b></h3>
                            <p class="mb-0">Razem Brygad</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-"><b>63</b></h3>
                            <p class="mb-0">Wariantów</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-success"><b>100%</b></h3>
                            <p class="mb-0">Obsłużono</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-success"><b>+20%</b></h3>
                            <p class="mb-0">Zaliczonych raportów</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-danger"><b>5%</b></h3>
                            <p class="mb-0">Odwołanych służb</p>
                        </div>
                    </div>
                </div>
            </div>
    		<div class="col-12 d-none">
    			<div class="card mb-4">
    				<div class="card-body pb-0">
    					<div class="row">
    						<div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body ">
    									<h3 class="font-weight-bold t ext-center mb-3"><i class="fas fa-users-cog"></i> Pracownicy</h3>
                                        <p class="h5">Pracownicy administracji: <span class="text-success">21</span></p>
                                        <p class="h5">Doświadczeni kierowcy: <span class="text-success">21</span></p>
                                        <p class="h5">Kierowcy: <span class="text-success">21</span></p>
                                        <p class="h5">Praktykanci: <span class="text-success">21</span></p>
                                        <p class="h5">Nowe osoby: <span class="text-success">10</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body text-ce nter">
    									<h3 class="font-weight-bold  mb-3"><i class="fas fa-business-time"></i> Podsumowanie dnia</h3>
                                        <p class="h5">Kierowców planowo: <span class="text-danger">0</span></p>
                                        <p class="h5">Kierowców pracujących: <span class="text-danger">0</span></p>
                                        <p class="h5">Pojazdów w ruchu: <span class="text-danger">0/0</span></p>
                                        <p class="h5">Raportów zdano: <span class="text-danger">0/0</span></p>
                                        <p class="h5 mt-3 m-0">Kierowca dnia: <span style="color: {{Auth::user()->roles->first()->color}}">[{{Auth::user()->code}}] {{Auth::user()->login}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body tex t-center">
    									<h3 class="font-weight-bold  mb-3"><i class="fas fa-calendar-week"></i> Podsumowanie tygodnia</h3>
                                        <p class="h6">Poniedziałek: <span class="text-danger">0</span></p>
                                        <p class="h6">Wtorek: <span class="text-danger">0</span></p>
                                        <p class="h6">Środa: <span class="text-danger">0</span></p>
                                        <p class="h6">Czwartek: <span class="text-danger">0/0</span></p>
                                        <p class="h6">Piatek: <span class="text-danger">0</span></p>
                                        <p class="h6">Sobota: <span class="text-danger">0</span></p>
                                        <p class="h6 mb-0">Niedziela: <span class="text-danger">0</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body ">
                                        <h3 class="font-weight-bold t ext-center mb-3"><i class="fas fa-users-cog"></i> Pracownicy</h3>
                                        <p class="h5">Pracownicy administracji: <span class="text-success">21</span></p>
                                        <p class="h5">Doświadczeni kierowcy: <span class="text-success">21</span></p>
                                        <p class="h5">Kierowcy: <span class="text-success">21</span></p>
                                        <p class="h5">Praktykanci: <span class="text-success">21</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body text-ce nter">
                                        <h3 class="font-weight-bold  mb-3"><i class="fas fa-business-time"></i> Podsumowanie dnia</h3>
                                        <p class="h5">Kierowców planowo: <span class="text-danger">0</span></p>
                                        <p class="h5">Kierowców pracujących: <span class="text-danger">0</span></p>
                                        <p class="h5">Pojazdów w ruchu: <span class="text-danger">0/0</span></p>
                                        <p class="h5">Raportów zdano: <span class="text-danger">0/0</span></p>
                                        <p class="h5 mt-3 m-0">Kierowca dnia: <span style="color: {{Auth::user()->roles->first()->color}}">[{{Auth::user()->code}}] {{Auth::user()->login}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body tex t-center">
                                        <h3 class="font-weight-bold  mb-3"><i class="fas fa-calendar-week"></i> Podsumowanie tygodnia</h3>
                                        <p class="h6">Poniedziałek: <span class="text-danger">0</span></p>
                                        <p class="h6">Wtorek: <span class="text-danger">0</span></p>
                                        <p class="h6">Środa: <span class="text-danger">0</span></p>
                                        <p class="h6">Czwartek: <span class="text-danger">0/0</span></p>
                                        <p class="h6">Piatek: <span class="text-danger">0</span></p>
                                        <p class="h6">Sobota: <span class="text-danger">0</span></p>
                                        <p class="h6 mb-0">Niedziela: <span class="text-danger">0</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-3">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body ">
                                        <h3 class="font-weight-bold t ext-center mb-3"><i class="fas fa-medal"></i> TOP 5 Kierowców</h3>
                                        <small class="text-muted">1. Login: <span class="text-success">zaliczone służby</span>/<span class="text-secondary">punkty</span>/<span class="text-info">kilometry</span></small>
                                        @for($i=1; $i<=5; $i++)
                                            <p class="h6">{{$i}}. Poniedziałek: <span class="text-success">0</span> / <span class="text-secondary">0</span> / <span class="text-info">0</span></p>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-3">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body tex t-center">
                                        <h3 class="font-weight-bold  mb-3"><i class="fas fa-medal"></i> TOP 5 Służb</h3>
                                        <small class="text-muted">1. Służba: <span class="text-warning">ilość przydziałów</span></small>
                                        @for($i=1; $i<=5; $i++)
                                            <p class="h6">{{$i}}. Poniedziałek: <span class="text-warning">0</span></p>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-3">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body tex t-center">
                                        <h3 class="font-weight-bold  mb-3"><i class="fas fa-medal"></i> TOP 5 Pojazdów</h3>
                                        <small class="text-muted">1. Służba: <span class="text-primary">ilość przydziałów</span></small>
                                        @for($i=1; $i<=5; $i++)
                                            <p class="h6">{{$i}}. Poniedziałek: <span class="text-primary">0</span></p>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-3">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body tex t-center">
                                        <h3 class="font-weight-bold  mb-3"><i class="fas fa-medal"></i> TOP 5 Do zwolnienia</h3>
                                        <small class="text-muted">1. Służba: <span class="text-danger">służby niezalizone</span></small>
                                        @for($i=1; $i<=5; $i++)
                                            <p class="h6">{{$i}}. Poniedziałek: <span class="text-danger">0</span></p>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
    						<div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body ">
    									<h3 class="font-weight-bold t ext-center mb-3"><i class="fas fa-road"></i> Raporty</h3>
                                        <p class="h5">Ilość raportów do sprawdzenia: <span class="text-success">21</span></p>
                                        <p class="h5">Ilość sprawdzających: <span class="text-success">21</span></p>
                                        <p class="h5">Średni czas na sprawdzanie raportów: <span class="text-success">21</span></p>
                                        <p class="h5">Ilość odwołań do raportów: <span class="text-success">21</span></p>
                                        <p class="h5">Średni czas na sprawdzanie odwołań: <span class="text-success">10</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body text-ce nter">
    									<h3 class="font-weight-bold  mb-3"><i class="fas fa-sign-out-alt"></i> Urlopy</h3>
                                        <p class="h5">Kierowców na urlopie: <span class="text-secondary">0</span></p>
                                        <p class="h5">Pracowników na urlopie: <span class="text-secondary">0</span></p>
                                        <p class="h5"> <span class="text-danger">&nbsp</span></p>
                                        <p class="h5"><span class="text-danger">&nbsp</span></p>
                                        <p class="h5 mt-3 m-0">&nbsp</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card border bg-dark mb-4">
                                    <div class="card-body text-center mb-0">
    									<!-- <h3 class="font-weight-bold  mb-3"><i class="fas fa-road"></i> Podsumowanie tygodnia</h3> -->
                                        <div class="p-2 ">
                                            <i class="fas fa-tools fa-6x mt-2"></i>
                                            <h3 class="mt-4">W budowie</h3>
                                            <p class="text-muted mb-0">
                                                Masz pomysł? Napisz do nas!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    				</div>
    				<!-- /.card-body -->
    			</div>
    			<!-- /.card -->
    		</div>
    </div>
@endsection
