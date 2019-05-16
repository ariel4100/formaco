<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NaturalRequest;
use App\Imagen;
use App\Trabajo;
class TrabajoController extends Controller
{
    public function index()
    {
        $servicio = Trabajo::orderBy('orden', 'ASC')->get();
        $servicio_seccion ='active';
        $servicio_edit = 'active';
        return view('adm.control.trabajo.ListaTrabajo')
        ->with('trabajos',$servicio)
        ->with('trabajo_seccion', $servicio_seccion)
        ->with('trabajo_edit', $servicio_edit);
    }
    public function create()
    {
        $servicio_seccion ='active';
        $servicio_create = 'active';
        return view('adm.control.trabajo.CrearTrabajo')
        ->with('trabajo_seccion', $servicio_seccion)
        ->with('trabajo_create', $servicio_create);
    } 
    public function store(Request $request)
    {
        $producto = new Trabajo();
        $id = Trabajo::all()->max('id');
        $producto->titulo= $request->titulo;
        $producto->contenido= $request->contenido;
        $producto->orden=$request->orden;
        $producto->subtitulo=$request->subtitulo;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/trabajos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen = 'img/trabajos/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $imagen = new Imagen();
        $imagen->id_trabajo = $id++;
        $id = Imagen::all()->max('id');
        $imagen->orden = "aa";
        $id++;
        $imagen->imagen = $producto->imagen;

        $imagen->save();
        $producto->save();
        flash('Se ha registrado '. $producto->titulo . ' de forma exitosa')->success()->important();
        return redirect()->route('trabajo.index');
    }
    public function edit($id)
    {
        $natural = Trabajo::find($id);
        $natural_seccion ='active';
        $natural_edit = 'active';
        return view('adm.control.trabajo.EditarTrabajo')
            ->with('trabajo',$natural)
            ->with('trabajo_seccion', $natural_seccion)
            ->with('trabajo_edit', $natural_edit); 
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $servicio = Trabajo::find($id);
        $servicio->orden = $request->orden;
        $servicio->titulo= $request->titulo;
        $servicio->contenido= $request->contenido;
        $servicio->subtitulo= $request->subtitulo;
        $id = Trabajo::all()->max('id');
        $id++;
       
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/trabajos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->imagen = 'img/trabajos/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $servicio->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('trabajo.index');
    }
    public function destroy($id)
    {
        $descarga= Trabajo::find($id);
        $descarga -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('trabajo.index');
    }
}
