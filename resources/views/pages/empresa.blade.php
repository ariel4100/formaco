@extends('pages.templates.cuerpo')
@section('titulo', 'Empresa')
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/empresa.css') }}">
	<link rel="stylesheet" href="{{ asset('css/page/slider.css') }}">
@endsection

@section('paginas')
	<div class="container-fluid">
		<div id="carousel" class="carousel carousel-slider center" data-indicators="true" style="position: relative;">
		    @foreach($sliders as $slider)
			    <div class="carousel-item white-text" href="" style="position: absolute;">
			      <img src="{{asset($slider->imagen)}}" alt="">
			      @if($slider->titulo)
			      	<div class="cont-titulos" style="    left: 31%;     top: 34%;">
				    	<div>
				    		<div class="titulo-slider " style="margin-bottom: 0;">{!!$slider->titulo !!}</div>
							<div class="subtitulo-slider ">{!!$slider->subtitulo !!}</div>
				    		
				    	</div>
				    	
				    </div>
				   @endif
			    </div>
			    <div class="expand"><a href="#empresa"><i class="material-icons hide-on-small-only" style="color:white;">expand_more</i></a></div>
		    @endforeach
		</div>

		{{-- <div class="cabecera">
			<img class="responsive-img" src="{{asset($nuestra->imagen_cabecera)}}" width="100%;" alt="">
			<div class="titulo-cabecera">{!!$nuestra->{"titulo_".$idioma} !!}</div>
			<hr>
		</div>
		<div class="row" style="margin: 5% 7%;">
			<div class="col s12 m6 titulo-empresa">
				<p class="barra">{{ Lang::get('general.nuestra') }}</p>
				<div class="contenido-empr">
					{!!$nuestra->{"contenido_".$idioma} !!}
				</div>
			</div>
			<div class="col s12 m6">
				<img class="responsive-img" src="{{asset($nuestra->imagen)}}" alt="">
			</div>
		</div> --}}

	</div>
	<div class="container-fluid" style="margin: 5% 10%;">
			<section class="row" style="margin-bottom: 4%; ">
				<div class="col s12 m4">
						<img class="responsive-img" src="{{asset($nuestra->imagen)}}" width="100%;" alt="">
				</div>
				<div class="col s12 m8">
					<div class="subtitulo">{!! $nuestra->subtitulo !!}</div>
					<div class="titulo">{!! $nuestra->titulo !!}</div>
					<hr>
					<div class="contenido">
						{!! $nuestra->contenido !!}
					</div>
				</div>

			</section>
	</div>
	<script>
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
        });

	</script>
@endsection
