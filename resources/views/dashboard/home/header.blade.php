@extends('dashboard.master')

@section('title', 'Escritorio: Cabecera')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Cabecera</h1>
			<form action="{{ url('/escritorio/cabecera/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="h1">Título</label>
					<input type="text" name="h1" id="h1" placeholder="Título de la cabecera" autofocus autocomplete="off" value="{{ $header->h1 }}">
					@if ($errors->has('h1'))
						<div>{{ $errors->first('h1')}}</div>
					@endif
				</div>
				<div>
					<label for="sub">Subtítulo</label>
					<input type="text" name="sub" id="sub" placeholder="Subtítulo de la cabecera" autocomplete="off" value="{{ $header->sub }}">
					@if ($errors->has('sub'))
						<div>{{ $errors->first('sub')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Imagen de Fondo</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection