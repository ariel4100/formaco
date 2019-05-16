@extends('adm.cuerpo')

@section('titulo', 'Crear Familia')

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
			{!!Form::open(['route'=>'producto.store', 'method'=>'POST', 'files' => true])!!}
		
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', null , ['class'=>'validate', 'required'])!!}
					</div>
				</div>
			  <div class="row">
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', null , ['class'=>'validate', 'required'])!!}
					</div>
						<div class="input-field col s6">
						<select id="seccion" name="seccion">
						
								<option value="maquinas">Maquinas</option>
								<option value="flejes">Flejes</option>
						        <option value="embalaje">Embalaje</option>
								<option value="sellos">Sellos</option>
							
						</select>
						<label>A qué sección debe permanecer?</label>
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
