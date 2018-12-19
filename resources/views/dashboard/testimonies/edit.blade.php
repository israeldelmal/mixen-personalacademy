@extends('dashboard.master')

@section('title', 'Escritorio: Editar testimonio')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar testimonio</h1>
			<form action="{{ url('/escritorio/testimonios/actualizar/' . $testimonie->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre del Testimonial</label>
					<input type="text" name="name" id="name" placeholder="Título del Testimonio" autocomplete="off" autofocus value="{{ $testimonie->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Fotografía del Testimonial</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
					@endif
				</div>
				<div>
					<label for="content">Testimonio</label>
					<textarea name="content" id="content" placeholder="Contenido del Testimonio" rows="3">{{ $testimonie->content }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($testimonie->status == false) selected @endif>Inactivo</option>
					</select>
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
	<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'formcontent' );
	</script>
@endsection