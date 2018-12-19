<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dashboard/style.css') }}">
</head>
<body>
	{{-- Navegación --}}
	<nav>
		<div>
			<a href="{{ url('/escritorio/usuario/' . Auth::user()->id) }}">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a>
			<a href="{{ url('/escritorio') }}"><i class="fas fa-tachometer-alt"></i></a>
			<a href="{{ url('/') }}" target="_blank"><i class="fas fa-home"></i></a>
			<a href="{{ url('/autenticacion/cerrar-sesion') }}"><i class="fas fa-power-off"></i></a>
		</div>
	</nav>
	{{-- Menú --}}
	<aside>
		<div>
			<h1>Escritorio</h1>
		</div>
		<ul>
			<li><span>Generales</span></li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/usuarios')) class="active" @endif
					@if(Route::is('escritorio/editar')) class="active" @endif
				><span class="icon-Users"></span> Usuarios</a>
				<ul
					@if(Route::is('escritorio/usuarios')) class="show" @endif
					@if(Route::is('escritorio/editar')) class="show" @endif
				>
					<li><a
						@if(Route::is('escritorio/usuarios')) class="active" @endif
						@if(Route::is('escritorio/editar')) class="active" @endif
						href="{{ url('/escritorio/usuarios') }}"><span class="icon-List"></span> Lista</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/metadatos')) class="active" @endif
					@if(Route::is('escritorio/metadatos/editar')) class="active" @endif
				><span class="icon-Users"></span> Metadatos</a>
				<ul
					@if(Route::is('escritorio/metadatos')) class="show" @endif
					@if(Route::is('escritorio/metadatos/editar')) class="show" @endif
				>
					<li><a
						@if(Route::is('escritorio/metadatos')) class="active" @endif
						@if(Route::is('escritorio/metadatos/editar')) class="active" @endif
						href="{{ url('/escritorio/metadatos') }}"><span class="icon-List"></span> Lista</a></li>
				</ul>
			</li>
		</ul>
		<ul>
			<li><span>Web</span></li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/cabecera')) class="active" @endif
					@if(Route::is('escritorio/nosotros')) class="active" @endif
					@if(Route::is('escritorio/descanso')) class="active" @endif
					@if(Route::is('escritorio/faq')) class="active" @endif
				><span class="icon-Home"></span> Inicio</a>
				<ul
					@if(Route::is('escritorio/cabecera')) class="show" @endif
					@if(Route::is('escritorio/nosotros')) class="show" @endif
					@if(Route::is('escritorio/descanso')) class="show" @endif
					@if(Route::is('escritorio/faq')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/cabecera')) class="active" @endif href="{{ url('/escritorio/cabecera') }}"><span class="icon-Edit"></span> Cabecera</a></li>
					<li><a @if(Route::is('escritorio/nosotros')) class="active" @endif href="{{ url('/escritorio/nosotros') }}"><span class="icon-Edit"></span> Nosotros</a></li>
					<li><a @if(Route::is('escritorio/descanso')) class="active" @endif href="{{ url('/escritorio/descanso') }}"><span class="icon-Edit"></span> Descanso</a></li>
					<li><a @if(Route::is('escritorio/faq')) class="active" @endif href="{{ url('/escritorio/faq') }}"><span class="icon-Edit"></span> FAQ</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/cursos')) class="active" @endif
					@if(Route::is('escritorio/cursos/crear')) class="active" @endif
					@if(Route::is('escritorio/cursos/editar')) class="active" @endif
				><span class="icon-Articles"></span> Cursos</a>
				<ul
					@if(Route::is('escritorio/cursos')) class="show" @endif
					@if(Route::is('escritorio/cursos/crear')) class="show" @endif
					@if(Route::is('escritorio/cursos/editar')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/cursos')) class="active" @endif href="{{ url('/escritorio/cursos') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/cursos/crear')) class="active" @endif href="{{ url('/escritorio/cursos/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/servicios')) class="active" @endif
					@if(Route::is('escritorio/servicios/crear')) class="active" @endif
					@if(Route::is('escritorio/servicios/servicios')) class="active" @endif
				><span class="icon-Services"></span> Servicios</a>
				<ul
					@if(Route::is('escritorio/servicios')) class="show" @endif
					@if(Route::is('escritorio/servicios/crear')) class="show" @endif
					@if(Route::is('escritorio/servicios/servicios')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/servicios')) class="active" @endif href="{{ url('/escritorio/servicios') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/servicios/crear')) class="active" @endif href="{{ url('/escritorio/servicios/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/articulos')) class="active" @endif
					@if(Route::is('escritorio/articulos/crear')) class="active" @endif
					@if(Route::is('escritorio/articulos/editar')) class="active" @endif
				><span class="icon-Articles"></span> Artículos</a>
				<ul
					@if(Route::is('escritorio/articulos')) class="show" @endif
					@if(Route::is('escritorio/articulos/crear')) class="show" @endif
					@if(Route::is('escritorio/articulos/editar')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/articulos')) class="active" @endif href="{{ url('/escritorio/articulos') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/articulos/crear')) class="active" @endif href="{{ url('/escritorio/articulos/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/testimonios')) class="active" @endif
					@if(Route::is('escritorio/testimonios/crear')) class="active" @endif
					@if(Route::is('escritorio/testimonios/servicios')) class="active" @endif
				><span class="icon-Packages"></span> Testimonios</a>
				<ul
					@if(Route::is('escritorio/testimonios')) class="show" @endif
					@if(Route::is('escritorio/testimonios/crear')) class="show" @endif
					@if(Route::is('escritorio/testimonios/servicios')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/testimonios')) class="active" @endif href="{{ url('/escritorio/testimonios') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/testimonios/crear')) class="active" @endif href="{{ url('/escritorio/testimonios/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	{{-- Contenido --}}
	<section>
		@yield('content')
	</section>
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	@yield('js')
</body>
</html>