@extends('dashboard.master')

@section('title', 'Escritorio: Crear Testimonio')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear Testimonio</h1>
			<form action="{{ url('/escritorio/testimonios/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre del Testimonial</label>
					<input type="text" name="name" id="name" placeholder="Título del Testimonio" autocomplete="off" autofocus value="{{ old('name') }}">
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
					<textarea name="content" id="content" placeholder="Contenido del Testimonio" rows="3">{{ old('content') }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
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