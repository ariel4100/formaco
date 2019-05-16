@extends('adm.cuerpo')

@section('titulo', 'Editar Familia')

@section('contenido')

<main>
	<div class="container">
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
	  			@endforeach
	  		</ul>
	  	</div>
		@endif
		@if(session('success'))
		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
			{{ session('success') }}
		</div>
		@endif

		<div class="row">
			<div class="col s12">
			{!!Form::model($producto, ['route'=>['producto.update',$producto->id], 'method'=>'PUT', 'files' => true])!!}
			<div class="file-field input-field col s12">
				
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', $producto->nombre , ['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', $producto->orden , ['class'=>'validate', 'required'])!!}
					</div>
    				<div class="input-field col s6">
            		  <select name="seccion" id="seccion" required>
            		  	
            		  		@if('maquinas' == $producto->seccion)
            					<option value="maquinas">Maquinas</option>
								<option value="flejes">Flejes</option>
						        <option value="embalaje">Embalaje</option>
								<option value="sellos">Sellos</option>
            				@endif
            		  	    @if('flejes' == $producto->seccion)
            					
								<option value="flejes">Flejes</option>
								<option value="maquinas">Maquinas</option>
						        <option value="embalaje">Embalaje</option>
								<option value="sellos">Sellos</option>
            				@endif
            				@if('embalaje' == $producto->seccion)
            					<option value="">Embalaje</option>
								<option value="flejes">Flejes</option>
								<option value="maquinas">Maquinas</option>
						        
								<option value="sellos">Sellos</option>
            				@endif
            				@if('sellos' == $producto->seccion)
            				    <option value="sellos">Sellos</option>
            					<option value="">Embalaje</option>
								<option value="flejes">Flejes</option>
								<option value="maquinas">Maquinas</option>
						        
								
            				@endif
            		  </select>
            		  <label>A qué sección debe permanecer?</label>
                    </div>
				<div class="col s12 no-padding">
					{!!Form::submit('Actualizar', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!}
		</div>
		</div>
	</div>
</main>
@endsection
