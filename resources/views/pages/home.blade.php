@extends('pages.templates.cuerpo')
@section('titulo', 'FORMACO')
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/slider.css') }}">
	<link rel="stylesheet" href="{{ asset('css/page/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/page/preguntas.css')}}">
	<style>
		video#backgroundvid {
			/*position: fixed; right: 0; bottom: 0;
			min-width: 100%; min-height: 100%;*/
			width: 100%;
			height: auto;
			z-index: -100;
			background-size: cover;
		}
	</style>
@endsection

@section('paginas')
	<div class="container-fluid">
		{{--<div id="carousel" class="carousel carousel-slider center" data-indicators="true" style="position: relative;">--}}
			{{--<div class="carousel-item white-text" href="" style="position: absolute;">--}}
				{{--<video autoplay loop muted poster="placeholder.jpg" id="backgroundvid">--}}
					{{--<source src="{{ asset('video/formacovideo.mp4') }}" type="video/mp4">--}}
					{{--<p>Fallback content to cover incompatibility issues</p>--}}
				{{--</video>--}}
			{{--</div>--}}
		    {{--@foreach($sliders as $slider)--}}
			    {{--<div class="carousel-item white-text" href="" style="position: absolute;">--}}
			      {{--<img src="{{asset($slider->imagen)}}" alt="">--}}
			      {{--@if($slider->titulo)--}}
			      	{{--<div class="cont-titulos">--}}
				    	{{--<div>--}}
				    		{{--<div class="titulo-slider ">{!!$slider->titulo !!}</div>--}}
							{{--<div class="subtitulo-slider ">{!!$slider->subtitulo !!}</div>--}}
				    		{{--<div style="text-align: center; margin-bottom: 7%;">--}}
								{{--<a class="waves-effect waves-light btn" href="{{route('buscador-productos')}}">Buscador</a>--}}
					    	{{--</div>--}}
				    	{{--</div>--}}

				    {{--</div>--}}
				   {{--@endif--}}
			    {{--</div>--}}
			    {{--<div class="expand"><a href="#empresa"><i class="material-icons hide-on-small-only" style="color:white;">expand_more</i></a></div>--}}
		    {{--@endforeach--}}
		{{--</div>--}}
		<div class="row">

				<video autoplay loop muted poster="placeholder.jpg" id="backgroundvid">
					<source src="{{ asset('video/formacovideo.mp4') }}" type="video/mp4">
					<p>Fallback content to cover incompatibility issues</p>
				</video>

		</div>
		<section class="row" style="margin-top: 40px;">
			<div style="margin: 0px 6%;">
				<div style="margin-bottom: 3%;"><p class="titulo-servicio">Productos Destacados</p><hr></div>
				@foreach($productos as $producto)
					<div class="col s12 m6 l3">
						<div class="row div_hover">
							<a href="{{ route('subproducto',$producto->id) }}">
								<div>
									<div class="row" style="  border: 1px solid #B0B0B0; margin:0px; position:relative; height: 300px; display: flex; justify-content: center;align-content: center;">
											<img src="{{asset($producto->imagen)}}"  style="max-height:100%;"  class="responsive-img" alt="">
											<div class="cont-img-pro">

											</div>
									</div>
									<div class="row" style="margin:0px;">
										<div class="destacado">
											{!!$producto->nombre!!}
										</div>
									</div>
									<div class="row descripcion-producto-destacado">
										{!!$producto->descripcion!!}
									</div>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</section>
		<section class="container-fluid gray row" style="margin-bottom: 0px">
			<div class="col s12">
				<div class="row center">
					<img src="{{asset($home->imagen)}}" alt="">
				</div>
			</div>
			<div class="col s12">
				
				<div class="title-home ">
					{!!$home->titulo!!}
				</div>
				<div class="content-home ">
					{!!$home->contenido!!}
				</div>
				
			</div>
			
		</section>
	</div>
	<script>
		  $(document).ready(function(){
		    $('.parallax').parallax();
		  });
	</script>
	<script>
        var video = document.getElementById("myVideo");
        var btn = document.getElementById("myBtn");

        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }
	</script>
@endsection

