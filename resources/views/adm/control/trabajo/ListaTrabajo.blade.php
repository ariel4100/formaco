@extends('adm.cuerpo')

@section('titulo', 'Lista Trabajos')

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
						<td>Titulo</td>
						<td>Subtitulo</td>
						<td>Contenido</td>
						<td>Imagen</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($trabajos as $trabajo)
								<tr>
									<td>{!!$trabajo->titulo!!}</td>
									<td>{!!$trabajo->subtitulo!!}</td>
									<td>{!!$trabajo->contenido!!}</td>
									<td><img class="responsive-img" src="{{asset($trabajo->imagen)}}" alt=""></td>
									<td>{!!$trabajo->orden!!}</td>
									<td class="text-right">
										<a href="{{ route('trabajo.edit',$trabajo->id)}}"><i class="material-icons">create</i></a>
										{!!Form::open(['class'=>'en-linea', 'route'=>['trabajo.destroy', $trabajo->id], 'method' => 'DELETE'])!!}
											<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
												<i class="material-icons red-text">cancel</i>
											</button>
										{!!Form::close()!!}
										<a class="btn waves-effect " style="background-color: #37C54B; font-size: 15px; font-size: 10px; width: 150px;" href="{{ route('galeria.create_galeria',$trabajo->id)}}">Crear Galeria</a>
										<a class="btn waves-effect " style="background-color: #FFDF30; font-size: 15px; font-size: 10px; width: 150px;" href="{{ route('galeria.index_galeria',$trabajo->id)}}">Galeria</a>
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