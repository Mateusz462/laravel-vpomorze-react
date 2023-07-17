<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
		<!-- MDB -->
		<link href="https://mdbootstrap.com/previews/mdb-ui-kit/sidenav/css/mdb.min.css" rel="stylesheet"/>

		<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
		<link rel="icon" type="image/png" sizes="96x96" href="https://wirtualne-pomorze.pl/portal/img/WP-logo250.png">
		<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

        <!-- Custom style -->
		@yield('custom-style')
		<style>
			body.sidebar-toggled, content{
				padding-left: 240px;
			}
			body.sidebar-toggled, #main-navbar {
				padding-left: 240px;
			}
		</style>
		<link rel="stylesheet" href="https://mdbootstrap.com/previews/mdb-ui-kit/sidenav/dev/css/new-prism.css">
		<script type="text/javascript" src="https://mdbootstrap.com/previews/mdb-ui-kit/sidenav/dev/js/new-prism.js"></script>
		<script type="text/javascript" src="https://mdbootstrap.com/previews/mdb-ui-kit/sidenav/js/mdb.min.js"></script>

	</head>
	<!-- background-color: hsl(0, 0%, 95%) -->
	<body class="sidebar-toggled" style="">
		<!-- Navbar -->
		<!-- Sidenav -->
		@include('layouts.includes.sidebar')
		<!-- Sidenav -->

		<!-- Navbar -->
		@include('layouts.includes.nav')
		<!-- Navbar -->
		<!-- Jumbotron -->
		@include('layouts.partials.jumbotron')
		<!-- Jumbotron -->
		<!--Main layout-->
		<main id="content" class="my-5">
			<div class="container-fluid px-4">
				@include('layouts.partials.alert')
			</div>
			<div class="container-fluid px-4">
				@yield('content')
			</div>
		</main>
		<!--Main layout-->

		<!--Footer-->
		@include('layouts.includes.footer')
		<!--Footer-->

		<!-- MDB -->
		@yield('custom-scripts')
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

		<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.2/dist/perfect-scrollbar.js"></script>
		<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


		{!! Toastr::message() !!}
		<script type="text/javascript">

			// Toggle the side navigation
			$("#sidebarToggleTop").on('click', function(e) {
				$("body").toggleClass("sidebar-toggled");
				$(".sidenav").toggleClass("collapse");
				if ($(".sidenav").hasClass("collapse")) {
					$('.sidenav .toggled').toggleClass('hide');
				};
			});
			$(window).resize(function() {
				if ($(window).width() < 768) {
					$("body").removeClass("sidebar-toggled");
					$(".sidenav").addClass("collapse");
					// $('.sidenav .toggled').toggleClass('hide');
					// $(".sidenav").addClass("toggled");
					$('.sidenav .toggled').addClass('hide');
				} else {
					$("body").addClass("sidebar-toggled");
					$(".sidenav").removeClass("collapse");

				}

			  /* Toggle the side navigation when window is resized below 480px
			  if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
				$("body").addClass("sidebar-toggled");
				$(".sidebar").addClass("toggled");
				$('.sidebar .collapse').collapse('hide');
			  };*/
			});
			// Close any open menu accordions when window is resized below 768px

		</script>
		@yield('js-files')
		<script type="text/javascript">
			const container =
			document.querySelector('#sidenav-1');
			const ps = new PerfectScrollbar(container);
		</script>
		<!-- Custom scripts -->
		<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	</body>
</html>
