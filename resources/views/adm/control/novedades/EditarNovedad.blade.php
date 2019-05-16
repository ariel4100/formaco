@extends('adm.cuerpo')

@section('titulo', 'Editar Novedad')

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
			{!!Form::model($novedad,['route'=>['novedades.update',$novedad->id], 'method'=>'PUT', 'files' => true])!!}

				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Titulo :')!!}
						{!!Form::text('nombre', $novedad->nombre , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span> Imagen (Tamaño recomendado 403x223) </span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',$novedad->imagen, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Imagen (novedad)(Tamaño recomendado 847x468)</span>
						    {!! Form::file('imagen_maxi') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen_maxi',$novedad->imagen_maxi, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Archivo PDF</span>
						    {!! Form::file('ficha') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('ficha',$novedad->ficha, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', $novedad->orden , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Fecha:')!!}
						{!!Form::text('fecha', $novedad->fecha , ['class'=>'validate', 'required'])!!}
					</div>
					<label class="col s12" for="parrafo">Texto</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('texto', $novedad->texto, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
						<label class="col s12" for="parrafo">Texto breve</label>
				      	<div class="input-field col s12">
							{!!Form::textarea('texto_breve', $novedad->texto_breve, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
					    </div>
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!}
			</div>
		</div>
	</div>
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('texto');
	CKEDITOR.replace('texto_breve');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
