@extends('layouts.panel')

@section('title')
    Ograniczenia Dostępu - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Zarządzania Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Ustawienia</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ograniczenia Dostępu</li>
                </ol>
            </nav>
        </div>
    </nav>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4 my-3">
            <h2>Zarządzanie Panelem - Ograniczenia Dostępu</h2> -->
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Panel Administracyjny</a></li>

                </ol>
            </nav>
        </div>
    </nav> -->
    <!-- <div class="p-5 text-center bg-danger">
        <h1 class="mb-3">Zostałeś zawieszony!</h1>
        <p><b>Powód:</b> Masz 48h od teraz (XX.XX.XXXX) na podanie prawdziwego imienia i nazwiska, należy je zmienić w ustawieniach panelu. Jeżeli tego nie zrobisz - zostaniesz zwolniony</p>
    </div> -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="m-0 font-weight-bold">Wybierz Ustawienie:</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border bg-dark mb-4">
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center"><i class="fas fa-user-plus"></i> Rekrutacja <i class="fas fa-user-plus"></i></h3>
                                    <br>
                                    <br>
                                    <div class="alert alert-danger" role="alert">
                                        <h5><i class="fas fa-ban"></i> <b>Przerwa Techniczna!</b></h5>
                                        Uwaga Rekrutacja Wyłączona! Brak Możliwości złożenia wniosku o prace!
                                        <hr>
                                        <small class="mb-0">Poinformował <a href="index.php?a=profile&amp;p=6" style="color: #006080">[PA-003] mateusz</a> w dniu 2021-07-31 14:25:00</small>
                                    </div>
                                    <br>
                                    <form action="index.php?a=zarządzanie-panel&amp;s=limitations&amp;action=register" method="POST">
                                        <input type="hidden" value="1" name="status">
                                        <p class="text-center"><button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-power-off"></i> Włącz</button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border bg-dark mb-4">
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center"><i class="fas fa-user-check"></i> Logowanie <i class="fas fa-user-check"></i></h3>
                                    <br>
                                    <br>
                                    <div class="alert alert-warning" role="alert"><h5><i class="fas fa-exclamation-triangle"></i> <b>Przerwa Techniczna</b></h5>Trwają prace techniczne! Dostęp do panelu dla  uprawnionych<hr><small class="mb-0">Poinformował <a href="index.php?a=profile&amp;p=6" style="color: #006080">[PA-003] mateusz</a> w dniu 2021-08-29 22:54:36</small></div>																										<br>
                                    <form action="index.php?a=zarządzanie-panel&amp;s=limitations&amp;action=login" method="POST">
                                        <input type="hidden" value="1" name="status">
                                        <p class="text-center"><button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-power-off"></i> Włącz</button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border bg-dark mb-4">
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center"><i class="fas fa-ban"></i> Informacja o przerwie technicznej <i class="fas fa-ban"></i></h3>
                                    <br>
                                    <br>
                                    <div class="alert alert-danger" role="alert"><h5><i class="fas fa-ban"></i> <b>Przerwa Techniczna!</b></h5>Dostęp do panelu tylko dla <b>uprawnionych!</b><hr><small class="mb-0">Poinformował <b>System Wirtualnego Pomorza</b> w dniu 2021-09-01 17:34:51</small></div>																										<h3 class="text-center">Status: <span class="badge bg-success bg-lg">WŁĄCZONA</span></h3>
                                    <br>
                                    <form action="index.php?a=zarządzanie-panel&amp;s=limitations&amp;action=pt" method="POST">
                                        <input type="hidden" value="1" name="status">
                                        <p class="text-center"><button type="submit" class="btn btn-outline-danger btn-lg"><i class="fas fa-power-off"></i> Wyłącz</button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border bg-dark mb-4">
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center"><i class="fas fa-user-lock"></i> Użytkownicy z pozwoleniem na wejście podczas przerwy technicznej <i class="fas fa-user-lock"></i></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-4">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-body">
                                                            <p class="text-center"><a href="index.php?a=profile&amp;p=1" style="color: #3cbeda">[P-001] DonRemko</a></p>
                                                            <p class="text-center"><a href="index.php?a=rangi&amp;id=1" style="color: #3cbeda">Prezes WP</a></p>
                                                        </div>
                                                    </div>
                                                </div><div class="col-xl-4">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-body">
                                                            <p class="text-center"><a href="index.php?a=profile&amp;p=32" style="color: #2b9d36">[DS-002] ganiks1122</a></p>
                                                            <p class="text-center"><a href="index.php?a=rangi&amp;id=2" style="color: #2b9d36">Dyrektor Spółki</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-body">
                                                            <p class="text-center"><a href="index.php?a=profile&amp;p=6" style="color: #006080">[PA-003] mateusz</a></p>
                                                            <p class="text-center"><a href="index.php?a=rangi&amp;id=7" style="color: #006080">Programista</a></p>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
