@extends('layouts.panel')

@section('title')
    Ankieta - tytul
@endsection

@section('custom-style')

@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item"><a href="{{ route('survey.index') }}">Ankiety</a></li>
                    <li class="breadcrumb-item text-warning">To jest Pierwsza Ankieta</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="container my-5">
                            <h1 class="card-title mb-3">
                                {{ $survey->name }}
                            </h1>
                            <h3 class="card-title mb-0">
                                Witajcie Wszyscy!
                            </h3>
                            <p class="mt-4">
                                {{ $survey->description }}
                            </p>
                            <p class="mt-4">
                                <img src="{{ asset('img/zdjecie2.png')}}" width="55%" alt="autobusxD">
                            </p>
                            <p class="mt-4">
                                kliknij dalej aby zacząć ankietę
                            </p>
                            <p class="mt-4">
                                <button class="btn btn-primary btn-lg">dalej</button>
                            </p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body text-center">

                        @forelse ($survey->questions as $question)
                            @if($question->type === 1)
                                <div class="container my-5">
                                    <h2 class="card-title mb-0">
                                        {{ $question->order }}. {{ $question->content }}
                                    </h2>
                                    <div class="form-outline mt-4">
                                        <i class="fas fa-exclamation-circle trailing"></i>
                                        <input type="text" id="form1" class="form-control form-icon-trailing" />
                                        <label class="form-label" for="form1">Gra</label>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <span>elo</span>
                        @endforelse
                        <hr>
                        <div class="container my-5">
                            <h2 class="card-title mb-0">
                                Where do you live exactly?
                            </h2>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="form-outline mt-4">
                                        <i class="fas fa-exclamation-circle trailing"></i>
                                        <input type="text" id="form1" class="form-control form-icon-trailing" />
                                        <label class="form-label" for="form1">panstwo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline mt-4">
                                        <i class="fas fa-exclamation-circle trailing"></i>
                                        <input type="text" id="form1" class="form-control form-icon-trailing" />
                                        <label class="form-label" for="form1">miasto</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline mt-4">
                                        <i class="fas fa-exclamation-circle trailing"></i>
                                        <input type="text" id="form1" class="form-control form-icon-trailing" />
                                        <label class="form-label" for="form1">roslina</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="container my-5">
                            <h2 class="card-title mb-0">
                                Your phone number?
                            </h2>
                            <div class="form-outline mt-4">
                                <div class="form-outline mt-4">
                                    <i class="fas fa-exclamation-circle trailing"></i>
                                    <input type="text" id="form1" class="form-control form-icon-trailing" />
                                    <label class="form-label" for="form1">rzecz</label>
                                </div>
                            </div>
                        </div>
                        <p class="mt-4">
                            <button class="btn btn-secondary btn-lg">wstecz</button>
                            <button class="btn btn-primary btn-lg">dalej</button>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="my-5">
                            <h2 class="card-title mb-0">
                                input radio
                            </h2>
                            <p class="mt-1">
                                please tell us your name first :-)
                            </p>
                            <div class="form-group">
                                <div class="col">
                                    @for($i=0; $i<=5; $i++)
                                    <div class="form-radio">
                                        <input type="radio" class="form-check-input" name="elo[]" id="nazwa-{{ $i }}">
                                        <label class="form-radio-label" for="nazwa-{{ $i }}">
                                            nazwa {{ $i }}
                                        </label>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="container my-5">
                            <h2 class="card-title mb-0">
                                What is your name?
                            </h2>
                            <p class="mt-1">
                                please tell us your name first :-)
                            </p>
                            <div class="form-outline mt-4">
                                <i class="fas fa-exclamation-circle trailing"></i>
                                <input type="text" id="form1" class="form-control form-icon-trailing" />
                                <label class="form-label" for="form1">Gra</label>
                            </div>
                        </div>
                        <hr>
                        <div class="container my-5">
                            <h2 class="card-title mb-0">
                                Where do you live exactly?
                            </h2>
                            <div class="form-outline mt-4">
                                <i class="fas fa-exclamation-circle trailing"></i>
                                <input type="text" id="form1" class="form-control form-icon-trailing" />
                                <label class="form-label" for="form1">panstwo</label>
                            </div>
                        </div>
                        <p class="mt-4">
                            <button class="btn btn-secondary btn-lg">wstecz</button>
                            <button class="btn btn-primary btn-lg">dalej</button>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="container my-5">
                            <h1 class="card-title mb-0">
                                Dzięki za udział w ankiecie
                            </h1>
                            <p class="mt-4">
                                {{ $survey->footer }}
                            </p>
                            <p class="mt-4">
                                <button class="btn btn-danger btn-lg">koniec</button>
                            </p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
