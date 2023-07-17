@extends('layouts.blog')

@section('title')
    Strona Główna
@endsection

@section('custom-style')
    #intro {
       height: 800px;
       /* Margin to fix overlapping fixed navbar */
       margin-top: 58px;
     }
     @media (max-width: 991px) {
             #intro {
             /* Margin to fix overlapping fixed navbar */
             margin-top: 45px;
       }
   }
@endsection

@section('header')
    <div id="intro" class="p-5 text-center bg-image shadow-1-strong" style="background-image: url('{{ asset('img/zdjecie.png') }}');">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.4);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white px-4">
                    <h1 class="mb-3">Wkrótce!</h1>
                    <!-- Time Counter -->
                    <p>Ciężko pracujemy, aby dokończyć rozwój tej witryny.</p>
                    <p>Do tego czasu obserwuj nasze sociale </p>
                    <a class="btn btn-outline-light btn-lg m-2" href="" role="button" rel="nofollow" target="_blank">Facebook</a>
                    <a class="btn btn-outline-light btn-lg m-2" href="" target="_blank" role="button">Instagram</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <!--Section: Content-->
        <section>
            <div class="row">
                <div class="col-md-6 gx-5 mb-4 d-lg-flex align-items-center">
                    <div>
                        <h4><strong>Witajcie! </strong></h4>
                        <p class="text-muted">
                            Pewnie zastanawiacie się co się stało z Wirtualnym Pomorzem?
                            Spokojnie nie zamkneliśmy się na zawsze ;-)
                            Pracujemy teraz nad nową odsłoną firmy.
                            Obiecujemy Wam że się dla Was otworzymy i znów się razem zobaczymy.
                            Obserwujcie nasz fanpage na Facebooku
                        </p>
                    </div>
                </div>

                <div class="col-md-6 gx-5 mb-4">
                    <!-- Facebook button -->
                    <a class="btn btn-primary btn-block mb-4" href="" role="button">
                        Odwiedź nasz fanpage
                    </a>
                </div>
            </div>
        </section>
        <!--Section: Content-->
    </div>
@endsection
