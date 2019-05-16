@extends('adm.cuerpo')

@section('titulo', 'Editar Descarga')

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
			{!!Form::model($descarga, ['route'=>['descargas_calidad.update',$descarga->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="file-field input-field col s12">
					<div class="btn">
					    <span>Ruta</span>
					    {!! Form::file('ruta') !!}
					</div>
					<div class="file-path-wrapper">
					    {!! Form::text('ruta',$descarga->ruta, ['class'=>'file-path validate', 'required']) !!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', $descarga->nombre , ['class'=>'validate', 'required'])!!}
					</div>

					<div class="input-field col s12">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', $descarga->orden , ['class'=>'validate', 'required'])!!}
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
