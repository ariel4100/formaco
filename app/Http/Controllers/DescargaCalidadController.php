<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calidad_descarga;
class DescargaCalidadController extends Controller
{
    public function index()
    {
       	$servicio = Calidad_descarga::orderBy('orden', 'ASC')->get();
       	$servicio_seccion ='active';
        $servicio_edit = 'active';
        return view('adm.control.descarga_calidad.ListaDescarga')
        ->with('descargas',$servicio)
        ->with('calidad_seccion', $servicio_seccion)
        ->with('calidad_edit_d', $servicio_edit);
    }
    public function create()
    {
        $servicio_seccion ='active';
        $servicio_create = 'active';
        return view('adm.control.descarga_calidad.CrearDescarga')
        ->with('calidad_seccion', $servicio_seccion)
        ->with('calidad_create_d', $servicio_create);
    }
    public function store(Request $request)
    {
        $imagen = new Calidad_descarga();
        $id = Calidad_descarga::all()->max('id');
        $imagen->orden = $request->orden;
        $imagen->nombre = $request->nombre;
        $id++;
        if ($request->hasFile('ruta')) {
            if ($request->file('ruta')->isValid()) {
                $file = $request->file('ruta');
                $path = public_path('img/calidad/');
                $request->file('ruta')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->ruta = 'img/calidad/'. $id.'_'.$file->getClientOriginalName();
                $imagen->save();
            }
        }
        flash('Se ha registrado de forma exitosa')->success()->important();
        return redirect()->route('descargas_calidad.index');
    }
    public function edit($id)
    {
        $servicio_seccion = 'active';
        $servicio_edit ='active';
        $servicio = Calidad_descarga::find($id);
        return view('adm.control.descarga_calidad.EditarDescarga')
            ->with('descarga',$servicio)
            ->with('calidad_seccion', $servicio_seccion)
            ->with('calidad_edit_d', $servicio_edit);
    }
    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $servicio=Calidad_descarga::find($id);
        $servicio->orden=$request->orden;
        $servicio->nombre=$request->nombre;
        $id = Calidad_descarga::all()->max('id');
        $id++;
        if ($request->hasFile('ruta')) {
            if ($request->file('ruta')->isValid()) {
                $file = $request->file('ruta');
                $path = public_path('img/calidad/');
                $request->file('ruta')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ruta = 'img/calidad/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $servicio->save();

        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('descargas_calidad.index');
    }

    public function destroy($id)
    {
    	$subproducto= Calidad_descarga::find($id);
        $subproducto -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('descargas_calidad.index');
    }
}
