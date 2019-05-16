@extends('pages.templates.cuerpo')

@section('titulo','Productos')

@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/equipamiento.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/page/preguntas.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/page/subproducto.css')}}">
@endsection
@section('paginas')
<div class="container-fluid" style="margin: 5% 5%">
<article class="row" >
      <section class="col s12">
        <div class="titulo">
          @if($seleccionada->seccion == 'maquinas')
            Máquinas y Herramientas
          @endif
          @if($seleccionada->seccion == 'flejes')
            Flejes
          @endif
          @if($seleccionada->seccion == 'embalaje')
            Artículos de embalaje
          @endif
          @if($seleccionada->seccion == 'sellos')
            Sellos y hebillas
          @endif
        </div><hr>
      </section>
    </article>
		<div class="row">
			<div class="col s12 m3">
				<div class="row">
					<div class="col s12"  style="padding-left: 0px;">
						
					      @if($seleccionada->seccion == 'maquinas')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('maquinas-herramientas')}}">TODOS</a>
                          @endif
                          @if($seleccionada->seccion == 'flejes')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('flejes')}}">TODOS</a>
                          @endif
                          @if($seleccionada->seccion == 'embalaje')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('articulos-embalaje')}}">TODOS</a>
                          @endif
                          @if($seleccionada->seccion == 'sellos')
                            <a style="color: #A6A6A6; font-weight: 500;" href="{{route('sellos-hebillas')}}">TODOS</a>
                          @endif
					</div>
				</div>
				<ul id="nav-mobile" class="side-nav fixed" style="position: relative; box-shadow: none; display: inline;">
	        @foreach($familias as $familia)
	          <ul class="collapsible collapsible-accordion">
	            <li class="bold"><a href="{{route('subproducto',$familia->id)}}" class="hover collapsible-header waves-effect waves-admin <?php if($familia->id == $seleccionada->id){?> active <?php } ?>">{{$familia->nombre }}<i class="material-icons" style="margin: 0px;">expand_more</i></a>
	              <div class="collapsible-body">
	                @foreach($subfamilias as $subfamilia)
	                  @if($subfamilia->id_familia == $familia->id)
	                    <ul>
	                      <li><a class="hover producto <?php if($subfamilia->id == $seleccionada->id){?>active2 <?php } ?>" style="
    height: 40px !important;" href="{{route('galeria',$subfamilia->id)}}">{{$subfamilia->titulo }}</a>
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
			<div class="col s12 m9">
				@foreach ($subfamilias as $subfamilia)
					@if($subfamilia->id_familia == $seleccionada->id)
						<div class="col s12 m4" style="margin-bottom: 3%">
							<a href="{{route('galeria',$subfamilia->id)}}">
								<div class="cont-producto">
									<div class="row cont-sub" style="margin:0px; position:relative; border: 1px solid #B0B0B0;">
											<img src="{{asset($subfamilia->imagen_destacada)}}"  style="max-height:100%;"  class="responsive-img" alt="">
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
					@endif
				@endforeach
			</div>
		</div>
	</div>
@endsection
