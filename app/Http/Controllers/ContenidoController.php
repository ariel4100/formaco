<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nuestra;
use App\Http\Requests\ContenidoRequest;

class ContenidoController extends Controller
{
    public function index()
    {
    	$contenido = Nuestra::all()->first();
        return redirect()->route('contenido.edit', $contenido->id);
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
    }
    public function edit($id)
    {
        $contenido = Nuestra::find($id);
        $contenido_seccion = 'active';
        $contenido_edit = 'active';
        return view('adm.control.empresa.EditarContenido')
            ->with('contenido',$contenido)
            ->with('contenido_edit',$contenido_edit)
            ->with('contenido_seccion', $contenido_seccion);
    }
    public function show($id)
    {

    }

    public function update(ContenidoRequest $request, $id)
    {
        $contenido=Nuestra::find($id);
        $id = Nuestra::all()->max('id');
        $contenido->titulo= $request->titulo;
        $contenido->contenido=$request->contenido;
        $contenido->subtitulo=$request->subtitulo;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/nuestra/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $contenido->imagen = 'img/nuestra/' . $id.'_'.$file->getClientOriginalName();
            }
        }

        $contenido->save();

        return redirect()->route('contenido.index');
    }

    public function destroy($id)
    {
    }
}
