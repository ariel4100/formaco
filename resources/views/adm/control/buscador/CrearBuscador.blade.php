@extends('adm.cuerpo')



@section('titulo', 'Crear Buscador')



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

			{!!Form::open(['route'=>'buscadores.store', 'method'=>'POST', 'files' => true])!!}
				<div class="row">

					<div class="form-group col s12 pad-panel">

					  {!!Form::label('Tipo de opcion que desea crear:')!!}

					  <select id="seccion" name="seccion">
							<option value="flejar">¿Qué producto quiere flejar?</option>
							<option value="sistema">Sistema de flejado</option>
							<option value="tipo">Tipo de fleje</option>
							<option value="cantidad">Cantidad cada 24hs</option>
						</select>
					</div>

				</div>
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Texto:')!!}
						{!!Form::text('texto', null , ['class'=>'validate', 'required'])!!}
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


@endsection

