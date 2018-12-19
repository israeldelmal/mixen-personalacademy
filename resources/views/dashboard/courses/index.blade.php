@extends('dashboard.master')

@section('title', 'Escritorio: Cursos')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Cursos</h1>
			<table>
				<thead>
					<tr>
						<td>Título</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($courses) > 0)
						@foreach($courses as $course)
							<tr>
								<td>{{ $course->h1 }}</td>
								<td>{{ $course->user->name }} {{ $course->user->lastname }}</td>
								<td>
									@if($course->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $course->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/cursos/editar/' . $course->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
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