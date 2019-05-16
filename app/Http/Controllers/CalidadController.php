<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calidad;
use App\Http\Requests\CalidadRequest;

class CalidadController extends Controller
{
    public function index(Request $request)
    {
        $familia  = Calidad::all()->first();

        return redirect()->route('calidades.edit',$familia->id);
    }
    public function create()
    {
    }
    public function store(Request $request)
    {

    }
    public function edit($id)
    {
        $general_seccion ='active';
        $general_edit = 'active';
        $producto = Calidad::find($id);
        return view('adm.control.calidad.EditarCalidad')
            ->with('calidad',$producto)
            ->with('calidad_seccion', $general_seccion)
            ->with('calidad_edit', $general_edit);
    }
    public function show($id)
    {

    }

    public function update(CalidadRequest $request, $id)
    {
        $producto = Calidad::find($id);
        $producto->titulo = $request->titulo;
        $producto->subtitulo = $request->subtitulo;
        $producto->titulo_img = $request->titulo_img;
        $id = Calidad::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/calidad/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen = 'img/calidad/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $producto->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('calidades.index');
    }

    public function destroy($id)
    {
    }
}
