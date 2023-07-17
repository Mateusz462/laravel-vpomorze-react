@extends('layouts.panel')

@section('title')
    Zgłoszenia - Panel Kierowcy
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Zgłoszenia drogowe</li>
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
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Twoje zgłoszenia drogowe
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                        <table id="table_users" class="table table-responsive" style="width: 100%;" id="users-table" data-ajax_url="{{ url("admin.auth.user.get") }}">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pojazd</th>
                                    <th>Data złożenia</th>
                                    <th>Status</th>
                                    <th>Opcje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 5; $i>=1; $i--)
                                    <tr>
                                        <td>
                                            {{ $i }}
                                        </td>
                                        <td>
                                            brak informacji
                                        </td>
                                        <td>
                                            0{{$i}}.01.2022
                                        </td>
                                        <td>
                                            @if($i % 2)
                                                @if($i == 5)
                                                    <p class="h5">
                                                        <span class="badge badge-warning rounded-pill">
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            Oczekuje na sprawdzenie
                                                        </span>
                                                    </p>
                                                @else
                                                    <p class="h5"><span class="badge badge-success rounded-pill"><i class="fas fa-check-circle"></i> Przyjęty</span></p>
                                                @endif
                                            @else
                                                <p class="h5"><span class="badge badge-danger rounded-pill"><i class="fas fa-times-circle"></i> Odrzucony</span></p>
                                                <!-- <span class="badge badge-warning rounded-pill">Oczekujące na złożenie</span> -->
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="">
                                                <h6 class="mb-0"><i class="fas fa-eye"></i></h6>
                                            </a>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <!--table-->
                    </div>
                    <!--row-->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title mb-0">
                                Zgłoś zdarzenie drogowe
                            </h4>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->
                    <div class="mt-4 d-block">
                        <b>
                            Brak możliwości zgłoszenia zdarzenia drogowego! <br>
                            Nie masz dzisiaj służby!
                        </b>
                    </div>
                    <!--row-->
                </div>
            </div>
        </div>
    </div>
@endsection
