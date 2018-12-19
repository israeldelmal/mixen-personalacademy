@extends('dashboard.master')

@section('title', 'Escritorio: Testimonios')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Testimonios</h1>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Decha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($testimonies) > 0)
						@foreach($testimonies as $testimonie)
							<tr>
								<td>{{ $testimonie->name }}</td>
								<td>{{ $testimonie->user->name }} {{ $testimonie->user->lastname }}</td>
								<td>
									@if($testimonie->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $testimonie->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/testimonios/editar/' . $testimonie->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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