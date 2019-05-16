@extends('adm.cuerpo')

@section('titulo', 'Editar datos')

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
			{!!Form::model($datos, ['route'=>['datos.update',$datos->id], 'method'=>'PUT', 'files' => true])!!}	
				<div class="row">
					
					<div class="input-field col s6">
						{!!Form::label('descripcion', 'Descripción')!!}
						{!! Form::text('descripcion', $datos->descripcion, ['class' => 'validate', 'required'])!!}
					</div>
					
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Actualizar', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>

@endsection
