@extends('adm.cuerpo')

@section('titulo', 'Editar Calidad')

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
			{!!Form::model($calidad, ['route'=>['calidades.update',$calidad->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="file-field input-field col s12">
					<div class="btn">
					    <span>Imagen</span>
					    {!! Form::file('imagen') !!}
					</div>
					<div class="file-path-wrapper">
					    {!! Form::text('imagen',$calidad->imagen, ['class'=>'file-path validate', 'required']) !!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Titulo:')!!}
						{!!Form::text('titulo', $calidad->titulo , ['class'=>'validate', 'required'])!!}
					</div>

					<div class="input-field col s12">
						{!!Form::label('Subtitulo:')!!}
						{!!Form::text('subtitulo', $calidad->subtitulo , ['class'=>'validate', 'required'])!!}
					</div>

					<div class="input-field col s12">
						{!!Form::label('Titulo para la imagen:')!!}
						{!!Form::text('titulo_img', $calidad->titulo_imagen , ['class'=>'validate', 'required'])!!}
					</div>

					<label class="col s12" for="parrafo">Contenido</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido', $calidad->contenido, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
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
	CKEDITOR.replace('contenido');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
