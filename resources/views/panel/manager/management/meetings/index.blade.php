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
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                <i class="fas fa-meetings"></i> Zebrania
                            </h4>
                        </div>
                        <div class="col text-end">
                            <a href="#" class="btn btn-outline-info"><i class="fas fa-tags"></i> Sprawozdania</a>
                            <a href="{{ route('manager.management.ogloszenia.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Dodaj ogłoszenie</a>
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="mt-4 d-block">
                         @if(count($ogloszenia) > 0)
                             <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tytuł</th>
                                            <th>Etykiety</th>
                                            <th>Autor</th>
                                            <th>Data</th>
                                            <th>Akcje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ogloszenia as $row)
                                            <tr>
                                                <td>
                                                    <h5>{{ $row->title }}</h5>
                                                </td>
                                                <td>
                                                    {{ $row->description }}
                                                </td>
                                                <td>
                                                    {{ $row->user->login }}
                                                </td>
                                                <td>
                                                    {{ $row->date_to->format('d.m.Y') }} {{ $row->hour_to->format('H:i') }}
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-info"><i class="far fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--table-->
                            </div>
                        @else
                            <div class="col-lg-12">
                                <div class="card shadow mb-4 bg-warning">
                                    <div class="card-body text-center">
                                        <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{ $ogloszenia->links() }}
                    </div>
                    <!--row-->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
