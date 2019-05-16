@extends('pages.templates.cuerpo')
@section('titulo', 'Productos')
@section('estilo')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/page/russo-styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/page/preguntas.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/page/subproducto.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<style>
		a.hover.producto {
			color: #595959 !important;
		}
		a. {
			color: #000 !important;
		}
		a.hover.collapsible-header.waves-effect.waves-admin {
			color: #595959;
		}
	</style>
@endsection

@section('paginas')
  <section class="container-fluid" style="margin: 5% 5%">
		<article class="row" >
      <section class="col s12">
        <div class="titulo">
          {{$titulo}}
        </div><hr>
      </section>
    </article>
	<div class="row">
		<div class="col s12 m3">
			<div class="row">
				<div class="col s12" style="padding-left: 0px;">
			
					@if($titulo == 'maquinas')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('maquinas-herramientas')}}">TODOS</a>
                          @endif
                          @if($titulo == 'flejes')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('flejes')}}">TODOS</a>
                          @endif
                          @if($titulo == 'embalaje')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('articulos-embalaje')}}">TODOS</a>
                          @endif
                          @if($titulo == 'sellos')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('sellos-hebillas')}}">TODOS</a>
                          @endif
				</div>
			</div>
				<ul id="nav-mobile" class="side-nav fixed" style="position: relative; box-shadow: none; display: inline;">
	     @foreach($familias as $familia)
	          <ul class="collapsible collapsible-accordion">
	            <li class="bold"><a href="{{route('subproducto',$familia->id)}}" class="hover collapsible-header waves-effect waves-admin"><i class="material-icons" style="margin: 0px;">expand_more</i>{{$familia->nombre }}</a>
	              <div class="collapsible-body">
	                @foreach($subfamilias as $subfamilia)
	                  @if($subfamilia->id_familia == $familia->id)
	                    <ul>
	                      <li><a class="hover producto" href="{{route('galeria',$subfamilia->id)}}">{{$subfamilia->titulo }}</a>
	                       </li>
	                    </ul>
	                  @endif
	                @endforeach
	              </div>
	            </li>
	          </ul>
	        @endforeach
      </ul>
			</div>
			<div class="col s12 m8">
				<div class="row">
					@foreach ($subfamilias  as $producto)
					<div class="col s12 m4" style="margin-bottom: 3%">
						<a href="{{route('subproducto',$producto->id_familia)}}">
							<div class="cont-producto">
								<div class="row" style="  border: 1px solid #B0B0B0; margin:0px; position:relative; height: 260px; display: flex; justify-content: center;align-content: center;">
										<img src="{{asset($producto->imagen_destacada)}}"  style="max-height:100%;"  class="responsive-img" alt="">
										<div class="cont-img-pro">

										</div>
								</div>
								<div class="row" style="margin:0px;">
									<div class="fila">
										{{$producto->titulo}}
									</div>
									<div class="parrafo_corto" style="height:80px;
    overflow:hidden;
    text-overflow: ellipsis;">
										{!!$producto->contenido!!} 
									</div>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		
	</div>
  </section>
@endsection
