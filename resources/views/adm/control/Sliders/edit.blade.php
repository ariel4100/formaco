@extends('adm.cuerpo')



@section('titulo', 'Lista de sliders')



@section('contenido')
    <main>
        <div class="container p-4">
            <a class="text-decoration-none " href="{{ route('slider.list', ['seccion' => $seccion]) }}"><< Volver</a>

            <section class=" ">
                <form class="row" method="POST" action="{{ route('slider.actualizar',$slider->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="section" value="{{$seccion}}">
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>Imagen</span>
                            {!! Form::file('imagen') !!}
                        </div>
                        <div class="file-path-wrapper">
                            {!! Form::text('imagen',null, ['class'=>'file-path validate', 'required']) !!}
                        </div>
                    </div>
                    <div class="input-field col s6">
                        {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', $slider->orden , ['class'=>'validate', 'required'])!!}
                    </div>
                    @if($seccion == 'productos')
                        <div class="input-field col s12">
                            <select name="type" required>

                                @foreach($tipo as $item)
                                    <option value="{{$item}}" {{ $slider->type == $item ? 'active selected': ''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <label>Tipo de productos</label>
                        </div>
                    @endif
                    <div class="col s12 m6">
                        <label for="titulo">Título</label>
                        <div class="input-field">
                            <textarea id="titulo" name="titulo" class="materialize-textarea" required>{!! $slider->titulo !!}</textarea>

                        </div>
                    </div>
                    <div class="col s12 m6">
                        <label for="subtitulo">Subtitulo</label>
                        <div class="input-field ">
                            <textarea id="subtitulo" name="subtitulo" class="materialize-textarea" required>{!! $slider->subtitulo !!}</textarea>

                        </div>
                    </div>



                    <div class="col s12 no-padding">
                        <button type="submit" class="waves-effect waves-light btn right" style="padding-left: 2rem; padding-right: 2rem; margin-top: 2rem ">Crear</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('titulo');
        CKEDITOR.replace('subtitulo');
        CKEDITOR.config.height = '200px';
        CKEDITOR.config.width = '100%';
    </script>
@endsection


