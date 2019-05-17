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
	    	<div class="col s12 m3 sector" style="padding-top: 18px;">
	    		<a href="{{route('sectores', $sector->id)}}" style="color: #A6A6A6;">
	    			<div  style="text-align: center; height: 70px; ">
		    			<img style="max-height: 65px;" src="{{asset($sector->imagen)}}" alt="">
		    		</div>
		    		<div style="text-align: center;">
		    			{{$sector->nombre}}
		    		</div>
	    		</a>
	    	</div>
	    	
    	@endforeach
    </div>
    @if(!is_null($subsectores))
    <div class="row subsectores">
    	<p class="center" style="color: #04599B; font-weight: 600; margin-bottom: 5%;">Seleccione Subsección</p>
    	
    	@foreach($subsectores as $subsector)
    	<a href="{{route('subsectores', $subsector->id)}}" style="color: #A6A6A6;">
			<div class="col s12 m4 subsector" onclick="ajax($$subsector->id)">
				<div style="text-align: center; ">
	    			<img  style="max-height: 65px;"  src="{{asset($subsector->imagen)}}" alt="">
	    		</div>
	    		<div style="text-align: center;">
	    			{{$subsector->nombre}}
	    		</div>
			</div>
		</a>
    	@endforeach
    </div>
	@endif

    <div class="row" style="padding: 3% 10%">
    	@foreach($productos_selected as $ps)
	    	@foreach($productos as $producto)
				@if($producto->id == $ps->id_producto)
						<div class="col s12 m4" style="margin-bottom: 3%">
							<a href="{{route('galeria',$producto->id)}}">
								<div class="cont-producto">
									<div class="row cont-sub" style="    border: 1px solid #B0B0B0; margin:0px; position:relative; text-align: center;">
											<img src="{{asset($producto->imagen_destacada)}}"  style="max-height:100%;"  class="responsive-img" alt="">
											<div class="cont-img-pro">
											</div>
									</div>
									<div class="row" style="margin:0px;">
										<div class="fila">
											{{$producto->titulo}}
										</div>
										<div class="parrafo_corto">
										{!!$producto->contenido!!} 
									</div>
									</div>
								</div>
							</a>
						</div>
				@endif
	    	@endforeach
    	@endforeach
    </div>
  </section>
@endsection
<script>
	function ajax($id){
		$.ajax({
			url: "demo_test.txt", 
			success: function(result){
		        // $("#div1").html(result);
		        console.log(result);
		    }
		});
	}
</script>