@extends('dashboard.master')

@section('title', 'Escritorio: Metadata')

@section('content')
	<div class="forms">
		<div>
			<h1>Metadata</h1>
			<form action="{{ url('/escritorio/metadatos/actualizar') }}" method="POST">
				<div>
					<label for="title">Título</label>
					<input type="text" name="title" id="title" placeholder="Título" autocomplete="off" autofocus value="{{ $meta->title }}">
					@if ($errors->has('title'))
						<div>{{ $errors->first('title')}}</div>
					@endif
				</div>
				<div>
					<label for="description">Descripción (Máximo <span id="resultado"></span>155 caracteres)</label>
					<textarea name="description" id="description" placeholder="Descripción (Máximo 155 caracteres)" maxlength="155" onKeyDown="contador()" onKeyUp="contador()">{{ $meta->description }}</textarea>
					@if ($errors->has('description'))
						<div>{{ $errors->first('description')}}</div>
					@endif
				</div>
				<div>
					<label for="keywords">Palabras clave (Máximo 3 palabras)</label>
					<input type="text" name="keywords" id="keywords" placeholder="Palabra #1, Palabra #2, Palabra #3" autocomplete="off" value="{{ $meta->keywords }}">
					@if ($errors->has('keywords'))
						<div>{{ $errors->first('keywords')}}</div>
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

@section('js')
	<script>
		function contador() {
			let str = $('#description').val().length + '/';
			$('#resultado').html(str);
		}
	</script>
@endsection