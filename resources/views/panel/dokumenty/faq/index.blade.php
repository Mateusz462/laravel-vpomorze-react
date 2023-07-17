@extends('layouts.panel')

@section('title')
    Grafik - Panel Kierowcy
@endsection

@section('custom-style')
    .col-md-cal {
        flex: 0 0 auto;
        max-width: 14.28571%;
    }
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  border-top d-none">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
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
    <!--Grid row-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-4"><i class="far fa-question-circle pr-1"></i>FAQ</h3>

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="card mb-4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq1">
                                    <button class="accordion-button collapsed fs-4" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#basicAccordionCollapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Question #1
                                    </button>
                                </h2>
                                <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="faq1"
                                    data-mdb-parent="#basicAccordion" style="">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing and
                                        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                        our default variables. It's also worth noting that just about any HTML can go within
                                        the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed fs-4" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#basicAccordionCollapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Question #2
                                    </button>
                                </h2>
                                <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faq2"
                                    data-mdb-parent="#basicAccordion" style="">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing and
                                        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                        our default variables. It's also worth noting that just about any HTML can go within
                                        the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="accordion-item">
                                <h1 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed fs-4" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Question #3
                                    </button>
                                </h1>
                                <div id="basicAccordionCollapseThree" class="accordion-collapse collapse" aria-labelledby="faq3"
                                    data-mdb-parent="#basicAccordion" style="">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing and
                                        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                        our default variables. It's also worth noting that just about any HTML can go within
                                        the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


        </div><!-- row -->
    </div>
@endsection
