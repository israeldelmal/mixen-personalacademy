@extends('auth.master')

@section('title', 'Iniciar Sesión')

@section('forms')
	<form action="{{ url('/autenticacion/autenticar') }}" method="POST">
		<legend style="background-image: url('{{ asset('assets/images/auth/fondo.jpg') }}');">Iniciar Sesión</legend>
		<div>
			<label for="email"><i class="fas fa-envelope"></i></label>
			<input type="email" name="email" id="email" placeholder="Correo Electrónico" autocomplete="off" autofocus value="{{ old('email') }}">
			@if ($errors->has('email'))
				<div>{{ $errors->first('email')}}</div>
			@endif
		</div>
		<div>
			<label for="password"><i class="fas fa-key"></i></label>
			<input type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off">
			@if ($errors->has('password'))
				<div>{{ $errors->first('password')}}</div>
			@endif
		</div>
		<div>
			<button type="submit">Iniciar</button>
		</div>
		@if (Session::has('permission'))
			<span>No tienes permisos o tus datos son incorrectos</span>
		@endif
		{{ csrf_field() }}
	</form>
	@if(Session::has('access'))
		<div class="access">
			Tu cuenta fue creada. Espera a que esté activa.
			<a href="#">
				<span></span>
				<span></span>
			</a>
		</div>
	@endif
@endsection

@section('js')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	@if(Session::has('access'))
		<script>
			$('.access > a').on('click', function(event) {
				event.preventDefault();
				$('.access').fadeOut('fast');
			});
		</script>
	@endif
@endsection