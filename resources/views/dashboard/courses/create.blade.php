@extends('dashboard.master')

@section('title', 'Escritorio: Crear curso')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear curso</h1>
			<form action="{{ url('/escritorio/cursos/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="h1">Título</label>
					<input type="text" name="h1" id="h1" placeholder="Título del curso" autocomplete="off" autofocus value="{{ old('h1') }}">
					@if ($errors->has('h1'))
						<div>{{ $errors->first('h1')}}</div>
					@endif
				</div>
				<div>
					<label for="slug">URL</label>
					<input type="text" name="slug" id="slug" placeholder="URL del artículo" autocomplete="off" value="{{ old('slug') }}">
					@if ($errors->has('slug'))
						<div>{{ $errors->first('slug')}}</div>
					@endif
				</div>
				<div>
					<label for="sub">Subtítulo</label>
					<input type="text" name="sub" id="sub" placeholder="Título del curso" autocomplete="off" value="{{ old('sub') }}">
					@if ($errors->has('sub'))
						<div>{{ $errors->first('sub')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Imagen</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
					@endif
				</div>
				<div>
					<label for="content">Contenido</label>
					<textarea name="content" id="content">{{ old('content') }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<label for="list">Lista de contenido certificado</label>
					<textarea name="list" id="list">{{ old('list') }}</textarea>
					@if ($errors->has('list'))
						<div>{{ $errors->first('list')}}</div>
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

@section('js')
	<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script src="{{ asset('assets/js/slug.js') }}"></script>
	<script>
		CKEDITOR.replace( 'content' );

		CKEDITOR.replace( 'list' );

		$().ready(function () {
			$('#slug').slugify('#h1');
		
			var pigLatin = function(str) {
				return str.replace(/(\w*)([aeiou]\w*)/g, "$2$1ay");
			}
		
			$('#pig_latin').slugify('#h1', {
					slugFunc: function(str, originalFunc) { return pigLatin(originalFunc(str)); } 
				}
			);
		}); 
	</script>
@endsection