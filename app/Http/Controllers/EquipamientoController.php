<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamiento;
class EquipamientoController extends Controller
{
    public function index()
    {
        $general  = Equipamiento::orderBy('orden', 'ASC')->get();
        $equipamiento_seccion ='active';
        $equipamiento_edit = 'active';
        return view('adm.control.equipamiento.ListaEquipo')
        ->with('equipamientos',$general)
        ->with('equipamiento_seccion', $equipamiento_seccion)
        ->with('equipamiento_edit', $equipamiento_edit);
    }
    public function create()
    {
        $general_seccion ='active';
        $general_edit = 'active';
        return view('adm.control.equipamiento.CrearEquipo')
        ->with('equipamiento_seccion', $general_seccion)
        ->with('equipamiento_create', $general_edit);
    } 
    public function store(Request $request)
    {
        $producto = new Equipamiento();
        $producto->titulo= $request->titulo;
        $producto->contenido= $request->contenido;
        $producto->orden=$request->orden;
        
        $producto->save();
        flash('Se ha registrado '. $producto->titulo . ' de forma exitosa')->success()->important();
        return redirect()->route('equipamientos.index');
        
    }
    public function edit($id)
    {
        $general = Equipamiento::find($id);
        $general_seccion ='active';
        $general_edit = 'active';
        return view('adm.control.equipamiento.EditarEquipo')
            ->with('equipamiento',$general)
            ->with('equipamiento_seccion', $general_seccion)
            ->with('equipamiento_edit', $general_edit);   
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $producto = Equipamiento::find($id);
        $producto->titulo= $request->titulo;
        $producto->contenido= $request->contenido;
        $producto->orden=$request->orden;
        
        $producto->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('equipamientos.index');
    }

    public function destroy($id)
    {
        $subproducto= Equipamiento::find($id);
        $subproducto -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('equipamientos.index');
    }
}
