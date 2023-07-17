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
		@yield('javascript')
		<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
		<script src="https://cdn.socket.io/4.0.1/socket.io.min.js?v=1"></script>
		<script>

			const site_address = 'https://panel.vztm.pl';
			const WS_ADDRESS = 'http://localhost:3000';
			const WS_TOKEN = $('meta[name="_token"]').attr('content');
		
			// const mainSocket = io.connect(WS_ADDRESS, {
			// 	//path: '',
			// 	auth: {
			// 		token: WS_TOKEN
			// 	},
			// 	reconnectionDelay: 6000,
			// 	reconnection: true
			// 	})

			// 	mainSocket.on('connect', () => {
			// 	console.log('Successfully connected to '+ WS_ADDRESS)

			// 	setTimeout(() => {
			// 		console.log('Checking in...')

			// 		mainSocket.emit('conn-users:check-in', function (res) {
			// 			console.log(res)
			// 		})

			// 		const onlineUsersBox = document.querySelector('.online-users')
			// 		if (onlineUsersBox) {

			// 			const connectedUsers = new Map;

			// 			const rebuildListener = (users) => {

			// 				const usersObj = {}

			// 				users.forEach(([id, user]) => {
			// 					usersObj[id] = user
			// 				})

			// 				Object.keys(usersObj).forEach((id) => {
			// 					if (!connectedUsers.has(id)) connectedUsers.set(id, usersObj[id])
			// 				})

			// 				connectedUsers.forEach((_user, id) => {
			// 					if (!(id in usersObj)) connectedUsers.delete(id)
			// 				})

			// 				onlineUsersBox.querySelectorAll('span[data-user]').forEach(elem => {
			// 					if (!connectedUsers.has(elem.getAttribute('data-user'))) {
			// 							elem.classList.add('animate__animated', 'animate__bounceOut')
			// 							elem.addEventListener('animationend', () => {
			// 							elem.remove()
			// 						})
			// 					}
			// 				})

			// 				connectedUsers.forEach((user, id) => {

			// 					const existingChip = onlineUsersBox.querySelector(`span[data-user='${id}']`)
			// 					if (!existingChip) {

			// 						const spanContainer = document.createElement('span')
			// 						spanContainer.classList.add('mdl-chip', 'animate__animated', 'animate__bounceIn')
			// 						spanContainer.setAttribute('data-user', id)

			// 						if ('avatar' in user && user.avatar !== null) {
			// 							spanContainer.classList.add('mdl-chip--contact')

			// 							const img = document.createElement('img')
			// 							img.classList.add('mdl-chip__contact')
			// 							img.setAttribute('src', user.avatar)

			// 							spanContainer.appendChild(img)
			// 						}

			// 						const spanText = document.createElement('span')
			// 						spanText.classList.add('mdl-chip__text')
			// 						spanText.innerHTML = `${user.login} [${user.code}]`
			// 						spanContainer.appendChild(spanText)

			// 						onlineUsersBox.appendChild(spanContainer)

			// 					}
			// 				})

			// 				document.querySelector('.mainpage-active-users').classList.add('users-loaded')
			// 			}

			// 			mainSocket.emit('conn-users:get', '', rebuildListener)
			// 			mainSocket.on('conn-users:rebuild-list', rebuildListener)
			// 		}
			// 	}, 2000)
			// })

			// mainSocket.on('logout', () => {
			// 	window.location.href = site_address + '/logout.php'
			// })

			// mainSocket.on('connect_error', () => {
			// 	toastr.error('BĹÄd ĹÄczenia z serwerem. Ponawiam prĂłbÄ...', 5000)
			// })

			// const reconnectionEvents = ['reconnect_error', 'reconnect_failed']
			// reconnectionEvents.forEach(event => {
			// mainSocket.on(event, (ob) => {
			// 	toastr.error('Utracono poĹÄczenie z serwerem.'+ (event === 'reconnect_failed' ? '' : ' Ponawiam prĂłbÄ...'), 5000)
			// })
			// })

			// const connectionLostEvents = ['error', 'disconnect']
			// connectionLostEvents.forEach(event => {
			// mainSocket.on(event, () => {
			// 	toastr.error('Utracono poĹÄczenie z serwerem. Ponawiam prĂłbÄ...', 5000)
			// })
			// })

			// mainSocket.on('reconnect', () => {
			// 	toastr.error('PrzywrĂłcono poĹÄczenie z serwerem đ', 5000)
			// })
		</script>
	</body>
</html>
