@extends('adm.cuerpo')

@section('titulo', 'Crear Galeria')

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
			{!!Form::model($imagen, ['route'=>['galerias.update',$imagen->id], 'method'=>'PUT', 'files' => true])!!}
				{{-- <div class="row">
					<div class="input-field col s6">
						{!!Form::label('Id:')!!}
						{!!Form::text('id_generales', $imagen->id_trabajo , ['class'=>'validate', 'required', 'onfocus="this.blur()"'])!!}
					</div>
				</div> --}}
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', $imagen->orden , ['class'=>'validate', 'required'])!!}
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
