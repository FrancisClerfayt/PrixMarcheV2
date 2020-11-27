<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	
	<!-- Styles -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<header class="header_background">
			<div class="row align-items-center justify-content-around py-3">
				<div class="col-2">
					<img src="{{ asset('images/logo_prix_marche_white.svg') }}" alt="">
				</div>
				<div class="wrap">
					<div class="input-group mb-3">
						<input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-secondary" type="button" id="button-addon2">
								<span class="fa fa-search"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</header>
		<nav class="navbar navbar-expand-md navbar-dark shadow-sm nav_background">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href=" {{ route('home') }} ">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=" {{ route('allcategory') }} ">Toutes les catégories</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=" {{ route('delivery') }} ">Livraison et retrait</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=" {{ route('contact') }} ">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=" {{ route('account', ['id' => 1]) }} ">Mon compte</a>
						</li>
						<li class="nav-item">
							{{-- <a class="nav-link" href=" {{ route('pendingcart', []) }} "><img src="" alt=""></a> --}}
						</li>
					</ul>
					
					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->first_name }}
							</a>
							
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
	
	<main class="py-4">
		@yield('content')
	</main>
	
	<footer class="footer_background">
		<div class="row">
			<div class="col p-3">
				<div class="newsletter">
					<p>Inscription à la newsletter</p>
					<div class="wrap">
						<div class="search">
							<input type="text" class="searchTerm">
						</div>
					</div>
					<button class="btn btn-secondary">S'abonner maintanant</button>
				</div>
			</div>
			<div class="col p-3">
				<div class="delivery">
					<img src="img/refresh-cw.png" alt="">
					<p>Retrait au magasin ou sur les marchés</p>
				</div>
			</div>
			<div class="col p-3">
				<div class="payment">
					<img src="img/credit-card.png" alt="">
					<p>Paiement lors du retrait CB à partir de 10€, espèces</p>
				</div>
			</div>
			<div class="col p-3">
				<div class="menu">
					<ul>
						<li><a href="{{ route('delivery') }}">Livraison et retrait</a></li>
						<li><a href="{{ route('question') }}">F.A.Q</a></li>
						<li><a href="{{ route('contact') }}">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row justify-content-end footer_bottom">
			<ul class="d-flex flex-row-reverse align-content-around">
				<li class="mx-2">C.G.U</li>
				<li class="mx-2">Politique de confidentialité</li>
				<li class="mx-2">Conditions de retour</li>
				<li class="mx-2">© 2020, Prix Marché.</li>
			</ul>
		</div>
	</footer>
</body>
</html>
