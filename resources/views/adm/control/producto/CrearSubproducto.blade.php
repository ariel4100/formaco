@extends('adm.cuerpo')



@section('titulo', 'Editar producto')



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

			{!!Form::open(['route'=>['subproducto.store'], 'method'=>'POST', 'files' => true])!!}

       {{ csrf_field() }}

      <div class="row">

        <div class="form-group col-xs-12 pad-panel">

          {!!Form::label('Familia:')!!}

          {!! Form::select('id_familia', $familias, null, ['class' => 'form-control']) !!}

        </div>

      </div>

			<div class="file-field input-field col s12">

				<div class="btn">

						<span>Imagen</span>

						{!! Form::file('imagen_destacada') !!}

				</div>

				<div class="file-path-wrapper">

						{!! Form::text('imagen_destacada',null, ['class'=>'file-path validate', 'required']) !!}

				</div>

        </div>

        <div class="row">

          <div class="input-field col s6">

            {!!Form::label('Nombre:')!!}

            {!!Form::text('titulo', null , ['class'=>'validate', 'required'])!!}

          </div>

          <div class="input-field col s6">

            {!!Form::label('Orden:')!!}

            {!!Form::text('orden', null , ['class'=>'validate', 'required'])!!}

          </div>

          <div class="input-field col s12">

			  <p class="">Ingresar la siguiente parte de la ruta: https://www.youtube.com/watch?v=<b>dQw4w9WgXcQ</b></p>

            {!!Form::text('link', null , ['class'=>'validate'])!!}

          </div>

        </div>

        <div class="row">

          <label class="col s12" for="parrafo">Contenido</label>

          <div class="input-field col s12">

            {!!Form::textarea('contenido', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}

          </div>

        </div>

        <div class="file-field input-field col s12">

	        <div class="btn">

				<span>Archivo para descarga</span>

				{!! Form::file('descarga') !!}

			</div>

			<div class="file-path-wrapper">

				{!! Form::text('descarga',null, ['class'=>'file-path validate']) !!}

			</div>

        </div>
        <div class="row">

	        <div class="form-group col-xs-12 pad-panel">

	          {!!Form::label('Por cual fleje desea que sea buscado: ')!!}

	          {!! Form::select('flejar', $flejes, null, ['class' => 'form-control']) !!}

	        </div>

	      </div>
	      <div class="row">

	        <div class="form-group col-xs-12 pad-panel">

	          {!!Form::label('Por cual sistema de fleje desea que sea buscado: ')!!}

	          {!! Form::select('sistema', $sistema, null, ['class' => 'form-control']) !!}

	        </div>

	      </div>
		<div class="row">

	        <div class="form-group col-xs-12 pad-panel">

	          {!!Form::label('Por cual tipo de fleje desea que sea buscado: ')!!}

	          {!! Form::select('tipo', $tipo, null, ['class' => 'form-control']) !!}

	        </div>

	      </div>
      	<div class="row">

	        <div class="form-group col-xs-12 pad-panel">

	          {!!Form::label('Por qué cantidad de fleje desea que sea buscado? : ')!!}

	          {!! Form::select('cantidad', $cantidad, null, ['class' => 'form-control']) !!}

	        </div>

	      </div>



		<div class="col s12 no-padding">

			{!!Form::submit('Actualizar', ['class'=>'waves-effect waves-light btn right'])!!}

		</div>

		{!!Form::close()!!}



		</div>

	</div>

</main>



<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

<script>

	CKEDITOR.replace('contenido');

  CKEDITOR.replace('tabla');

	CKEDITOR.config.height = '150px';

	CKEDITOR.config.width = '100%';

</script>

@endsection

