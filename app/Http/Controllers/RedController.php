<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Red;

class RedController extends Controller
{
    public function index(Request $request)
    {
        $redes_seccion="active";
        $redes_edit="active";
        $red  = Red::orderBy('id','ASC')->get();
    	return view('adm.control.red.ListaRed')
        ->with('redes',$red)
        ->with('redes_seccion',$redes_seccion)
        ->with('redes_edit',$redes_edit);
    }
    public function create()
    {
        $redes_seccion="active";
        $redes_create="active";
        $red  = Red::orderBy('id','ASC')->get();
        return view('adm.control.red.CrearRed')
        ->with('redes',$red)
        ->with('redes_seccion',$redes_seccion)
        ->with('redes_create',$redes_create);
    } 
    public function store(Request $request)
    {
        $red = new Red();
        $id = Red::all()->max('id');
        $red->link = $request->link;
        $red->logo = $request->logo;
        $red->ubicacion = $request->ubicacion;
        $id++;
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/redes/');
                $request->file('logo')->move($path, $id.'_'.$file->getClientOriginalName());
                $red->logo = 'img/redes/'. $id.'_'.$file->getClientOriginalName();
                $red->save();
            }
        }
        flash('Se ha registrado '. $red->nombre . ' de forma exitosa')->success()->important();
        return redirect()->route('redes.index');
    }
    public function edit($id)
    {
        $redes_seccion="active";
        $redes_edit="active";
        $red = Red::find($id);
        return view('adm.control.red.EditarRed')
            ->with('redes',$red)
            ->with('redes_seccion',$redes_seccion)
            ->with('redes_edit',$redes_edit);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $red=Red::find($id);
        $red->link=$request->link;
        $red->ubicacion=$request->ubicacion;
        $id = Red::all()->max('id');
        $id++;
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/redes/');
                $request->file('logo')->move($path, $id.'_'.$file->getClientOriginalName());
                $red->logo = 'img/redes/' . $id.'_'.$file->getClientOriginalName();
                $red->save();
            }
        }
        $red->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('redes.index');
    }


    public function destroy($id)
    {
        $red= Red::find($id);
        $red -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('redes.index');
    }
}
