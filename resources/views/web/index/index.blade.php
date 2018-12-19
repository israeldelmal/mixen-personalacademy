@extends('web.master')

@section('meta')
	<meta name ="description" content="{{ $meta->description }}">
	<meta name ="keywords" content="{{ $meta->keywords }}">
@endsection

@section('title', $meta->title)

@section('content')
	<!-- Cabecera -->
	<header id="inicio" data-parallax="scroll" data-image-src="{{ asset('assets/images/cabecera/' . $header->img) }}">
		<div>
			<h1>{{ $header->h1 }}</h1>
			<sub>{{ $header->sub }}</sub>
			<a class="item-menu" href="#productos">Comienza ahora</a>
		</div>
	</header>
	<!-- ¿Quiénes somos? -->
	<section id="quienes-somos">
		<div>
			<div>
				<h1>{{ $about->h1 }}</h1>
				{!! $about->content !!}
			</div>
			<img src="{{ asset('assets/images/quienes-somos/' . $about->img) }}" alt="Imagen | ¿Quiénes somos?">
		</div>
	</section>
	<!-- Productos -->
	<section id="productos" data-parallax="scroll" data-image-src="{{ asset('assets/images/productos/bg.jpg') }}">
		<div>
			<h1>Contamos con talleres
			Presenciales y entrenamientos
			On-Line</h1>
			<ul>
				@if(count($courses) > 0)
					@foreach($courses as $course)
						<li><a href="{{ url('/cursos/' . $course->slug) }}">{{ $course->h1 }}</a></li>
					@endforeach
				@else
					<li><a href="#">Próximamente</a></li>
				@endif
			</ul>
			<img src="{{ asset('assets/images/productos/figura-2.png') }}" alt="Imagen | Productos">
		</div>
		<img src="{{ asset('assets/images/productos/figura-1.svg') }}">
	</section>
	<!-- Servicios -->
	<section id="servicios">
		<div>
			<div>
				<h1>Conoce
				nuestros
				servicios</h1>
				<img src="{{ asset('assets/images/servicios/figura-1.jpg') }}" alt="Imagen | Servicios">
			</div>
			<div>
				@foreach($services as $service)
					<div>
						<img src="{{ asset('assets/images/servicios/' . $service->img) }}" alt="Imagen de {{ $service->h1 }}">
						<div>
							<h4>{{ $service->h1 }}</h4>
							<p>{{ $service->content }}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Descanso #1 -->
	<section id="descanso-1" data-parallax="scroll" data-image-src="{{ asset('assets/images/extras/' . $break->img) }}">
		<div>
			<h1>{{ $break->h1 }}</h1>
		</div>
	</section>
	<!-- Blog -->
	<main id="blog">
		<div>
			<h1>Blog</h1>
			<sub>Mantente informado con nuestras noticias.</sub>
			<div>
				@if(count($articles) > 0)
					@foreach($articles as $article)
						<article>
							<header>
								<img src="{{ asset('assets/images/articulos/' . $article->img) }}" alt="Imagen del artículo: {{ $article->h1 }}">
								<time>{{ $article->created_at->format('d | m | Y') }}</time>
							</header>
							<h1>{{ $article->h1 }}</h1>
							<p>{!! strip_tags(trim(substr($article->content, 0, 160))) !!}...</p>
							<a href="{{ url('/articulos/' . $article->slug) }}">Leer más</a>
						</article>
					@endforeach
				@else
					<span style="display: block; font-size: 2em; color: black; text-transform: uppercase; margin-top: 40px;">Próximamente</span>
				@endif
			</div>
		</div>
	</main>
	<!-- Testimonios -->
	<section id="testimonios">
		@foreach($testimonies as $test)
			<div>
				<figure>
					<img src="{{ asset('assets/images/testimonios/' . $test->img) }}" alt="Fotografái de {{ $test->name }}">
					<figcaption>{{ $test->name }}</figcaption>
				</figure>
				<div>
					<p>"{{ $test->content }}"</p>
				</div>
			</div>
		@endforeach
	</section>
	<!-- FAQ -->
	<section id="faq">
		<div>
			<h1>{{ $faq->h1 }}</h1>
			<div>
				{!! $faq->content !!}
			</div>
		</div>
	</section>
	<!-- Contacto -->
	<section id="contacto" data-parallax="scroll" data-image-src="{{ asset('assets/images/productos/bg.jpg') }}">
		<div>
			<div>
				<h1>Contacto</h1>
				<sub>¿Tienes dudas? ¡Contáctanos!</sub>
				<ul>
					<li>Dirección #12345</li>
					<li>
						<a href="tel:6142589632">T.614 258 9632</a>
					</li>
					<li>
						<a href="mailto:personalacademymx@gmail.com">personalacademymx@gmail.com</a>
					</li>
				</ul>
			</div>
			<div>
				<map name="Mapa Personal Academy">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.5263238102143!2d-106.08200888439586!3d28.67389838240144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea4376f6582f9d%3A0x376f062f07d0a210!2sParque+Tecnol%C3%B3gico+PIT+3!5e0!3m2!1ses-419!2smx!4v1536958024336" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</map>
				<form action="#" method="POST" id="FormContact">
					<input type="text" placeholder="Nombre">
					<input type="tel" placeholder="Teléfono">
					<input type="email" placeholder="Correo electrónico">
					<textarea placeholder="Mensaje"></textarea>
					<button>Enviar</button>
				</form>
			</div>
		</div>
		<img src="{{ asset('assets/images/productos/figura-1.svg') }}">
	</section>
@endsection