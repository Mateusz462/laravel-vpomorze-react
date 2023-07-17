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
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="font-weight-bold mb-2">
                        <i class="far fa-building"></i> Przewoznicy
                    </h3>
                </div>
                <!--col-->
                <div class="col text-end">
                    <a href="#" class="btn btn-outline-info"><i class="fas fa-tags"></i> Zajezdnie</a>
                    <a href="{{ route('manager.management.ogloszenia.create') }}" class="btn btn-outline-success"><i class="fas fa-bullhorn"></i> Ogłoszenia</a>
                </div>
            </div>
            <div class="row mt-4">
                @forelse ($carriers as $row)
                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="card-title"><strong>{{ $row->name }}</strong></h2>
                                <h4 class="text-muted">{{ $row->place }}</h4>
                                <ul class="list-unstyled text-muted mt-2">
                                    <li class="mb-1"><i class="fas fa-users me-2"></i>Pracowników: <a href="" class="text-wrap text-reset lh-sm"><strong>12</strong></a></li>
                                    <li class="mb-1"><i class="fas fa-bus-alt me-2"></i>Pojazdów: <a href="" class="text-wrap text-reset lh-sm"><strong>24</strong></a></li>
                                    <li class="mb-1"><i class="fas fa-user-tie me-2"></i>Dyrektor: <a href="" class="text-wrap text-reset lh-sm"><strong>{{ $row->user->login }}</strong></a></li>
                                    <!-- <li class="mb-1">
                                        <i class="fas fa-lock me-2"></i>Prywatna
                                    </li>
                                    <li class="mb-1">
                                        <i class="fas fa-eye me-2"></i>Widoczna
                                    </li> -->

                                    <li class=""><i class="fas fa-clock me-2"></i>Data utworzenia: <a href="" class="text-wrap text-reset lh-sm"><strong>{{ $row->created_at->format('d M Y') }}</strong></a></li>
                                </ul>
                                <a href="carriers/{{ $row->id }}" class="btn btn-primary btn-block"><i class="fas fa-eye me-1"></i>Zobacz</a>
                                <button class="btn btn-secondary btn-block"><i class="fas fa-cogs me-1"></i>Zarządzaj</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="d-flex position-relative mt-5 justify-content-center">
                            <div class="p-3">
                                <div class="first text-center">
                                    <i class="fas fa-info-circle fa-6x"></i>
                                    <h3 class="mt-3">Brak przewoźnikow w systemie!</h3>
                                    <p class="text-muted">
                                        Dodaj przewożnika w ustawieniach systemu
                                    </p>
                                    <button type="button" class="btn btn-secondary"><i class="fas fa-cogs me-2"></i>Ustawienia systemu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-xl-4">
                        <form action="" method="post" class="card mb-4">
                            @csrf
                            <div class="bg-image preview d-block text-center">
                                <img id="img-preview" src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" style="height: 16rem;" class="card-img-top d-block"/>
                                <div class="mask" style="background-color: rgba(0, 0, 0, 0.0)">
                                    <button id="img-btn-trash" type="button" class="btn btn-white btn-rounded shadow-3 position-absolute top-0 end-0 mt-3 me-3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <div class="d-flex justify-content-center align-items-center h-100 mt-5">
                                        <div class="text-center mt-5 p-5">
                                            <button type="button" class="btn btn-white btn-rounded shadow-3" onclick="imgupload()">
                                                <i class="fas fa-edit me-2"></i>Zmień zdjęcie podglądowe
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-outline card-title">
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                    <label class="form-label" for="name">Nazwa firmy</label>
                                </div>
                                <div class="form-outline card-title">
                                    <input type="text" class="form-control" disabled>
                                    <label class="form-label" for="name">Adres siedziby</label>
                                </div>
                                <div class="form-outline card-title">
                                    <textarea type="text" class="form-control" name="description" rows="5"></textarea>
                                    <label class="form-label" for="name">Opis</label>
                                </div>

                                <button class="btn btn-success btn-block"><i class="fas fa-plus me-1"></i>Utwórz</button>
                            </div>
                        </form>
                    </div> -->
                @endforelse
            </div>
            <!--row-->
        </div>
    </div>
@endsection
