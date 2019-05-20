@extends('adm.cuerpo')

@section('titulo', 'Lista de sectores')
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
						<td>Imagen</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($sectores as $sector)

						@foreach($productos as $producto)
							@if($sector->id == $producto->id_sector)

								<tr>
									<td>{{$producto->nombre}}</td>
									<td ><center><img src="{{asset($producto->imagen)}}" class="responsive-img" style="width:150px;" alt=""></center></td>
									<td>{!!$producto->orden!!}</td>
									<td class="text-right">
										<a href="{{ route('subsectores.edit',$producto->id)}}"><i class="material-icons">create</i></a>
										{!!Form::open(['class'=>'en-linea', 'route'=>['subsectores.destroy', $producto->id], 'method' => 'DELETE'])!!}
											<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
												<i class="material-icons red-text">cancel</i>
											</button>
										{!!Form::close()!!}
										
									</td>
								</tr>
							@endif
						@endforeach
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
    </div>
</main>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection
