@extends('dashboard.master')

@section('title', 'Escritorio')

@section('content')
	<div id="index">
		<ul>
			<li>
				<span>Artículos</span>
				<span>{{ count($a) }}</span>
			</li>
			<li>
				<span>Cursos</span>
				<span>{{ count($c) }}</span>
			</li>
			<li>
				<span>Testimonios</span>
				<span>{{ count($t) }}</span>
			</li>
			<li>
				<span>Usuarios</span>
				<span>{{ count($u) }}</span>
			</li>
		</ul>
		<div>
			<h1>Últimos artículos</h1>
			<table>
				<thead>
					<tr>
						<td>Artículo</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha</td>
					</tr>
				</thead>
				<tbody>
					@if(count($articles) > 0)
						@foreach($articles as $article)
							<tr>
								<td>{{ $article->title }}</td>
								<td>{{ $article->user->name }} {{ $article->user->lastname }}</td>
								<td>
									@if($article->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $article->created_at->format('d | M | Y') }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div>
			<h1>Cursos activos</h1>
			<table>
				<thead>
					<tr>
						<td>Paquete</td>
						<td>Autor</td>
						<td>Fecha</td>
					</tr>
				</thead>
				<tbody>
					@if(count($courses) > 0)
						@foreach($courses as $course)
							<tr>
								<td>{{ $course->h1 }}</td>
								<td>{{ $course->user->name }} {{ $course->user->lastname }}</td>
								<td>{{ $course->created_at->format('d | M | Y') }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div>
			<h1>Testimonios activos</h1>
			<table>
				<thead>
					<tr>
						<td>Testimonial</td>
						<td>Autor</td>
						<td>Fecha</td>
					</tr>
				</thead>
				<tbody>
					@if(count($tests) > 0)
						@foreach($tests as $test)
							<tr>
								<td>{{ $test->name }}</td>
								<td>{{ $test->user->name }} {{ $test->user->lastname }}</td>
								<td>{{ $test->created_at->format('d | M | Y') }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection