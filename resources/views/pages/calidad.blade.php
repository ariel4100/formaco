@extends('pages.templates.cuerpo')

@section('titulo','Calidad')

@section('estilo')

  <link rel="stylesheet" href="{{ asset('css/page/subproducto.css') }}">

@endsection

@section('paginas')

  <section class="container-fluid"  style="margin: 5% 8%;">

    <article class="row" >

      <section class="col s12">

        <div class="subtitulo">

          {{$calidad->subtitulo}}

        </div>

        <div class="titulo">

          {!!$calidad->titulo!!}

        </div>

      </section>

    </article>

    <article class="row">

      <section class="col s12 m6">

        <div class="contenido">

            {!!$calidad->contenido!!}

        </div>

      </section>

      <section class="col s12 m6">

        <div class="row titulo_img" style="padding-right: 15%;">

          {!! $calidad->titulo_img !!}

        </div>

        <div class="row">

          <div>

            <img class="responsive-img" src="{{asset($calidad->imagen)}}" alt="">

          </div>

        </div>

      </section>

    </article>



  <section class="row">

    @foreach($descargas as $descarga)

       <div class="col s12 l6 margen-ca">

           <div class="inline">

             <div class="calidad-des">

               {{$descarga->nombre }}

             </div>

             <div class="calidad-des">

                 <a href="{{asset($descarga->ruta )}}" target="_blank">Ver Certificado</a>

             </div>

           </div>

           <div class="desc inline" style="float: right;">

             <a href="{{asset($descarga->ruta)}}" target="_blank">

               <img class="grayscale" src="{{asset('img/generico/descarga.png')}}">

             </a>

           </div>

       </div>

     @endforeach

   </section>

   </section>

@endsection

