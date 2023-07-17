@extends('layouts.panel')

@section('title')
    Wnioski - Panel Kierowcy
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Wnioski</li>
                </ol>
            </nav>
        </div>
    </nav>
    <!-- <div class="p-5 text-center bg-danger">
        <h1 class="mb-3">Zostałeś zawieszony!</h1>
        <p><b>Powód:</b> Masz 48h od teraz (XX.XX.XXXX) na podanie prawdziwego imienia i nazwiska, należy je zmienić w ustawieniach panelu. Jeżeli tego nie zrobisz - zostaniesz zwolniony</p>
    </div> -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <h4 class="card-title">
                                        Dostępne wnioski do złożenia
                                    </h4>
                                </div>
                                <!--col-->
                            </div>
                            <!--row-->
                            <div class="table-responsive">
                                <table class="table table-dark table-striped table-hover text-center mb-0" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Nazwa wniosku</th>
                                            <th>Opcje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Wniosek o zmianę etatu
                                            </td>
                                            <td>
                                                <button class="btn btn-primary orange" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wniosek o zawieszenie
                                            </td>
                                            <td>
                                                <button class="btn btn-primary orange" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wniosek o odwieszenie
                                            </td>
                                            <td>
                                                <button class="btn btn-primary orange" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wniosek o urlop
                                            </td>
                                            <td>
                                                <button class="btn btn-primary orange" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wniosek o skrócenie urlopu
                                            </td>
                                            <td>
                                                <button class="btn btn-primary orange" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wypowiedzenie umowy o pracę
                                            </td>
                                            <td>
                                                <button class="btn btn-primary orange" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Zgłoszenie rezerwy
                                            </td>
                                            <td>
                                                <button class="btn btn-primary pink" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wniosek o kurs z wolnego
                                            </td>
                                            <td>
                                                <button class="btn btn-primary pink" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wniosek o stały przydział pojazdu
                                            </td>
                                            <td>
                                                <button class="btn btn-primary pink" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wniosek o nieprzydzielanie pojazdu
                                            </td>
                                            <td>
                                                <button class="btn btn-primary pink" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Przedłużenie czasu na złożenie raportu
                                            </td>
                                            <td>
                                                <button class="btn btn-primary purple" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Usprawidliwienie niewykonanego raportu
                                            </td>
                                            <td>
                                                <button class="btn btn-primary purple" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Zgłoszenie błędu
                                            </td>
                                            <td>
                                                <button class="btn btn-light yellow" data-toggle="tooltip" data-original-title="Nie masz uprawnień do złożenia tego wniosku!"><h6 class="mb-0"><i class="fas fa-plus-square"></i>  WYPEŁNIJ</h6></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--table-->
                            </div>
                            <!--row-->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h4 class="card-title">
                                        Twoje Wnioski
                                    </h4>
                                </div>
                                <!--col-->
                            </div>
                            <!--row-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-striped table-hover text- mb-0" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Typ wniosku</th>
                                                    <th>Data złożenia</th>
                                                    <th class="text-center">Status</th>
                                                    <th>Opcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i = 1; $i<=11; $i++)
                                                    <tr>
                                                        <td>
                                                            {{ $i }}
                                                        </td>
                                                        <td>
                                                            brak informacji
                                                        </td>
                                                        <td>
                                                            27.01.2022
                                                        </td>
                                                        <td class="text-center">
                                                            <div class=" action-label">
                                                                <a class="btn btn-dark btn-sm btn-rounded " href="#">
                                                                    <?php if ($i % 2): ?>
                                                                        <i class="far fa-dot-circle text-success me-2"></i>Przyjęty
                                                                    <?php elseif ($i == 4): ?>
                                                                        <i class="far fa-dot-circle text-secondery me-2"></i>New
                                                                    <?php elseif ($i % 3): ?>
                                                                        <span class="spinner-border spinner-border-sm me-2 text-warning" role="status" aria-hidden="true"></span>
                                                                        Oczekuje na sprawdzenie
                                                                    <?php else: ?>
                                                                        <i class="far fa-dot-circle text-danger me-2"></i>Odrzucony
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                        
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-primary">
                                                                <h6 class="mb-0"><i class="fas fa-eye"></i></h6>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--table-->
                            </div>
                            <!--row-->
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
