@extends('adm.cuerpo')



@section('titulo', 'Editar Sector')



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

			{!!Form::model($producto, ['route'=>['subsectores.update',$producto->id], 'method'=>'PUT', 'files' => true])!!}

      <div class="row">

        {{--<div class="form-group col s6">--}}

          {{--{!!Form::label('Sector:')!!}--}}
		  {{--<select name="id_sector" id="id_sector" required>--}}
		  	{{--@foreach($familias as $familia)--}}
		  		{{--@if($producto->id_sector == $familia->id)--}}
					{{--<option value="{{$familia->id}}">{{$familia->nombre}}</option>--}}
				{{--@endif--}}
		  	{{--@endforeach--}}
		  	{{--@foreach($familias as $familia)--}}
		  		{{--@if($producto->id_sector != $familia->id)--}}
					{{--<option value="{{$familia->id}}">{{$familia->nombre}}</option>--}}
				{{--@endif--}}
		  	{{--@endforeach--}}
		  {{--</select>--}}
        {{--</div>--}}

      </div>

		<div class="file-field input-field col s12">
			<div class="btn">
					<span>Imagen</span>
					{!! Form::file('imagen') !!}
			</div>
			<div class="file-path-wrapper">
					{!! Form::text('imagen',$producto->imagen, ['class'=>'file-path validate', 'required']) !!}
			</div>
      	</div>

		<div class="row">

			<div class="input-field col s6">

				{!!Form::label('Nombre:')!!}

				{!!Form::text('nombre', $producto->titulo , ['class'=>'validate', 'required'])!!}

			</div>

			<div class="input-field col s6">

			{!!Form::label('Orden:')!!}

			{!!Form::text('orden', $producto->orden , ['class'=>'validate', 'required'])!!}

			</div>



		</div>

    	<div class="row">
				@foreach($productos as $producto_selected)
					<?php
						$band=0;
					?>
					@foreach($selects as $sel)
						@if($producto_selected->id == $sel->id_producto)
							<?php
								$band++;
							?>
						@endif
      				@endforeach

					<p>
      				@if($band!=0)
								<input type="checkbox" id="{{$producto_selected->id}}" name="producto_selected[]" value="{{$producto_selected->id}}" checked="checked" />
	  						<label for="{{$producto_selected->id}}">{{$producto_selected->titulo}}</label>
      				@else
      					<input type="checkbox" id="{{$producto_selected->id}}" name="producto_selected[]" value="{{$producto_selected->id}}" />
	  						<label for="{{$producto_selected->id}}">{{$producto_selected->titulo}}</label>
      				@endif

      		</p>
				@endforeach
			</div>

		<div class="col s12 no-padding">

			{!!Form::submit('Actualizar', ['class'=>'waves-effect waves-light btn right'])!!}

		</div>

		{!!Form::close()!!}

		</div>

	</div>

</main>

@endsection

