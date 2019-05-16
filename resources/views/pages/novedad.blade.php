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
    <div class="contenedor centro-novedades   fondodestacados  margenfoot" id="pos"  style="margin:5% 6%;">
      <div class="row margindestacados">
      <div class="col s12 migas">
        <a href="{{route('novedades')}}" >
         Novedades
       </a> | <a href="{{route('buscarnove.show',$categorianove->id)}}">{{$categorianove->nombre }} </a> | {{$novedad->nombre}}
      </div>
       <div class="col s12 col m9 " >
            <div class="col s12 titular_listado_novedades" style="padding-left: 1px; margin-bottom: 2%;">
              <span class="Nombre_novedad fuenteRC">
                {{ strtoupper($categorianove->nombre )}}
              </span>
            </div>
            <div class="col-xs-12 " style="padding-left: 1px;">
              <img style="width: 100%;" src="{{asset($novedad->imagen_maxi)}}" class="img-responsive imgnovedades"  alt="imagen">
            </div>
            
            <div class="col s12 " style="padding-left: 1px;" >
              <p class="novedadesfecha">{{$novedad->fecha}}</p>
              <p class="novedadestitulo fuenteRC">{{$novedad->nombre }}</p>
              <div class="novedadesbreve">{!!$novedad->texto!!}</div>
              
              
            </div>
            @if($novedad->ficha)
            <div class="col s12" style="margin-top: 25px; padding: 0px;">
              <a href="{{$novedad->ficha }}" target="_blank" class=" btn-descarga" download>
              Descargar PDF
              </a>
            </div>
            @endif
      </div>
      <div class="col s12 col m3 buscadorfiltrador">
        <div class="col s12 nopadding" style="padding-bottom:10px; ">
              <form action="{{route('buscarnove.store')}}" class="buscador_noticias" method="POST">
              {{ csrf_field() }}
                  <input placeholder="{{ $buscar_input }}" name="busca" class="buscador2" type="text">
              </form>
        </div>
              <div class="categorias fuenteRC">
                <a href="{{route('novedades')}}"><p>Categorías</p></a>
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

