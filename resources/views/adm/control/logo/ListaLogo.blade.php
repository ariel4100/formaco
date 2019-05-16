@extends('adm.cuerpo')

@section('titulo', 'Lista Familia')

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
						<td>Logo</td>
						<td>Tipo</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($logos as $logo)
						<tr>
							<td><img src="{{ asset($logo->ruta) }}" alt="logo"></td>
							<td>{{ $logo->tipo }}</td>
							<td class="text-right">
								<a href="{{ route('logos.edit', $logo->id) }}"><i class="material-icons">create</i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>			
			</div>
		</div>
    </div>
</main>

@endsection
{{-- @extends('adm.cuerpo')

@section('titulo','Lista de logos')

@section('contenido')

	<div class="content-lista">
		
		<div class="row">
		<div class="col-xs-12 col-md-12">
		
			@include('flash::message')
			<div class="table-responsive size-table tabla">
				<table class="table table-condensed table-hover table-bordered ">
					<thead>
						<tr>
							<th class="text-center">Logo</th>
							<th class="text-center">Tipo</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($logos as $logo)
						<tr>
							<td class="text-center" style="width: 300px;"><img style="max-width: 100%;" src="{{ asset($logo->ruta) }}" alt="logo"></td>
							<td class="text-center">{{ $logo->tipo }}</td>
							<td style="max-width: 10px;">
								<center><a class="btn btn-warning" id="editar" href="{{ route('logos.edit', $logo->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></center>
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