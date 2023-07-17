<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<link rel="canonical" href="https://wirtualne-pomorze.pl">
		<link rel="icon" type="image/png" sizes="96x96" href="https://wirtualne-pomorze.pl/portal/img/WP-logo250.png">
		<meta name="description" content="">
		<meta name="author" content="">
        <title>@yield('title')</title>
		<!-- MDB -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
		<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- Custom style -->
		<style type="text/css">
            @yield('custom-style');
        </style>
	</head>
	<body>
		<!--Main layout-->
		<main class="">
            @yield('content');
		</main>
		<!--Main layout-->

		<!-- MDB -->
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
		{!! Toastr::message() !!}
		<!-- Custom scripts -->
		@yield('custom-scripts');
	</body>
</html>
