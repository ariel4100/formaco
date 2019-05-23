@extends('pages.templates.cuerpo')

@section('titulo', 'Galeria')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/page/equipamiento.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/page/subproducto.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/page/preguntas.css')}}">
  <script>
      function actualizar(imagen){
        document.getElementById('producto').src = imagen;
      }
  </script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@endsection

@section('paginas')

  <section class="container-fluid" style="margin: 5% 5%;">
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
	            <li class="bold"><a class="hover collapsible-header waves-effect waves-admin <?php if($familia->id == $seleccionada->id_familia){?> active <?php } ?>">{{$familia->nombre }}<i class="material-icons" style="margin: 0px;">expand_more</i></a>
	              <div class="collapsible-body">
	                @foreach($subfamilias as $subfamilia)
	                  @if($subfamilia->id_familia == $familia->id)
	                    <ul>
	                      <li><a class="hover producto <?php if($subfamilia->id == $seleccionada->id){?>active2 <?php } ?>" href="{{route("galeria",$subfamilia->id)}}">{{$subfamilia->titulo }}</a>
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
      <div class="col s12 m4">
        <?php $i=0 ?>
        @foreach($galerias as $galeria)
            @if($i==0)
                <div class="galeria center hide-on-small-only">
                    <img class="responsive-img" id="producto" style="max-height:100%;" src="{{asset($galeria->imagen)}}" alt="">
                </div>
                @php $i++; @endphp
            @endif
        @endforeach
        <div class="row" style="margin-top: 10px;">
            @foreach($galerias as $galeria)
                <div class="col s12 m4" style="padding-left:0px;">
                    <div class="center height-mini">
                        <img class="responsive-img" src="{{asset($galeria->imagen)}}" style="max-height:100%;" alt="" onclick="actualizar('{{asset($galeria->imagen)}}')">
                    </div>
                </div>
            @endforeach
        </div>
      </div>
      <div class="col s12 m5">
          <div class="titulo-pro">{{ $seleccionada->titulo }}</div>
          <div class="contenido-pro">
              {!!$seleccionada->contenido !!}
          </div>
          @if( $seleccionada->descarga  )
          <div class="button-des" style="margin-bottom: 5px;">
              <a href="{{asset($seleccionada->descarga)}}" download="{{ $seleccionada->descarga }}">
                  FICHA TÉCNICA
              </a>
          </div>
          @endif
          <div class="button-des" style="background-color: #25d366">
              <a href="https://wa.me/5491153470592" target="_blank" >
                  <i class="fab fa-whatsapp fa-2x"></i>
              </a>
          </div>
      </div>

    </div>
    @if($seleccionada->link)<div class="row">
      <div class="col s3"></div>
      <div class="col s8">
        <div class="row" style="background-color: #EEEEEE; padding: 15px;">
          <div class="col s6">
            <div style="color: #04599B; font-size: 25px; font-weight: 600; margin-top: 32%;">Para más información, <br>
            mirá el video a continuación</div>
          </div>
          <div class="col s6">
              {{--<iframe width="560" height="315" src=" " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>/--}}
            <iframe width="100%" height="315"
              src="https://www.youtube.com/embed/{{$seleccionada->link}}">
              </iframe>
          </div>
        </div>
      </div>
    </div>
    @endif
  <section class="row">
      <div>
        
        <div class="col s3"></div>
        <div class="col s9" style="padding: 0px;">
          <div><p class="titulo-servicio">Productos Relacionados</p></div><hr>
          <div class="row">
            @php($i=0)
            @foreach($productos as $producto)
            @if($i < 3)
              <div class="col s12 m6 l4" style="padding-left: 0px;">
                <div class="row div_hover">
                  <a href="{{$producto->link}}">
                    <div class="cont-producto">
                      <div class="row" style="    border: 1px solid #B0B0B0; height: 260px !important; border: 1px solid #B0B0B0; margin:0px; position:relative; height: 300px; display: flex; justify-content: center;align-content: center;">
                          <img src="{{asset($producto->imagen)}}"  style="max-height:100%;"  class="responsive-img" alt="">
                          <div class="cont-img-pro">

                          </div>
                      </div>
                      <div class="row" style="margin:0px;">
                        <div class="fila">
                          {!!$producto->nombre!!}
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            @php($i++)
            @endif
            @endforeach
          </div>
        </div>
        
      </div>
    </section>
  </section>

<script>
  $('table').addClass('striped');
</script>
@endsection
