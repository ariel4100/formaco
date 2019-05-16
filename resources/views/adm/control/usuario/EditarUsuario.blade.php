@extends('adm.cuerpo')

@section('titulo', 'Editar Usuario')

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
			{!!Form::model($usuarios, ['route'=>['usuario.update',$usuarios->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
				
					<div class="input-field col s12 m6">
						{!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', $usuarios->nombre , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s12 m6">
						{!!Form::label('Username:')!!}
						{!!Form::text('username', $usuarios->username , ['class'=>'validate', 'required'])!!}
					</div>
					
				    <div class="input-field col s12">
                        <i class="material-icons prefix">https</i>
                        <input id="password" name="password" type="password" value="{{$usuarios->password }}" class="form-control">
                        {!!Form::label('Contraseña', 'Contraseña')!!}
                    </div>
                    <div class="input-field col s12 m6">
						<select id="nivel" name="nivel">
							<option value="{{$usuarios->nivel}}">{{$usuarios->nivel}}</option>
						  <option value="administrador">Administrador</option>
						  <option value="usuario">Usuario</option>
						  <option value="privado">Privado</option>
						</select>
						<label>Qué tipo de usuario desea crear?</label>
					</div>
					 <div class="input-field col s12 m6">
						<select id="checking" name="checking">
							<option value="{{$usuarios->checking}}">{{$usuarios->checking}}</option>
						  <option value="Activo">Activo</option>
						  <option value="Inactivo">Inactivo</option>
						</select>
						<label>Activar usuario cliente</label>
					</div>
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
