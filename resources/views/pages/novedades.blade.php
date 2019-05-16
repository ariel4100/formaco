@extends('pages.templates.cuerpo')

@section('titulo','Novedades')

@section('estilo')

	<link rel="stylesheet" href="{{ asset('css/page/servicio.css') }}">

	<link rel="stylesheet" href="{{ asset('css/page/slider.css') }}">



@endsection

@section('paginas')
<?php

		$inicio = 'Inicio';

		$noticias = 'Actualidad';

			$buscar_input = 'Buscar';

?>

	<div class="contenedor centro-novedades   fondodestacados margen-top margenfoot" id="pos" style="margin:5% 6%;">
		<div class="row margindestacados">
		<div class="col s12 titulonove">
				Últimas noticias<hr>
		</div>
		<div class="col s12 col m9 " >
		@foreach($categorias as $categoria)
			@foreach($novedades as $novedad)
				@if($novedad->id_categoria == $categoria->id)
				<a href="{{route('novedad',$novedad->id)}}" style="text-decoration: none">
				<div class="col s12" style="margin-bottom: 6%;">
				<div class="row">
					<div class="col s12 titular_listado_novedades" style="padding-left: 1px; margin-bottom: 2%;">
						<span class="Nombre_novedad fuenteRC">
							{{ strtoupper($categoria->nombre )}}
						</span>
					</div>
					<div class="col s12 m6 " style="padding-left: 1px;">
						<img style="width: 100%;" src="{{asset($novedad->imagen)}}" class="img-responsive imgnovedades"  alt="imagen">
					</div>
					
					<div class="col s12 m6 " style="padding-left: 1px;" >
						<p class="novedadesfecha">{{$novedad->fecha}}</p>
						<p class="novedadestitulo fuenteRC">{{$novedad->nombre }}</p>
						<div class="novedadesbreve">{!!$novedad->texto_breve !!}</div>
						<a href="{{route('novedad',$novedad->id)}}" class=" btn-nove">
							Leer más»
						</a>
					</div>
					</div>
				</div>
				</a>
				@endif
			@endforeach
		@endforeach
		</div>   <!-- ******************************************************* Columna1 -->
		<div class="col s12 col m3 buscadorfiltrador">
			<div class="col s12 nopadding" style="padding-bottom:10px; ">
						<form action="{{route('buscarnove.store')}}"  method="POST">
						{{ csrf_field() }}
								<input type="text" placeholder="{{ $buscar_input }}" name="busca" class="buscador2" >
						</form>
			</div>
						<div class=" categorias fuenteRC">

							<a href="{{route('novedades')}}"><p>
									Categorias
							</p></a>
						</div>
						<div class="col s12" style="padding-left: 1px;">
						@foreach($categorias2 as $categoria2)
								<a href="{{route('buscarnove.show',$categoria2->id)}}" style="text-decoration:none !important;"><li class="tagcategoria fuenteRC">»{{$categoria2->nombre }}</li></a>
						 @endforeach

						</div>
		</div>

	</div>

	</div>
@endsection
