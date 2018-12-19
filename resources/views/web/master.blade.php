<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('meta')
	<meta name="author" content="Mixen: Boosting Brands">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/mixen/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
	<!-- Navegación -->
	<nav>
		<div>
			<a @if(Route::is('index')) class="item-menu" href="#inicio" @else href="{{ url('/') }}" @endif>
				<img src="{{ asset('assets/images/logotipo.png') }}" alt="Logotipo de Personal Academy">
			</a>
			<ul>
				<li><a @if(Route::is('index')) class="item-menu" href="#quienes-somos" @else href="{{ url('/') }}#quienes-somos" @endif>¿Quiénes somos?</a></li>
				<li><a @if(Route::is('index')) class="item-menu" href="#productos" @else href="{{ url('/') }}#productos" @endif>Clases</a></li>
				<li><a @if(Route::is('index')) class="item-menu" href="#servicios" @else href="{{ url('/') }}#servicios" @endif>Servicios</a></li>
				<li><a @if(Route::is('index')) class="item-menu" href="#blog" @else href="{{ url('/') }}#blog" @endif>Blog</a></li>
				<li><a @if(Route::is('index')) class="item-menu" href="#testimonios" @else href="{{ url('/') }}#testimonios" @endif>Testimonios</a></li>
				<li><a @if(Route::is('index')) class="item-menu" href="#faq" @else href="{{ url('/') }}#faq" @endif>FAQ</a></li>
			</ul>
		</div>
	</nav>
	@yield('content')
	<!-- Pie -->
	<footer>
		<div>
			<div>
				<img src="{{ asset('assets/images/logotipo.svg') }}" alt="Logotipo Personal Academy">
			</div>
			<div>
				<ul>
					<li>Dirección #12345</li>
					<li>
						<a href="tel:6142589632">T.614 258 9632</a>
					</li>
					<li>
						<a href="mailto:personalacademymx@gmail.com">personalacademymx@gmail.com</a>
					</li>
				</ul>
			</div>
			<div>
				<ul>
					<li><a @if(Route::is('index')) class="item-menu" href="#quienes-somos" @else href="{{ url('/') }}#quienes-somos" @endif>¿Quiénes somos?</a></li>
					<li><a @if(Route::is('index')) class="item-menu" href="#productos" @else href="{{ url('/') }}#productos" @endif>Clases</a></li>
					<li><a @if(Route::is('index')) class="item-menu" href="#servicios" @else href="{{ url('/') }}#servicios" @endif>Servicios</a></li>
					<li><a @if(Route::is('index')) class="item-menu" href="#blog" @else href="{{ url('/') }}#blog" @endif>Blog</a></li>
					<li><a @if(Route::is('index')) class="item-menu" href="#testimonios" @else href="{{ url('/') }}#testimonios" @endif>Testimonios</a></li>
					<li><a @if(Route::is('index')) class="item-menu" href="#faq" @else href="{{ url('/') }}#faq" @endif>FAQ</a></li>
				</ul>
			</div>
			<div>
				<ul>
					<li><a href="https://www.facebook.com/PersonalAcademyMX/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
				</ul>
			</div>
		</div>
		<div>
			Derechos Reservados 2018 &reg; | Made by: <a href="https://mixen.mx" target="_blank"><span class="icon-mixen"></span></a>
		</div>
	</footer>
	{{-- Navegación adaptable --}}
	<div id="nav">
		<div>
			<button>
				<span></span>
				<span></span>
				<span></span>
			</button>
			<a @if(Route::is('index')) class="item-menu" href="#inicio" @else href="{{ url('/') }}" @endif>
				<img src="{{ asset('assets/images/logotipo.png') }}" alt="Logotipo de Personal Academy">
			</a>
		</div>
	</div>
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/parallax.js') }}"></script>
	<script src="{{ asset('assets/js/min.js') }}"></script>
</body>
</html>