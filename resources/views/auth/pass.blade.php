@extends('auth.master')

@section('title', 'Recuperar Contraseña')

@section('forms')
	<form action="#" method="POST" id="FormUserPass">
		<div>
			<label for="pass_email">Correo electrónico para reestablecer tu contraseña</label>
			<input type="email" name="pass_email" id="pass_email" placeholder="ejemplo@ejemplo.com" autocomplete="off" autofocus>
		</div>
		<div>
			<button type="submit">Recuperar</button>
		</div>
		{{ csrf_field() }}
	</form>
@endsection