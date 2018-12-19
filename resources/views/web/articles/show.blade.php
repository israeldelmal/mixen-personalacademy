@extends('web.master')

@section('meta')
	<meta name ="description" content="{{ $article->description }}">
	<meta name ="keywords" content="{{ $article->keywords }}">
@endsection

@section('title')
	{{ $article->title }} | Artículos | Personal Academy
@endsection

@section('content')
	<!-- Artículo -->
	<section id="articulo">
		<div>
			<article>
				<header>
					<img src="{{ asset('assets/images/articulos/' . $article->img) }}">
					<time>{{ $article->created_at->format('d | m | Y') }}</time>
				</header>
				<h1>{{ $article->h1 }}</h1>
				{!! $article->content !!}
			</article>
			<aside>
				@foreach($articles as $art)
					<div style="background-image: url('{{ asset('assets/images/articulos/' . $art->img) }}');">
						<a href="{{ url('/articulos/' . $art->slug) }}">
							<h2>{{ $art->h1 }}</h2>
							<time>{{ $article->created_at->format('d | m | Y') }}</time>
						</a>
					</div>
				@endforeach
			</aside>
		</div>
	</section>
@endsection