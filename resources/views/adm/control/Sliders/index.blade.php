@extends('adm.cuerpo')



@section('titulo', 'Lista de sliders')
@section('contenido')
    <main>
        <div class="container p-4">
            <a href="{{ route('slider.crear',['seccion' => $section]) }}" class="waves-effect waves-light btn"> Añadir</a>
            <div class="row">
                <div class="col s12">
                    <table class="highlight bordered">
                        <thead>
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Orden</th>
                            <th scope="col" class="text-right">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($slider as $item)
                            <tr>
                                <td><img src="{{  asset($item->imagen) }}" style="width: 150px"></td>
                                <td>{!! $item->titulo !!}</td>
                                <td>{{ $item->orden }}</td>
                                <td class="text-right">
                                    <a class="" href="{{ route('slider.editar', ['slider' => $item->id]) }}"><i class="material-icons">create</i></a>
                                    <a class="" href="{{ route('slider.eliminar', ['slider' => $item->id]) }}"><i class="material-icons red-text">cancel</i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No hay registros</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
