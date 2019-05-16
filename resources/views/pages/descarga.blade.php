@extends('pages.templates.cuerpo')

@section('titulo','Descargas')

@section('estilo')

  <link rel="stylesheet" href="{{ asset('css/page/subproducto.css') }}">
  <link rel="stylesheet" href="{{ asset('css/page/slider.css') }}">

@endsection

@section('paginas')
  <section class="container-fluid">
     <div id="carousel" class="carousel carousel-slider center" data-indicators="true"  style="position: relative;">
        @foreach($sliders as $slider)
          <div class="carousel-item white-text" href="" style="position: absolute;">
            <img src="{{asset($slider->imagen)}}" alt="">
            @if($slider->titulo)
              <div class="cont-titulos">
              <div>
                <div class="subtitulo-slider ">{!!$slider->subtitulo !!}</div>
                <div class="titulo-slider ">{!!$slider->titulo !!}</div>
              </div>
            </div>
           @endif
          </div>
          <div class="expand"><a href="#empresa"><i class="material-icons hide-on-small-only" style="color:white;">expand_more</i></a></div>
        @endforeach
    </div>
  </section>
  <section class="container-fluid"  style="margin: 5% 8%;">

  <section class="row">
    @foreach($descargas as $descarga)
       <div class="col s12 l4 " >
        <div class="margen-ca">
          <a href="{{ asset($descarga->ruta)}}" target="_blank">
           <div style="position: relative;">
              <img src="{{asset($descarga->imagen)}}" style="width:  100%;">
              <div class="desc" style="position:  absolute;bottom: -20px; left: 80%;">
                 <img src="{{asset('img/generico/descarga2.png')}}">
              </div>
           </div>

           <div>
             <div class="calidad-des descarga_nom">
               {!! $descarga->nombre !!}
             </div>
           </div>
         </a>
        </div>
         
       </div>

     @endforeach

   </section>

   </section>

@endsection

