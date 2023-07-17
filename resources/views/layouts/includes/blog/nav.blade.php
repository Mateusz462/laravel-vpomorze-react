<?php
    $linki = true;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ url('/')}}">
            <img src="{{ asset('img/AKCNET.png') }}" class="me-2" height="50" alt="logo" loading="lazy" />
            <!-- <small>Wirtualne Pomorze</small> -->
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Icons -->
                <li class="nav-item active me-3 me-lg-0">
                    <a class="nav-link btn-link" href="{{ url('/')}}">Strona Główna</a>
                </li>
                @if($linki)
                    <li class="nav-item active me-3 me-lg-0">
                        <a class="nav-link btn-link" href="#">O nas</a>
                    </li>
                    <li class="nav-item active me-3 me-lg-0">
                        <a class="nav-link btn-link" href="#">FAQ</a>
                    </li>
                @endif
                    <li class="nav-item active me-3 me-lg-0">
                        <a class="nav-link btn-link" href="{{ route('login')}}">Panel</a>
                    </li>
                    <li class="nav-item active me-3 me-lg-0">
                        <a class="nav-link btn-link" href="#">Kontakt</a>
                    </li>

            </ul>
        </div>
    </div>
</nav>
