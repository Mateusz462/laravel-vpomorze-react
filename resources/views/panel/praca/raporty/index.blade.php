@extends('layouts.panel')

@section('title')
    Raporty - Panel Kierowcy
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Raporty</li>
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
                            
                            <ul class="list-group list-group-light d-none">
                                <li class="list-group-item py-3 bg-dark d-flex justify-content-between align-items-center">
                                    Oczekujące
                                    <i class="fas fa-arrow-circle-right"></i>
                                </li>
                                <li class="list-group-item py-3 bg-dark d-flex justify-content-between align-items-center">
                                    Złożone
                                    <i class="fas fa-arrow-circle-right"></i>
                                </li>
                                <li class="list-group-item py-3 bg-dark d-flex justify-content-between align-items-center">
                                    Nie złożone
                                    <i class="fas fa-arrow-circle-right"></i>
                                </li>
                            </ul>
                            <ul class="list-group list-group-light mb-3">
                                <li class="list-group-item bg-dark py-3 d-flex justify-content-between align-items-center">
                                    <div class="me-auto">
                                        Oczekujące
                                    </div>
                                    <button class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
                                </li>
                                <li class="list-group-item bg-dark py-3 d-flex justify-content-between align-items-center">
                                    <div class="me-auto">
                                        Złożone
                                    </div>
                                    <button class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
                                </li>
                                <li class="list-group-item bg-dark py-3 d-flex justify-content-between align-items-center">
                                    <div class="me-auto">
                                        Niezłożone
                                    </div>
                                    <button class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
                                </li>
                            </ul>
                            <!--row-->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h4 class="card-title">
                                        Twoje raporty złożone
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
                                                    <th>Data</th>
                                                    <th>Służba</th>
                                                    <th>Pojazd</th>
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
                                                            21.01.2022
                                                        </td>
                                                        <td>
                                                            brak informacji
                                                        </td>
                                                        <td>
                                                            @if($i % 2)
                                                                Mercedes-Benz Citaro O530G #508{{$i}}
                                                            @else
                                                                1237
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <div class=" action-label">
                                                                <a class="btn btn-dark btn-sm btn-rounded " href="#">
                                                                    <?php if ($i % 2): ?>
                                                                        <i class="far fa-dot-circle text-success me-2"></i>Zaliczony
                                                                    <?php else: ?>
                                                                        <i class="far fa-dot-circle text-danger me-2"></i>Niezaliczony
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
