@extends('layouts.panel')

@section('title')
    Strona Główna- Panel Kierowcy
@endsection

<?php $strona = false; $data = 2; ?>
@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
        <div class="container-fluid px-4 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Panel Wirtualnego Pomorza</li>
                    <li class="breadcrumb-item active" aria-current="page">Strona Główna</li>
                </ol>
            </nav>
        </div>
    </nav>
@endsection

@section('content')
    no elo
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#initModal">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="initModal" tabindex="-1" aria-labelledby="initModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                
                <div class="modal-body">
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    <div class="init-content-container row" style="display: none;">
                        <div class="intro-language col">
                            <h1>Odkryj niesamowite miejsca w miejscu docelowym i zaplanuj podróż z dnia na dzień</h1>
                            <p>Przeglądaj popularne miejsca na mapie, aby zwiedzać, jeść, pić i nie tylko</p>
                            <p>Planer dzienny z prognozą pogody</p>
                            <p>Przeciągnij i upuść miejsca w swoim planerze, aby wyznaczać trasy na mapie</p>
                        </div>
                        <form id="init-form col">
                            <div class="input-city-container">
                                <label for="input-city">City: </label>
                                <input type="text" value="Radom" name="input-city" id="input-city" required>
                            </div>
                            <div class="input-date-container">
                                <label for="start-date">From: </label>
                                <input type="date" name="start-date" id="start-date" required>
                                <label for="end-date">To: </label>
                                <input type="date" name="end-date" id="end-date" required>
                            </div>
                            <button id="search-submit">Start route planning</button>
                            <div><a class='show-itineraries'>Sprawdź istniejące trasy</a></div>
                        </form>
                    </div>
                    <div class="itinerary-container">
                        <ul class="itinerary-list"></ul>
                        <a id="itinerary-back">Back</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" id="search-submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
 <section class="modal" id="search-modal">
    <div class="modal-content">
      
    </div>
  </section>
  <main class="main-container">

<section class="planner-container">
  <header>
    <div class="logo">
      <i class="material-icons">loyalty</i><span>Triplanner</span>
    </div>
    <button class="btn btn-pink show-itineraries">Existing Itineraries</button>
  </header>
  <div class="planner-content">
    <div class="planner-box bucket">
      <div class="title"><p>Place Bucket</p></div>
      <div class="planner-list"></div>
    </div>
  </div>
</section>

<section class="place-container">
  <div class="place-overview">
    <div class="place-filter">
      <div class="filter-buttons">
        <li class="filter-li" id="see"><a class="btn btn-blue" href="#"><i class="material-icons">local_see</i>Site</a></li>
        <li class="filter-li" id="hotel"><a class="btn btn-yellow" href="#"><i class="material-icons">local_hotel</i>Hotel</a></li>
        <li class="filter-li" id="mall"><a class="btn btn-green" href="#"><i class="material-icons">local_mall</i>Shop</a></li>
        <li class="filter-li" id="dining"><a class="btn btn-orange" href="#"><i class="material-icons">local_dining</i>Food</a></li>
        <li class="filter-li" id="cafe"><a class="btn btn-purple" href="#"><i class="material-icons">local_cafe</i>Cafe</a></li>
        <li class="filter-li" id="bar"><a class="btn btn-pink" href="#"><i class="material-icons">local_bar</i>Drinks</a></li>
      </div>
      <div class="action-links" id="filter-actions">
        <a id="clear-filter">Clear</a>
        <a id="apply-filter">Apply</a>
      </div>
    </div>
    <div id="place-num"></div>
    <div class="place-list"></div>
  </div>

  <!-- <div class="place-details"> -->
  <!-- </div> -->
</section>

<section id="map" style="position: absolute"></section>
</main>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd8-UDiOU6b_I5IT6oZ_YhnF3mmPYfOi4&libraries=places"></script>
    <script>
        const mapaId = document.querySelector("#map");
        let map;
        
        function init_map(){
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 51.4025091, lng: 21.1632101, },
                zoom: 10,
            });
        }
        $(document).ready(function() {
  console.log("document ready!");
  console.log("Init map...");
  init_map();
  console.log("Map ready!");

  console.log("Init style map...");
  $("#map").removeAttr("style");
  console.log("Map style applied!");
});
            
            // Dodaj interakcje z mapą, np. zaznaczanie punktów
            // Tutaj możesz użyć odpowiednich zdarzeń i metod z API Google Maps
        
        // Inicjalizuj mapę po załadowaniu strony
        // init = new google.maps.event.addDomListener(window, "load", initMap);
    </script>
  <!-- <script type="module" src="{{ asset('map/js/index.js') }}"></script> -->
@endsection