@extends('dashboard.master')

@section('title', 'Escritorio: Nosotros')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Nosotros</h1>
			<form action="{{ url('/escritorio/nosotros/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="h1">Título</label>
					<textarea name="h1" id="h1" placeholder="Título de Nosotros" rows="3">{{ $about->h1 }}</textarea>
					@if ($errors->has('h1'))
						<div>{{ $errors->first('h1')}}</div>
					@endif
				</div>
				<div>
					<label for="content">Contenido</label>
					<textarea name="content" id="content" placeholder="Contenido de Nosotros">{{ $about->content }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
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

@section('js')
	<!-- JavaScript -->
	<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'content' );
	</script>
@endsection