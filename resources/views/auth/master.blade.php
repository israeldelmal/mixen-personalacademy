<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>
	{{-- Navegación --}}
	<nav>
		<a @if(Route::is('autenticacion')) class="active" @endif href="{{ url('/autenticacion') }}">Iniciar sesión</a>
		<a @if(Route::is('autenticacion/crear-cuenta')) class="active" @endif href="{{ url('/autenticacion/crear-cuenta') }}">Crear cuenta</a>
		{{-- <a @if(Route::is('autenticacion/recuperar-contrasena')) class="active" @endif href="{{ url('/autenticacion/recuperar-contrasena') }}">Recuperar contraseña</a> --}}
	</nav>
	{{-- Formularios --}}
	<div>@yield('forms')</div>
	@yield('js')
</body>
</html>