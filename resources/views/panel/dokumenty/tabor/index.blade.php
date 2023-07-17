@extends('layouts.panel')

@section('title')
    Pojazdy - Panel Kierowcy
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Pojazdy</li>
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
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Pojazdy
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->
                    <div class="mt-4 d-block">
                        <div class="table-responsive border mb-3">
                            <table class="table table-dark table-striped table-hover text-white mb-0" style="width: 100%;">
                                <thead>
                                    <tr class="text-center">
                                        <th>Numer taboru</th>
                                        <th>Pojazd</th>
                                        <th>Zajezdnia</th>
                                        <th>Rok produkcji</th>
                                        <th>Numer rejestracyjny</th>
                                        <th>Status</th>
                                        <th>Akcje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i<=6; $i++)
                                        <tr class="text-center">
                                            <td class="">
                                                #10{{$i}}
                                            </td>
                                            <td>
                                                MAN NL273 Lion's City
                                            </td>
                                            <td>
                                                Grupa Akcent
                                            </td>
                                            <td>
                                                2006
                                            </td>
                                            <td class="">
                                                <div class="registration-plate center d-one">
                                                    <div class="registration-plate__container registration-plate__size--medium registration-plate__pl">
                                                        <div class="signature signature__euro"></div>
                                                        <div class="registration">
                                                            <span>GND 4510{{$i}}</span>
                                                            <span class="vintage-icon"></span>
                                                        </div>                                               
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-label">
                                                    @if($i == 2)
                                                    <a class="btn btn-dark btn-sm btn-rounded" href="#">
                                                        <i class="far fa-dot-circle text-pink me-2"></i>Odstawka
                                                    </a>
                                                    @elseif($i == 3)
                                                    <a class="btn btn-dark btn-sm btn-rounded" href="#">
                                                        <i class="far fa-dot-circle text-secondary me-2"></i>Warsztat
                                                    </a>
                                                    @elseif($i == 4)
                                                    <a class="btn btn-dark btn-sm btn-rounded" href="#">
                                                        <i class="far fa-dot-circle text-danger me-2"></i>Awaria
                                                    </a>
                                                    @elseif($i == 5)
                                                    <a class="btn btn-dark btn-sm btn-rounded" href="#">
                                                        <i class="far fa-dot-circle text-info me-2"></i>Oczekuje
                                                    </a>
                                                    @elseif($i == 6)
                                                    <a class="btn btn-dark btn-sm btn-rounded" href="#">
                                                        <i class="far fa-dot-circle text-yellow me-2"></i>Test
                                                    </a>
                                                    @elseif($i == 0)
                                                    <a class="btn btn-dark btn-sm btn-rounded" href="#">
                                                        <i class="far fa-dot-circle text-purple me-2"></i>Serwis
                                                    </a>
                                                    @else
                                                    <a class="btn btn-dark btn-sm btn-rounded" href="#">
                                                        <i class="far fa-dot-circle text-success me-2"></i>W ruchu
                                                    </a>
                                                    
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <a href="{{ route('pojazdy.show') }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    @can('user_edit')
                                                    <a href="" class="btn btn-info"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <!--table-->
                        <div class="row d-none">
                            @for($i=1; $i<=15; $i++)
                                <div class="col-lg-6 col-xxl-4">
                                    <div class="card mb-4 bg-dark">
                                        <div class="card-body">
                                            <h4 class="fw-bold">#2137 MAN NL273 Lion's City</h4>
                                            <!-- <div class="d-flex justify-content-center mt-3"> -->
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-0"><b>Marka:</b> MAN</p>
                                                    <p class="mb-0"><b>Model:</b> NL273 Lion's City</p>
                                                    <p class="mb-0"><b>Zajezdnia:</b> Grupa Akcent</p>

                                                    <div class="registration-plate d-one">
                                                        <div class="registration-plate__container registration-plate__size--medium registration-plate__pl">
                                                            <div class="signature signature__euro"></div>
                                                            <div class="registration">
                                                                <span>GND 45100</span>
                                                                <span class="vintage-icon"></span>
                                                            </div>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col mt-xs-4">
                                                    <img src="https://media.discordapp.net/attachments/793476074281500672/929061032079556658/unknown.png?width=1156&height=657" class="img-fluid w-auto h-auto" width=""/>
                                                </div> -->
                                            </div>
                                            <div class="d-block d-md-none mt-3">
                                                <button class="btn btn-primary btn-block"><i class="fas fa-eye"></i> Zobacz więcej</button>
                                                <button class="btn btn-success btn-block"><i class="fas fa-edit"></i> Edytuj dane</button>
                                                <button class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Usuń pojazd</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="d-flex justify-content-between mt-3 ">
                                                    <button class="btn btn-primary"><i class="fas fa-eye"></i> Zobacz więcej</button>
                                                    <!-- <button class="btn btn-success"><i class="fas fa-edit"></i> Edytuj dane</button>
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Usuń pojazd</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <!--row-->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
