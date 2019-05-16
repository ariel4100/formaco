<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;
class DatoController extends Controller
{
    public function index(Request $request)
    {
        $dato  = dato::orderBy('id','ASC')->get();
        $dato_seccion = 'active';
        $dato_edit = "active";
    	return view('adm.control.datos_empresa.ListaDatos')
        ->with('datos',$dato)
        ->with('dato_seccion', $dato_seccion)
        ->with('dato_edit', $dato_edit);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $dato = dato::find($id);
        $dato_seccion = 'active';
        $dato_edit = "active";
        return view('adm.control.datos_empresa.EditarDatos')
            ->with('datos',$dato)
            ->with('dato_seccion', $dato_seccion)
            ->with('dato_edit', $dato_edit);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $dato=dato::find($id);
        $dato->descripcion=$request->descripcion;
        
        $dato->save();
        
        return redirect()->route('datos.index');
    }

    public function update_datos(Request $request)
    {
        
    }

    public function destroy($id)
    {
       
    }
}
