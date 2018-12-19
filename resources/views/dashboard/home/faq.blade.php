@extends('dashboard.master')

@section('title', 'Escritorio: FAQ')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar FAQ</h1>
			<form action="{{ url('/escritorio/faq/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="h1">Título</label>
					<input type="text" name="h1" id="h1" placeholder="Título del FAQ" value="{{ $faq->h1 }}">
					@if ($errors->has('h1'))
						<div>{{ $errors->first('h1')}}</div>
					@endif
				</div>
				<div>
					<label for="content">Contenido</label>
					<textarea name="content" id="content" placeholder="Contenido del FAQ">{{ $faq->content }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
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