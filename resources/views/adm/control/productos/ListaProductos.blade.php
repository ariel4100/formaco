@extends('adm.cuerpo')

@section('titulo', 'Editar destacados')

@section('contenido')
<main>
	<div class="container-fluid">
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
	  			@endforeach
	  		</ul>
	  	</div>
		@endif
		@if(session('success'))
		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
			{{ session('success') }}
		</div>
		@endif

		<div class="row">
			<div class="col s12">
				<table class="highlight bordered">
				<thead>
					<td>Imagen</td>
					<td>Texto </td>
					<td>Link</td>
					<td>Orden</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($productos as $producto)
					<tr>
						<td><img class="slider-foto" src="{{ asset($producto->imagen) }}"></td>
						<td>{!!$producto->nombre!!}</td>
						<td>{!!$producto->link!!}</td>
						<td>{!!$producto->orden!!}</td>
						<td class="text-right">
							<a href="{{ route('productos-destacados.edit',$producto->id)}}"><i class="material-icons">create</i></a>
							
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>			
			</div>
		</div>
    </div>
</main>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection