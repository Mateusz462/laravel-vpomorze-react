<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<meta name="robots" content="index, follow">
		<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
		<meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

		<meta name="locale" content="pl_PL">
		<meta name="type" content="website">
		<meta name="url" content="https://wirtualne-pomorze.pl">
		<meta name="site_name" content="Wirtualne Pomorze">
		<meta name="keywords" content="omsi.pl, wirtualne pomorze, Polskie OMSI, OMSI 2, OMSI2, wirtualne-pomorze, wirtualne-pomorze OMSI, Der Omnibussimulator, OMSI firma, vfirma omsi, pomoc omsi, omsi, der omnibussimulator, the omnibussimulator, forum omsi, omsi forum, poradniki omsi, download omsi, pobranie omsi, omsi 2, forum omsi 2">

		<meta name="title" content="Wirtualne Pomorze">
		<meta name="description" content="Wirtualne Pomorze to wirtualna działalność założona z myślą o miłośnikach komunikacji miejskiej. Zatrudniając się u nas poznasz co znaczy praca jako Kierowca Autobusu.">
		<meta name="keywords" content="wirtualne-pomorze.pl, wirtualne-pomorze pl, Polskie OMSI, OMSI 2, OMSI2, vfirma Omsi 2, vfirma OMSI, Der Omnibussimulator, OMSI pomorze, pomorze omsi, pomoc omsi, omsi, der omnibussimulator, the omnibussimulator, forum omsi, omsi forum, poradniki omsi, download omsi, pobranie omsi, omsi 2, forum omsi 2, pomorze, wirtualne-pomorze, ">
		<meta name="author" content="Mateusz Wydra">
		<meta name="image" content="https://wirtualne-pomorze.pl/portal/img/LogoWP.jpeg">

		<link rel="canonical" href="https://wirtualne-pomorze.pl">
		<link rel="icon" type="image/png" sizes="96x96" href="https://wirtualne-pomorze.pl/portal/img/WP-logo250.png">
        <title>@yield('title')</title>
		<!-- MDB -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- Custom style -->
		<style type="text/css">
            @yield('custom-style');
        </style>
		<style type="text/css">
			body {
				margin: 0;
				min-height: 100vh;
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
			}
			footer {
				width: 100%;
				margin-top: auto;
			}
			#intro {
				/* Margin to fix overlapping fixed navbar */
				margin-top: 58px;
			}
			@media (max-width: 991px) {
				#intro {
					/* Margin to fix overlapping fixed navbar */
					margin-top: 45px;
				}
			}
		</style>
	</head>
	<body>
		<header>
			<!-- Navbar -->
            @include('layouts.includes.blog.nav')
			<!-- Navbar -->

			<!-- Jumbotron -->
            @yield('header')
			<!-- Jumbotron -->
		</header>
		<!--Main Navigation-->

		<!--Main layout-->
		<main class="my-5">
            @yield('content')
		</main>
		<!--Main layout-->

		<!--Footer-->
        @include('layouts.includes.blog.footer')
		<!--Footer-->

		<!-- MDB -->
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<!-- Custom scripts -->
		<script type="text/javascript"></script>
		{!! Toastr::message() !!}
	</body>
</html>
