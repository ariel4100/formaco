@extends('adm.cuerpo')



@section('titulo', 'Editar producto')



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

			{!!Form::model($producto, ['route'=>['subproducto.update',$producto->id], 'method'=>'PUT', 'files' => true])!!}

      <div class="row">

        <div class="form-group col s6">

          {!!Form::label('Familia:')!!}
		  <select name="id_familia" id="id_familia" required>
		  	@foreach($familias as $familia)
		  		@if($producto->id_familia == $familia->id)
					<option value="{{$familia->id}}">{{$familia->nombre}}</option>
				@endif
		  	@endforeach
		  	@foreach($familias as $familia)
		  		@if($producto->id_familia != $familia->id)
					<option value="{{$familia->id}}">{{$familia->nombre}}</option>
				@endif
		  	@endforeach
		  </select>
        </div>

      </div>

		<div class="file-field input-field col s12">
			<div class="btn">
					<span>Imagen</span>
					{!! Form::file('imagen_destacada') !!}
			</div>
			<div class="file-path-wrapper">
					{!! Form::text('imagen_destacada',$producto->imagen, ['class'=>'file-path validate', 'required']) !!}
			</div>
      	</div>

        <div class="row">
          <label class="col s12" for="parrafo">Contenido</label>
          <div class="input-field col s12">
            {!!Form::textarea('contenido', $producto->contenido, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
          </div>
        </div>

				<div class="row">

					<div class="input-field col s6">

						{!!Form::label('Nombre:')!!}

						{!!Form::text('titulo', $producto->titulo , ['class'=>'validate', 'required'])!!}

					</div>

          <div class="input-field col s6">

            {!!Form::label('Orden:')!!}

            {!!Form::text('orden', $producto->orden , ['class'=>'validate', 'required'])!!}

          </div>
          <div class="input-field col s6">
            {!!Form::label('Link de video:')!!}
            {!!Form::text('link', $producto->link , ['class'=>'validate'])!!}
          </div>

				</div>

        <div class="file-field input-field col s12">

        <div class="btn">

						<span>Archivo para descarga</span>

						{!! Form::file('descarga') !!}

				</div>

				<div class="file-path-wrapper">

						{!! Form::text('descarga',$producto->descarga, ['class'=>'file-path validate']) !!}

				</div>

        </div>
		<div class="row">

	        <div class="form-group col s6">

	          {!!Form::label('Por cual fleje desea que sea buscado:')!!}
			  <select name="flejar" id="flejar" required>
		  		@if($producto->flejar == null)
					<option value="0">Ninguno</option>
				@endif
			  	@foreach($flejes as $familia)
			  		@if($producto->flejar == $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@foreach($flejes as $familia)
			  		@if($producto->flejar != $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@if($producto->flejar != null)
					<option value="0">Ninguno</option>
				@endif
			  </select>
	        </div>

     	 </div>
     	 <div class="row">

	        <div class="form-group col s6">

	          {!!Form::label('Por cuál sistema de fleje desea que sea buscado? : ')!!}
			  <select name="sistema" id="sistema" required>
  		  		@if($producto->sistema == null)
					<option value="0">Ninguno</option>
				@endif
			  	@foreach($sistema as $familia)
			  		@if($producto->sistema == $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@foreach($sistema as $familia)
			  		@if($producto->sistema != $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@if($producto->sistema != null)
					<option value="0">Ninguno</option>
				@endif
			  </select>
	        </div>

     	 </div>
     	 <div class="row">

	        <div class="form-group col s6">

	          {!!Form::label('Por cual tipo de fleje desea que sea buscado?: ')!!}
			  <select name="tipo" id="tipo" required>
			  	@if($producto->tipo == null)
					<option value="0">Ninguno</option>
				@endif
			  	@foreach($tipo as $familia)
			  		@if($producto->tipo == $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@foreach($tipo as $familia)
			  		@if($producto->tipo != $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@if($producto->tipo != null)
					<option value="0">Ninguno</option>
				@endif
			  </select>
	        </div>

     	 </div>
     	 <div class="row">

	        <div class="form-group col s6">

	          {!!Form::label('Por qué cantidad de fleje desea que sea buscado? : ')!!}
			  <select name="cantidad" id="cantidad" required>
			  	@if($producto->cantidad == null)
					<option value="0">Ninguno</option>
				@endif
			  	@foreach($cantidad as $familia)
			  		@if($producto->cantidad == $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@foreach($cantidad as $familia)
			  		@if($producto->cantidad != $familia->id)
						<option value="{{$familia->id}}">{{$familia->texto}}</option>
					@endif
			  	@endforeach
			  	@if($producto->cantidad != null)
					<option value="0">Ninguno</option>
				@endif
			  </select>
	        </div>

     	 </div>
				<div class="col s12 no-padding">

					{!!Form::submit('Actualizar', ['class'=>'waves-effect waves-light btn right'])!!}

				</div>

			{!!Form::close()!!}



		</div>

	</div>

</main>



<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

<script>

	CKEDITOR.replace('contenido');

  CKEDITOR.replace('tabla');

	CKEDITOR.config.height = '150px';

	CKEDITOR.config.width = '100%';

</script>

@endsection

