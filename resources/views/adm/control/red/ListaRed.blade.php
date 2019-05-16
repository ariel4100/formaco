@extends('adm.cuerpo')

@section('titulo', 'Editar sliders')

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
				<table class="highlight bordered">
				<thead>
					<td>Link</td>
					<td>Logo</td>
					<td>Ubicacion</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($redes as $red)
					<tr>
						<td>{{$red->link}}</td>
						<td><img src="{{asset($red->logo)}}" alt=""></td>
						<td>{{$red->ubicacion}}</td>
						<td class="text-right">
							<a href="{{ route('redes.edit',$red->id)}}"><i class="material-icons">create</i></a>
							{!!Form::open(['class'=>'en-linea', 'route'=>['redes.destroy', $red->id], 'method' => 'DELETE'])!!}
								<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
									<i class="material-icons red-text">cancel</i>
								</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>			
			</div>
		</div>
    </div>
</main>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection
{{-- @extends('adm.cuerpo')

@section('titulo','Lista de las redes social')

@section('contenido')

	<div class="content-lista">
		
		<div class="row">
		<div class="col-xs-12 col-md-12">
		
			@include('flash::message')
			<div class="table-responsive size-table tabla">
				<table class="table table-condensed table-hover ">
					<thead>
						<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Link</th>
							<th class="text-center">Logo</th>
							<th class="text-center">Ubicacion</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($redes as $red)
						<tr>
							<td class="text-center">{{ $red->nombre }}</td>
							<td class="text-center">{{ $red->link }}</td>
							<td class="text-center"><img src="{{ asset($red->logo) }}" alt="logo-red-social"></td>
							<td class="text-center">{{ $red->ubicacion }}</td>
							<td>
								<a class="btn btn-warning" id="editar" href="{{ route('redes.edit', $red->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="btn btn-danger" id="eliminar" href="{{ route('redes.destroy', $red->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>

@endsection --}}