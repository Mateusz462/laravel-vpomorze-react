@extends('layouts.panel')

@section('title')
    Strona Główna- Panel Kierowcy
@endsection

@section('custom-style')
@endsection

@section('header')
    <div class="p-5 text-center bg-dark">
        <h1 class="mb-3 h2">Wniosek o pracę</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form>
                        <div class="card-header">
                            <h4 class="fw-bold">Fomularz rekrutacyjny</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Account</h5>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis sapien ligula, eu blandit massa vulputate at. In aliquam sed mauris vitae molestie.</p>
                                </div>
                                <div class="col-md-8">
                                    <!-- Imię input -->
                                    <p class="form-label">Imię:</p>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form1Example1" class="form-control" />
                                        <label class="form-label" for="form1Example1">Imię</label>
                                    </div>

                                    <!-- Nazwisko input -->
                                    <p class="form-label">Nazwisko:</p>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form1Example2" class="form-control" />
                                        <label class="form-label" for="form1Example2">Nazwisko</label>
                                    </div>

                                    <!-- E-mail input -->
                                    <p class="form-label">E-mail:</p>
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form1Example2" class="form-control" />
                                        <label class="form-label" for="form1Example2">E-mail</label>
                                    </div>

                                    <!-- login input -->
                                    <p class="form-label">Nazwa użytkownika:</p>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form1Example2" class="form-control" />
                                        <label class="form-label" for="form1Example2">Nazwa użytkownika</label>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Etat</h5>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis sapien ligula, eu blandit massa vulputate at. In aliquam sed mauris vitae molestie.</p>
                                </div>
                                <div class="col-md-8">
                                    <!-- select input -->
                                    <p class="form-label">Wybierz z listy</p>
                                    <div class="form-group">
                                        <select class="form-select" multiple>
                                            <option value="1">Poniedziałek</option>
                                            <option value="2">Wtorek</option>
                                            <option value="3">Środa</option>
                                            <option value="4">Czwartek</option>
                                            <option value="5">Piątek</option>
                                            <option value="6">Sobota</option>
                                            <option value="7">Niedziela</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Powiedz o swoim doświadczeniu</h5>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis sapien ligula, eu blandit massa vulputate at. In aliquam sed mauris vitae molestie.</p>
                                </div>
                                <div class="col-md-8">
                                    <!-- Ile czasu input -->
                                    <p class="form-label">Ile czasu grasz w OMSI (od kiedy):</p>
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form1Example1" class="form-control" />
                                        <label class="form-label" for="form1Example1">Ile czasu grasz w OMSI (od kiedy)</label>
                                    </div>

                                    <!-- Password input -->
                                    <p class="form-label">Czy pracowałeś kiedyś w innej vFirmie?</p>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form1Example2" class="form-control" />
                                        <label class="form-label" for="form1Example2">Czy pracowałeś kiedyś w innej vFirmie?</label>
                                    </div>

                                    <!-- Password input -->
                                    <p class="form-label">Wyjaśnij nam, dlaczego ty?</p>
                                    <div class="form-outline">
                                        <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                        <label class="form-label" for="textAreaExample">Wyjaśnij nam, dlaczego ty?</label>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Klauzura informacyjna</h5>
                                    <p class="text-muted">
                                        Zgodnie z art. 13 ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. (Dz. Urz. UE L 119 z 04.05.2016) informujemy, iż:<br>
                                        1) Pani/Pana dane osobowe przetwarzane będą w celu korzystania z serwisu XXX.pl na podstawie Art. 6 ust. 1 lit. b ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016r. oraz nawiązania kontaktu w celu wywiązania się z umowy korzystania z serwisu XXX.pl na podstawie Art. 6 ust. 1 lit. f ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. jako usprawiedliwionego interesu administratora (e-mail: XXXX@XXX.pl),<br>
                                        2) odbiorcami Pani/Pana danych osobowych będą wyłącznie podmioty uprawnione do uzyskania danych osobowych na podstawie przepisów prawa,<br>
                                        3) Pani/Pana dane osobowe przechowywane będą do momentu żądania usunięcia przez Panią/Pana,<br>
                                        4) posiada Pani/Pan prawo do żądania od administratora dostępu do danych osobowych, prawo do ich sprostowania, usunięcia lub ograniczenia przetwarzania oraz prawo do przenoszenia danych,<br>
                                        5) ma Pani/Pan prawo wniesienia skargi do organu nadzorczego,<br>
                                        6) podanie danych osobowych jest dobrowolne, jednakże odmowa podania danych będzie skutkować odmową realizacji usługi./umowy.<br>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>

                            <hr class="my-5">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
