@extends('auth.master')

@section('title', 'Crear Cuenta')

@section('forms')
	<form action="{{ url('/autenticacion/crear-cuenta/crear') }}" method="POST">
		<legend style="background-image: url('{{ asset('assets/images/auth/fondo.jpg') }}');">Crear Cuenta</legend>
		<div>
			<label for="name"><i class="fas fa-user"></i></label>
			<input type="text" name="name" id="name" placeholder="Nombre o nombres" autofocus autocomplete="off" value="{{ old('name') }}">
			@if ($errors->has('name'))
				<div>{{ $errors->first('name')}}</div>
			@endif
		</div>
		<div>
			<label for="lastname"><i class="fas fa-user-tag"></i></label>
			<input type="text" name="lastname" id="lastname" placeholder="Apellido o apellidos" autocomplete="off" value="{{ old('lastname') }}">
			@if ($errors->has('lastname'))
				<div>{{ $errors->first('lastname')}}</div>
			@endif
		</div>
		<div>
			<label for="email"><i class="fas fa-envelope"></i></label>
			<input type="email" name="email" id="email" placeholder="Correo Electrónico" autocomplete="off" value="{{ old('email') }}">
			@if ($errors->has('email'))
				<div>{{ $errors->first('email')}}</div>
			@endif
		</div>
		<div>
			<label for="password"><i class="fas fa-key"></i></label>
			<input type="password" name="password" id="password" placeholder="Escribe tu contraseña" autocomplete="off">
			@if ($errors->has('password'))
				<div>{{ $errors->first('password')}}</div>
			@endif
		</div>
		<div>
			<label for="cpassword"><i class="fas fa-key"></i></label>
			<input type="password" name="cpassword" id="cpassword" placeholder="Confirma tu contraseña" autocomplete="off">
			@if ($errors->has('cpassword'))
				<div>{{ $errors->first('cpassword')}}</div>
			@endif
		</div>
		<div>
			<button type="submit">Crear</button>
		</div>
		{{ csrf_field() }}
	</form>
@endsection