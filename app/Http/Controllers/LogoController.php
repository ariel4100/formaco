<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;

class LogoController extends Controller
{
    public function index(Request $request)
    {
        $logo  = logo::orderBy('id','ASC')->paginate(5);
        $logo_seccion = 'active';
        $logo_edit = 'active';
    	return view('adm.control.logo.ListaLogo')
        ->with('logos',$logo)
        ->with('logo_seccion',$logo_seccion)
        ->with('logo_edit',$logo_edit);
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
        $logo_seccion = 'active';
        $logo_edit = 'active';
        return view('adm.control.logo.EditarLogo')
            ->with('logos',$logo)
            ->with('logo_seccion',$logo_seccion)
            ->with('logo_edit',$logo_edit);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $logo=logo::find($id);
        //$logo->tipo=$request->tipo;
        $logo->ruta=$request->ruta;
        $id=$request->id+1;
        if ($request->hasFile('ruta')) {
            if ($request->file('ruta')->isValid()) {
                $file = $request->file('ruta');
                $path = public_path('img/logo/');
                $request->file('ruta')->move($path, $id.'_'.$file->getClientOriginalName());
                $logo->ruta = 'img/logo/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $logo->save();
        
        return redirect()->route('logos.index');
    }

    public function destroy($id)
    {
       
    }
}
