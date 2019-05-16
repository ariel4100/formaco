@extends('pages.templates.cuerpo')
@section('titulo','Formaco | Buscador')
@section('estilo')
<link rel="stylesheet" href="{{ asset('css/page/equipamiento.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/page/preguntas.css')}}">
@endsection
@section('paginas')
<div class="container-fluid" style="margin: 5% 10%;">
	<div class="row">

		@if($productos!=null)
			@foreach ($subproductos as $subfamilia)
					<div class="col s12 m4" style="margin-bottom: 3%">
						<a href="{{route('galeria',$subfamilia->id)}}">
							<div class="cont-producto" style="height: 415px;">
								<div class="row cont-sub" style="margin:0px; position:relative; height:350px;">
										<img style="max-height: 350px;" src="{{asset($subfamilia->imagen_destacada)}}" class="responsive-img" alt="">
										<div class="cont-img-pro">
										</div>
								</div>
								<div class="row" style="margin:0px;">
									<div class="fila">
										{{$subfamilia->titulo}}
									</div>
								</div>
							</div>
						</a>
					</div>
			@endforeach
  @endif

	</div>
</div>

@endsection
