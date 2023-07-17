@extends('layouts.blog')

@section('title')
    Strona Główna
@endsection

@section('custom-style')
    #intro {
        height: 400px;
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
    <div id="intro" class="pt-5 text-center bg-image shadow-1-strong" style="background-image: url('{{ asset('img/zdjecie.png') }}');">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white px-4">
                <h1 class="mb-3 h2">Rozkłady jazdy</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container text-center">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-2">

            </div>
            <div class="col-md-8 mb-4">
                <h1>ROZKŁADY JAZDY AUTOBUSÓW KOMUNIKACJI MIEJSKIEJ</h1>
                <!--Section: Content-->
                <section>
                    <div id="webArticle3">
                        <div class="font_a11">          
                            <p style="">
                                <b>AKTUALNE ROZKŁADY JAZDY DLA WYBRANEJ LINII KOMUNIKACJI MIEJSKIEJ W RADOMIU</b>
                            </p>
                            <p class="mb-5">
                                @foreach($lines as $line)
                                    <a href="#">
                                        <img src="http://mzdik.radom.pl/upload/image/Numery-linii-strona-@if($line->name < 10)0{{ $line->name }}@else{{ $line->name }}@endif.png" class="rounded rounded-4" alt="" width="79" height="42">
                                    </a>&nbsp;&nbsp;
                                @endforeach
                            </p>
                            <p class="text-dark mb-4" style="background-color: rgb(255, 255, 153);">
                                <b>
                                    <span style="">Żółty kolor</span>
                                </b>
                                <span style="">
                                    oznacza, że na trasie linii zaznaczonej w ten sposób występuje objazd (<b>trasa czasowo zmieniona</b>).
                                </span>
                            </p>
                            <p class="mb-5">
                                <a href="http://rkm.mzdik.radom.pl" target="_blank">
                                    <img src="http://mzdik.radom.pl/upload/image/Baner-rozklad-mapa-sieci-02.png" class="rounded rounded-4" alt="Baner - mapa sieci komunikacji" width="550" height="80">
                                </a>
                            </p>
                            <p style=""><span style="font-size: 13px;"><b>ROZKŁADY JAZDY DLA WYBRANEGO PRZYSTANKU KOMUNIKACJI MIEJSKIEJ W RADOMIU</b></span><b><br>
                            </b><b>(<a href="http://mzdik.radom.pl/rozklady/przystan.htm" target="_blank">kliknij tutaj, aby otworzyć listę przystanków w nowym oknie</a>)</b><br>
                            <br>
                            <b>Instrukcja korzystania z powyższych rozkładów jazdy autobusów jest umieszczona na dole strony.</b></p>
                            <p style="">Uwaga! Jeżeli po zmianie rozkładu jazdy na komputerze użytkownika jest nadal wyświetlany stary rozkład danej linii, oznacza to, że jest on pobierany z dysku komputera, a nie bezpośrednio z internetu. Należy wtedy odświeżyć stronę oraz zmienić ustawienia przeglądarki, żeby w przyszłości pobierała aktualne rozkłady przy każdej wizycie na stronie.<br>
                            <br>
                            <a target="_blank" href="http://www.mybusonline.pl"><img alt="Baner - myBus online" src="http://mzdik.radom.pl/upload/image/Baner-rozklad-aplik-myBus-01.png" width="550" height="64"></a><br>
                            <a target="_blank" href="https://jakdojade.pl/radom/"><span style="color: rgb(255, 0, 0);"><img alt="Rozkłady jazdy w serwisie jakdojade.pl" src="http://mzdik.radom.pl/upload/image/Baner-rozklad-jak-dojade-01.png" width="550" height="64"></span></a><br>
                            <a target="_blank" href="http://www.mmpk.info/rozklad_jazdy_mzdik_radom,16,12.html"><span style="color: rgb(255, 0, 0);"><img alt="Rozkłady jazdy w serwisie mobileMPK" src="http://mzdik.radom.pl/upload/image/Baner-rozklad-MPK-mobile-01.png" width="550" height="64"></span></a></p>
                            </center></center>
                            <p>&nbsp;</p>
                        </div>
                                      </div>
                    <!-- Post -->
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                <img src="https://media.discordapp.net/attachments/793476074281500672/922110025328123974/unknown.png?width=1163&height=657" class="img-fluid" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 mb-4">
                            <h5>Co dalej z Wirtualnym Pomorzem?</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ratione
                                necessitatibus itaque error alias repellendus nemo reiciendis aperiam quisquam
                                minus ipsam reprehenderit commodi ducimus, in dicta aliquam eveniet dignissimos
                                magni.
                            </p>
                            <button type="button" class="btn btn-primary">Read</button>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 mb-4">
                <!--Section: Sidebar-->
                <section class="sticky-top" style="top: 80px;">
                    <?php $sidebar = false;?>
                    @if($sidebar)
                    <!--Section: stats-->
                    <section class="text-center border-bottom pb-4 mb-4">
                        <h3 class="mb-4">Statystyki</h3>
                        <p class="text-center"><i class="far fa-calendar-plus"></i> Dzisiaj jest: <b>03.10.2021</b></p>
                        <p class="text-center"><i class="far fa-id-card"></i> Wykonaliśmy łącznie: <b>675 służb</b></p>
                        <p class="text-center"><i class="fa fa-car" aria-hidden="true"></i> Przejechaliśmy łącznie: <b>13166 km</b></p>
                        <p class="text-center"><i class="fas fa-users"></i> Aktualnie pracuje u nas: <b>77 osób</b></p>
                        <p class="text-center"><i class="far fa-id-badge"></i> Ilość osób oczekujących na zatrudnienie: <b>0</b></p>
                        <p class="text-center"><i class="fas fa-user-plus"></i> Ilość osób przyjętych po 1 etapie rekrutacji: <b>3</b></p>
                    </section>
                    <!--Section: stats-->
                    @endif
                </section>
                <!--Section: Sidebar-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
        <?php $pagination = false;?>
        @if($pagination)
        <!-- Pagination -->
        <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        @endif
    </div>
@endsection
