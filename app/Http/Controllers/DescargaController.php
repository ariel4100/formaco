<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descarga;
class DescargaController extends Controller
{
    public function index()
    {
       	$servicio = Descarga::orderBy('orden', 'ASC')->get();
       	$servicio_seccion ='active';
        $servicio_edit = 'active';
        return view('adm.control.compromiso.ListaDescarga')
        ->with('descargas',$servicio)
        ->with('trabajo_seccion', $servicio_seccion)
        ->with('trabajo_edit', $servicio_edit);
    }
    public function create()
    {
        $servicio_seccion ='active';
        $servicio_create = 'active';
        return view('adm.control.compromiso.CrearDescarga')
        ->with('trabajo_seccion', $servicio_seccion)
        ->with('trabajo_create', $servicio_create);
    }
    public function store(Request $request)
    {
        $imagen = new Descarga();
        $id = Descarga::all()->max('id');
        $imagen->orden = $request->orden;
        $imagen->nombre = $request->nombre;
        $id++;
        if ($request->hasFile('ruta')) {
            if ($request->file('ruta')->isValid()) {
                $file = $request->file('ruta');
                $path = public_path('img/descarga/');
                $request->file('ruta')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->ruta = 'img/descarga/'. $id.'_'.$file->getClientOriginalName();
                
            }
        }
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/descarga/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->imagen = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $imagen->save();
        flash('Se ha registrado de forma exitosa')->success()->important();
        return redirect()->route('descargas.index');
    }
    public function edit($id)
    {
        $servicio_seccion = 'active';
        $servicio_edit ='active';
        $servicio = Descarga::find($id);
        return view('adm.control.compromiso.EditarDescarga')
            ->with('descarga',$servicio)
            ->with('trabajo_seccion', $servicio_seccion)
            ->with('trabajo_edit', $servicio_edit);
    }
    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $servicio=Descarga::find($id);
        $servicio->orden=$request->orden;
        $servicio->nombre=$request->nombre;
        $id = Descarga::all()->max('id');
        $id++;
        if ($request->hasFile('ruta')) {
            if ($request->file('ruta')->isValid()) {
                $file = $request->file('ruta');
                $path = public_path('img/descarga/');
                $request->file('ruta')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ruta = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/descarga/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->imagen = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $servicio->save();

        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('descargas.index');
    }

    public function destroy($id)
    {
    	$subproducto= Descarga::find($id);
        $subproducto -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('descargas.index');
    }
}
