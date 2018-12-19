@extends('web.master')

@section('title')
	{{ $course->h1 }} | Cursos | Personal Academy
@endsection

@section('content')
	<!-- Clase -->
	<div id="clases">
		<header data-parallax="scroll" data-image-src="{{ asset('assets/images/cursos/' . $course->img) }}">
			<h1>{{ $course->h1 }}</h1>
			<sub>{{ $course->sub }}.</sub>
		</header>
		<section>
			<h2>Conoce nuestros
			objetivos</h2>
			<div>
				{!! $course->content !!}
			</div>
		</section>
		<div data-parallax="scroll" data-image-src="{{ asset('assets/images/productos/bg.jpg') }}">
			<div>
				<h3>Contenido certificado</h3>
				<div>
					{!! $course->list !!}
				</div>
			</div>
		</div>
	</div>
@endsection