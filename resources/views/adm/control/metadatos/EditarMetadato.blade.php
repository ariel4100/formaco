@extends('adm.cuerpo')

@section('titulo', 'Editar metadatos de '. $metadatos->seccion)

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
			{!!Form::model($metadatos, ['route'=>['metadatos.update',$metadatos->id], 'method'=>'PUT', 'files' => true])!!}	
				<div class="row">
					<div class="input-field col s6">
						{!! Form::label('keywords', 'Keywords'  )!!}
						{!! Form::text('keywords', $metadatos->keywords, ['class' => 'validate', 'placeholder' => 'Aquí puede escribir palabras claves sobre esta sección'])!!}
					</div>
					
					<div class="input-field col s6">
						{!!Form::label('description', 'Descripción')!!}
						{!! Form::text('description', $metadatos->description, ['class' => 'validate', 'required'])!!}
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

{{-- @extends('adm.cuerpo')

@section('titulo','Editar metadatos de '. $metadatos->seccion)

@section('contenido')
	<div class="row">
		@if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              @foreach($errors->all() as $error)
            <p>{{$error}}</p>
              @endforeach
            </div>
        @endif
	{!!  Form::open(['route' => 'metadatos.update_metadatos', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true ]) !!}
		{{ csrf_field() }}
		<div class="col-md-8 col-md-offset-2" style="padding: 0px 50px;">
			<section class="col-xs 6">
				@include('flash::message')
				</br>
				<div class="row noseve">
					<section class="col-xs-12 col-md-7">
						<div class="form-group">
							{!!Form::label('id','Id ')!!}
							{!! Form::text('id', $metadatos->id, ['class' => 'form-control', 'placeholder' => 'Nombre de la red social', 'required', 'onfocus="this.blur()"'])!!}
						</div>
					</section>
				</div>
				<div class="row">
					<section class="col-xs-12 col-md-7">
						<div class="form-group">
							{!! Form::label('keywords', 'Keywords'  )!!}
							{!! Form::text('keywords', $metadatos->keywords, ['class' => 'form-control', 'placeholder' => 'Aquí puede escribir palabras claves sobre esta sección', 'required'])!!}
						</div>
					</section>
				</div>
				<div class="row">
					<section class="col-xs-12 col-md-7">
						<div class="form-group">
							{!! Form::label('description', 'Descripción'  )!!}
							{!! Form::text('description', $metadatos->description, ['class' => 'form-control', 'required'])!!}
						</div>
					</section>
				</div>
				<div class="row">
					<section class="col-xs-4">
						<div class="form-group">
							{!! Form::submit('Actualizar',['class' => 'form-control btn btn-success']) !!}
						</div>
					</section>
				</div>
			</section>																			
		</div>
		
	{!! Form::close() !!}
</div>
@endsection --}}