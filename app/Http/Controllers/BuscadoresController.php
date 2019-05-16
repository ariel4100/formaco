<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buscador;

class BuscadoresController extends Controller
{
	public function index()
    {
        $home_seccion = 'active';
        $slider_edit = 'active';
        $seccion = "buscador";
        $slider  = Buscador::all();
    	return view('adm.control.buscador.ListaBuscador')
        ->with('buscadores',$slider)
        ->with('seccion', $seccion)
        ->with('buscador_seccion', $home_seccion)
        ->with('buscador_edit', $slider_edit);
    }

    public function create()
    {
        $seccion = "buscador";
        $home_seccion = 'active';
        $slider_create = 'active';
        return view('adm.control.buscador.CrearBuscador')
        ->with('seccion', $seccion)
        ->with('buscador_seccion', $home_seccion)
        ->with('buscador_create', $slider_create);
    }

    public function store(Request $request)
    {
     	$slider = new Buscador();
        $slider->texto = $request->texto;
        $slider->seccion = $request->seccion;

        $slider->save();

        return redirect()->route('buscadores.index');

    }
    public function edit($id)
    {
        $slider = Buscador::find($id);
            $home_seccion = 'active';
            $slider_edit = 'active';
            return view('adm.control.buscador.EditarBuscador')
            ->with('buscador',$slider)
            ->with('buscador_seccion',$home_seccion)
            ->with('buscador_edit', $slider_edit);

    }
    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $slider=Buscador::find($id);
        $id = Buscador::all()->max('id');
        $slider->texto = $request->texto;
        $slider->seccion = $request->seccion;
        
        $slider->save();
        return redirect()->route('buscadores.index');
    }

    public function destroy($id)
    {
        $slider= Buscador::find($id);
        $seccion=$slider->seccion;
        $slider -> delete();
        return redirect()->route('buscadores.index');
        
    }
}
