@extends('adm.cuerpo')
@section('titulo', 'Crear Categoria')
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
					{!! Form::open([ 'route' => 'categorias.store', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true ])!!}
				    {{ csrf_field() }}
						<div class="row">
							<div class="input-field col s6">
								{!!Form::label('Nombre :')!!}
								{!!Form::text('nombre', null , ['class'=>'validate', 'required'])!!}
							</div>

							<div class="input-field col s6">
								{!!Form::label('Orden:')!!}
								{!!Form::text('orden', null , ['class'=>'validate', 'required'])!!}
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
