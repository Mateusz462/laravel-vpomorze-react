<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('map/styles/main.css') }} ">

  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd8-UDiOU6b_I5IT6oZ_YhnF3mmPYfOi4&libraries=places"></script>
  <script type="module" src="{{ asset('map/js/index.js') }}"></script>

  <title>Trip Planner</title>
</head>

<body>
  <section class="modal" id="search-modal">
    <div class="modal-content">
      <div class="init-content-container" style="display: none;">
        <div class="intro-language">
            <h1>Odkryj niesamowite miejsca w miejscu docelowym i zaplanuj podróż z dnia na dzień</h1>
            <p>Przeglądaj popularne miejsca na mapie, aby zwiedzać, jeść, pić i nie tylko</p>
            <p>Planer dzienny z prognozą pogody</p>
            <p>Przeciągnij i upuść miejsca w swoim planerze, aby wyznaczać trasy na mapie</p>
        </div>
        <form id="init-form">
          <div class="input-city-container">
            <label for="input-city">City: </label>
            <input type="text" name="input-city" id="input-city" required>
          </div>
          <div class="input-date-container">
            <label for="start-date">From: </label>
            <input type="date" name="start-date" id="start-date" required>
            <label for="end-date">To: </label>
            <input type="date" name="end-date" id="end-date" required>
          </div>
          <button id="search-submit">Start Exploring</button>
          <div><a class='show-itineraries'>Check out existing itineraries</a></div>
        </form>
      </div>
      <div class="itinerary-container">
        <ul class="itinerary-list"></ul>
        <a id="itinerary-back">Back</a>
      </div>
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

    <section id="map"></section>
  </main>
</body>
</html>