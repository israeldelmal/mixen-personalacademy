@extends('dashboard.master')

@section('title', 'Escritorio: Crear Servicio')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear Servicio</h1>
			<form action="{{ url('/escritorio/servicios/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="h1">Título</label>
					<input type="text" name="h1" id="h1" placeholder="Título del servicio" autocomplete="off" autofocus value="{{ old('h1') }}">
					@if ($errors->has('h1'))
						<div>{{ $errors->first('h1')}}</div>
					@endif
				</div>
				<div>
					<label for="content">Contenido</label>
					<textarea name="content" id="content" rows="5" placeholder="Contenido del servicio">{{ old('content') }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Imagen del Servicio</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Crear</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection