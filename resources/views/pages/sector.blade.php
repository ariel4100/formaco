@extends('pages.templates.cuerpo')
@section('titulo', 'Sectores')
@section('estilo')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/page/russo-styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/page/preguntas.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/page/subproducto.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endsection

@section('paginas')
  <section class="container-fluid" style="margin: 5% 5%">
	<article class="row" >
      <section class="col s12">
        <div class="titulo">
          Soluciones por Sector
        </div><hr>
      </section>
    </article>
    <div class="row">
    	<div class="col s12">
    		<p>
	    		Haga click en los distintos grupos y sectores para conocer el listado de productos especializado. 
	    	</p>
    	</div>
    </div>
    <div class="row" style="padding: 0px 10%">
    	@foreach($sectores as $sector)
	    	<div class="col s12 m3 sector" style="padding-top: 18px; max-height: 111px;">
	    		<a href="{{route('sectores', $sector->id)}}" style="color: #A6A6A6;">
	    			<div style="text-align: center;height: 70px;">
		    			<img style="max-height: 65px;" src="{{asset($sector->imagen)}}" alt="">
		    		</div>
		    		<div style="text-align: center;">
		    			{{$sector->nombre}}
		    		</div>
	    		</a>
	    	</div>
	    	
    	@endforeach
    </div>
    <div class="row subsectores">
    	<p class="center" style="color: #04599B; font-weight: 600; margin-bottom: 5%;">Seleccione Subsección</p>
    	@foreach($subsectores as $subsector)
	    	<a href="{{route('subsectores', $subsector->id)}}" style="color: #A6A6A6;">
	    		<div class="col s12 m4 subsector" onclick="ajax($$subsector->id)">
					<div style="text-align: center;">
		    			<img  style="max-height: 65px;"  src="{{asset($subsector->imagen)}}" alt="">
		    		</div>
		    		<div style="text-align: center;">
		    			{{$subsector->nombre}}
		    		</div>
				</div>
	    	</a>
			
    	@endforeach
    </div>
  </section>
@endsection