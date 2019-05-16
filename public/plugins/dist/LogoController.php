<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;

class LogoController extends Controller
{
    public function index(Request $request)
    {
        $logo  = logo::orderBy('id','ASC')->paginate(5);
    	return view('adm.control.logo.ListaLogo')
        ->with('logos',$logo);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $logo = logo::find($id);
        return view('adm.control.logo.EditarLogo')
            ->with('logos',$logo);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function update_logos(Request $request)
    {
        $logo=logo::find($request->id);
        //$logo->tipo=$request->tipo;
        $logo->ruta=$request->ruta;
        $id=$request->id+1;
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/logos/');
                $request->file('logo')->move($path, $id.'_'.$file->getClientOriginalName());
                $logo->ruta = 'img/logos/' . $id.'_'.$file->getClientOriginalName();
                $logo->save();
            }
        }
        $logo->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('logos.index');
    }

    public function destroy($id)
    {
       
    }
}
