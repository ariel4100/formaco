@extends('adm.cuerpo')

@section('titulo', 'Crear Slider Home')

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
			{!!Form::open(['route'=>'sliders.store', 'method'=>'POST', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path validate', 'required']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						<select id="seccion" name="seccion">
							@if($seccion == 'home')
								<option value="home">Home</option>
					  		@else
					  			@if($seccion == 'empresa')
									<option value="empresa">Empresa</option>
								@else
									<option value="descargas">Descarga</option>
								@endif
							@endif
						</select>
						<label>Donde debe aparecer el slider?</label>
					</div>
				</div>
				<div class="row">
					
					<div class="col s12 m6">
					    <label for="titulo">Título</label>
					    <div class="input-field">
    				        <textarea id="titulo" name="titulo" class="materialize-textarea" required></textarea>
    
    				    </div>
					</div>
					<div class="col s12 m6">
					    <label for="subtitulo">Subtitulo</label>
    				    <div class="input-field ">
    				        <textarea id="subtitulo" name="subtitulo" class="materialize-textarea" required></textarea>
    
    				    </div>
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
	CKEDITOR.replace('titulo');
	CKEDITOR.replace('subtitulo');
	CKEDITOR.config.height = '200px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
