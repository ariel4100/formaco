@extends('pages.templates.cuerpo')

@section('titulo','Buscador de productos')

@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/servicio.css') }}">
	<link rel="stylesheet" href="{{ asset('css/page/slider.css') }}">

@section('paginas')
	<div class="contenedor centro-novedades   fondodestacados margen-top margenfoot" id="pos" style="margin:5% 6%;">
		<div class="row margindestacados">
			<div class="col s12 titulonove">
				Buscador de Productos<hr>
			</div>
			<p class="center">Selecciones las opciones para recibir asesoramiento inmediato en línea, es fácil y rápido.</p>
		</div>
		<div class="row" style="padding: 0px 8%; text-align: center;">
			{!!  Form::open(['route' => 'buscar_opciones', 'method' => 'POST', 'id'=>'buscador']) !!}
			<div class="col s12 m3">
				<div class="row">
					<div class="col s12">
						<p style="color:#00589E;">	
							¿Qué producto quiere Flejar?
						</p>
					</div>
					
				</div>
				@foreach($buscadores as $buscador)
					@if($buscador->seccion == "flejar")
						<div class="row">
							<div class="col s12">
							
								<p>
									<input type="radio" id="{{$buscador->id}}" name="flejar" value="{{$buscador->id}}">
									<label for="{{$buscador->id}}">{{$buscador->texto}}</label>
								</p>
								
							</div>
						</div>
					@endif
				@endforeach
			</div>
			<div class="col s12 m3">
				<div class="row">
					<div class="col s12">
						<p style="color:#00589E;">
							 Sistema de flejado
						</p>
					</div>
				</div>
				@foreach($buscadores as $buscador)
					@if($buscador->seccion == "sistema")
						<div class="row">
							<div class="col s12">
							
								<p>
									<input type="radio" id="{{$buscador->id}}" name="sistema" value="{{$buscador->id}}">
									<label for="{{$buscador->id}}">{{$buscador->texto}}</label>
								</p>
								
							</div>
						</div>
					@endif
				@endforeach
			</div>
			<div class="col s12 m3">
				<div class="row">
					<div class="col s12">
						<p style="color:#00589E;">
							 Tipo de Fleje
						</p>
					</div>
				</div>
				@foreach($buscadores as $buscador)
					@if($buscador->seccion == "tipo")
						<div class="row">
							<div class="col s12">
							
								<p>
									<input type="radio" id="{{$buscador->id}}" name="tipo" value="{{$buscador->id}}">
									<label for="{{$buscador->id}}">{{$buscador->texto}}</label>
								</p>
								
							</div>
						</div>
					@endif
				@endforeach
			</div>
			<div class="col s12 m3">
				<div class="row">
					<div class="col s12">
						<p style="color:#00589E;">
							Cantidad cada 24 Hs
						</p>
					</div>
				</div>
				@foreach($buscadores as $buscador)
					@if($buscador->seccion == "cantidad")
						<div class="row">
							<div class="col s12">
							
								<p>
									<input type="radio" id="{{$buscador->id}}" name="cantidad" value="{{$buscador->id}}">
									<label for="{{$buscador->id}}">{{$buscador->texto}}</label>
								</p>
								
							</div>
						</div>
					@endif
				@endforeach
			</div>
			
			
			<div class="col s12" style="margin-top: 50px;">
				<button type ="submit" class="waves-effect waves-light btn" style="text-align: center; margin-bottom: 7%;">
					Buscador
				</button>
	    	</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
