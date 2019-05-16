@extends('adm.cuerpo')
@section('titulo', 'Lista de buscadores')
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
					<td>Sección</td>
					<td>texto</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($buscadores as $buscador)
					<tr>
						@if($buscador->seccion == 'flejar')
							<td>¿Qué producto quiere flejar?</td>
					  	@endif
						@if($buscador->seccion == 'sistema')
							<td>Sistema de flejado</td>
					  	@endif
					  	@if($buscador->seccion == 'tipo')
							<td>Tipo de fleje</td>
					  	@endif
					  	@if($buscador->seccion == 'cantidad')
							<td>Cantidad cada 24hs</td>
					  	@endif
						<td>{!!$buscador->texto!!}</td>
						<td class="text-right">
							<a href="{{ route('buscadores.edit',$buscador->id)}}"><i class="material-icons">create</i></a>
							{!!Form::open(['class'=>'en-linea', 'route'=>['buscadores.destroy', $buscador->id], 'method' => 'DELETE'])!!}

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

