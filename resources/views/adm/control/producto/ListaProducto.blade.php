@extends('adm.cuerpo')

@section('titulo', 'Lista de Familia')

@section('contenido')
<main>
	<div class="container">
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
						<td>Nombre</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($productos as $producto)
						<tr>
							<td>{{$producto->nombre}}</td>
							<td>{!!$producto->orden!!}</td>
							<td class="text-right">
								<a href="{{ route('producto.edit',$producto->id)}}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['producto.destroy', $producto->id], 'method' => 'DELETE'])!!}
									<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
										<i class="material-icons red-text">cancel</i>
									</button>
								{!!Form::close()!!}
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
