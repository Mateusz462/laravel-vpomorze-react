@extends('layouts.panel')

@section('title')
    Grafik - Panel Kierowcy
@endsection

@section('custom-style')
<style>
    .col-md-cal {
        flex: 0 0 auto;
        max-width: 14.28571%;
    }
</style>
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top d-none">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Grafik</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    <!--Grid row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="far fa-calendar-times"></i> Grafik</h3>
                    <div class="card bg-dark border border-1 mt-3">
                        <div class="card-body">
                            <div class="row">
                                @for($i = 1; $i<=7; $i++)
                                    <div class="col-md-cal">
                                        <p class="mt-0 mb-0">20 stycznia 2022</p>
                                        <p class="fw-bold mt-0 mb-0">Czwartek</p>
                                        <!-- <h4 class="d-flex font-weight-semibold flex-nowrap my-1 text-info">Masz dzisiaj służbę!</h4> -->
                                        <p class="text-end mt-0 mb-0">P-57/3-1</p>
                                        <div class="d-flex  justify-content-start">
                                            <p class="mt-3">
                                                <b>Dyspozytor: </b><span class="gdpr"><span class="name">mateusz</span></span> [AD-001]<br>
                                            </p>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <h3 class="fw-bold">19 stycznia 2022</h3>
                                    <h5 class="d-flex font-weight-semibold flex-nowrap my-1 text-info">Masz dzisiaj służbę!</h5>
                                    <p class="mt-3">
                                        <b>Służba: </b>34/1/A<br>
                                        <b>Rodzaj służby:</b> Służba regularna dwuzmianowa <br>
                                        <b>Dyspozytor: </b><span class="gdpr"><span class="name">mateusz</span></span> [AD-001]<br>
                                    </p>
                                    <hr>
                                    <div class="bg-image hover-overlay ripple">
                                        <img src="https://media.discordapp.net/attachments/793476074281500672/929061032079556658/unknown.png?width=1156&height=657" class="img-fluid" width=""/>
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                                        </a>
                                    </div>
                                    <p class="mt-3">
                                        <b>Pojazd:</b> Solbus Urbino 13 Lions City<br>
                                        <b>Numer rejestracyjny:</b> WR 312A3<br>
                                        <b>Skrzynia:</b> ZF<br>
                                        <b>Pulpit:</b> ACTIA<br>
                                        <b>Napęd/paliwo:</b> Diesel <br><br>
                                        <b>Klimatyzacja: </b><i class="fas fa-check text-success"></i><br>
                                        <b>Ogrzewanie: </b><i class="fas fa-check text-success"></i><br>
                                        <b>Brygadówka: </b><i class="fas fa-check text-success"></i><br>
                                        <b>Biletomat: </b><i class="fas fa-check text-success"></i><br>
                                    </p>
                                </div>
                                <div class="col d-none">
                                    <h3 class="fw-bold mb-4">Nowy raport ze służby</h3>
                                    <div class="row">
										<div class="col-lg-4">
											<h4 class="mb-3">1. Podaj stany liczników</h4>
                                            <div class="form-group mb-2">
                                                <div class="form-outline mb-2">
                                                    <input type="text" id="formTextExample1" class="form-control" aria-describedby="textExample1" />
                                                    <label class="form-label" for="formTextExample1">Example label</label>
                                                </div>
                                                <div id="textExample1 " class="form-text">
                                                    We'll never share your email with anyone else.
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="form-outline mb-2">
                                                    <input type="text" id="formTextExample1" class="form-control" aria-describedby="textExample1" />
                                                    <label class="form-label" for="formTextExample1">Example label</label>
                                                </div>
                                                <div id="textExample1 " class="form-text">
                                                    We'll never share your email with anyone else.
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="form-outline mb-2">
                                                    <input type="text" id="formTextExample1" class="form-control" aria-describedby="textExample1" />
                                                    <label class="form-label" for="formTextExample1">Example label</label>
                                                </div>
                                                <div id="textExample1 " class="form-text">
                                                    We'll never share your email with anyone else.
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="form-outline mb-2">
                                                    <input type="text" id="formTextExample1" class="form-control" aria-describedby="textExample1" />
                                                    <label class="form-label" for="formTextExample1">Example label</label>
                                                </div>
                                                <div id="textExample1 " class="form-text">
                                                    We'll never share your email with anyone else.
                                                </div>
                                            </div>
										</div>
										<div class="col-lg-8">
											<h4 class="mb-3">2. Wgraj zdjęcia</h4>
                                            <form action="#" method="" class="  bg- mb-4">
                                                @csrf
                                                <div class="bg-image preview d-none text-center">
                                                    <img id="img-preview" src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" style="height: 16rem;" class="card-img-top d-none"/>
                                                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.0)">
                                                        <button id="img-btn-trash" type="button" class="btn btn-white btn-rounded shadow-3 position-absolute top-0 end-0 mt-3 me-3">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <div class="d-flex justify-content-center align-items-center h-100 mt-5">
                                                            <div class="text-center mt-5 p-5">
                                                                <button type="button" class="btn btn-white btn-rounded shadow-3" onclick="imgupload()">
                                                                    <i class="fas fa-edit me-2"></i>Zmień zdjęcia
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div onclick="imgupload" id="img-upload" class="card-body borde r-0 text-center p-5 form" style="border: 2px dashed #c2cdda; b ackground-color: hsl(210, 26%, 84%)">
                                                    <input type="file" class="input-file" name="" value="" hidden>
                                                    <i class="fas fa-cloud-upload-alt fa-5x text-white mb-4 d-block"></i>
                                                    <button type="button" class="btn btn-white btn-rounded shadow-3">
                                                        <i class="fas fa-plus me-2"></i>Dodaj zdjęcia
                                                    </button>
                                                </div>
                                            </form>
										</div>
                                    </div>
                                    <div class="row mt-2">
										<div class="col-lg-6">
											<h4 class="mb-3">3. Dodaj podsumowanie z gry</h4>
                                            <div onclick="imgupload" id="img-upload" class="card-body borde r-0 text-center p-5 form" style="border: 2px dashed #c2cdda; b ackground-color: hsl(210, 26%, 84%)">
                                                <input type="file" class="input-file" name="" value="" hidden>
                                                <i class="fas fa-file-upload fa-5x text-white mb-4 d-block"></i>
                                                <button type="button" class="btn btn-white btn-rounded shadow-3">
                                                    <i class="fas fa-plus me-2"></i>Dodaj statystykę
                                                </button>
                                            </div>
										</div>
                                        <div class="col-lg-6">
                                            <h4 class="mb-3">4. Inne</h4>
                                            <div class="form-group">
                                                <textarea class="form-control" name="uwagi" id="uwagi" rows="6" placeholder="Uwagi"></textarea>
                                            </div>
                                            <button class="btn btn-success btn-block mt-4"><i class="fas fa-paper-plane"></i> Wyślij</button>
                                        </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--card-header-->
            </div><!-- card -->

        </div><!-- row -->

    </div>
@endsection
