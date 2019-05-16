@extends('pages.templates.cuerpo')

@section('titulo','Contacto')

@section('estilo')

	<link rel="stylesheet" href="{{ asset('css/page/contacto.css') }}">

@endsection

@section('paginas')

	<div class="container-fluid">

		<section style="position: relative;">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.1823498666895!2d-58.423141684766385!3d-34.75099908042155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd27ee35a2211%3A0x3835f78132228529!2sBelelli+557%2C+B1832CJK+Lomas+de+Zamora%2C+Buenos+Aires!5e0!3m2!1ses!2sar!4v1541993363643" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
		
		</section>

		<section style="margin: 5% 6%;">

			<div class="row">
				<div class="col s12">
					<div class="contact" style="color: #045A9C; font-size: 26px;">Contacto</div><hr>
					<p class="center">
						Si desea realizarnos una consulta complete el siguiente formulario y nuestro equipo se contactá a la brevedad
					</p>
				</div>
			    <form class="col s12 " method="POST" action="{{route('mail')}}" style="padding: 0px;">
     				{{ csrf_field() }}
				    <div class="row">
				        <div class="input-field col s12 m6">
				          	<input id="nombre" name="nombre" type="text" class="validate" required>
				          	<label for="nombre">Nombre</label>
				        </div>
				        <div class="input-field col s12 m6">
				          	<input id="telefono" name="telefono" type="text" class="validate" required>
				          	<label for="telefono">Teléfono</label>
				        </div>
				    </div>
				    <div class="row">
				      	<div class="input-field col s12 m6">
				          	<input id="empresa" name="empresa" type="text" class="validate" required>
				          	<label for="empresa">Empresa</label>
				        </div>
				        <div class="input-field col s12 m6">
				          	<input id="email" name="email" type="email" class="validate">
				          	<label for="email">Mail</label>
				        </div>
				    </div>
				    <div class="row">
				      	<div class="input-field col s12 m6">
				          	<textarea id="mensaje" name="mensaje" class="materialize-textarea" required></textarea>
				          	<label for="mensaje">Mensaje</label>
				        </div>
				        <div class="col s12 m6">
				    		<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LchtV4UAAAAAM1yPPnY2U3nyddw_L1VwxT2ubEo"></div>
							</div>
				    	</div>
				    </div>
			      	<div class="row">
		    			<div class="col s12" style="padding-left: 0; padding-top: 2%;">
		    				<input type="submit" class="waves-effect waves-light btn" value="Enviar">
		    			</div>
		    		</div>
			    </form>
			  </div>
		</section>
	</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

