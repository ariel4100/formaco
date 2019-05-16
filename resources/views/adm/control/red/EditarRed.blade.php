@extends('adm.cuerpo')

@section('titulo', 'Editar red social')

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
			{!!Form::model($redes, ['route'=>['redes.update',$redes->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Logo</span>
						    {!! Form::file('logo') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('logo',null, ['class'=>'file-path validate', 'required']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Link:')!!}
						{!!Form::text('link', null , ['class'=>'validate'])!!}
					</div>
					<div class="input-field col s6">
			        	{!! Form::select('ubicacion', ['header' => 'Header', 'footer' => 'Footer'], null, ['class' => 'form-control']) !!}
						<label for="">Ubicacion de la red social</label>
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
