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
			{!!Form::model($descarga, ['route'=>['descargas.update',$descarga->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="file-field input-field col s12">
					<div class="btn">
					    <span>Ruta</span>
					    {!! Form::file('ruta') !!}
					</div>
					<div class="file-path-wrapper">
					    {!! Form::text('ruta',$descarga->ruta, ['class'=>'file-path validate', 'required']) !!}
					</div>
				</div>
				<div class="file-field input-field col s12">
					<div class="btn">
					    <span>Imagen</span>
					    {!! Form::file('imagen') !!}
					</div>
					<div class="file-path-wrapper">
					    {!! Form::text('ruta',$descarga->imagen, ['class'=>'file-path validate', 'required']) !!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::textarea('nombre', $descarga->nombre, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
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
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('nombre');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
