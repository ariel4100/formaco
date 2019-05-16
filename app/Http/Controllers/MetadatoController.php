<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadato;

class MetadatoController extends Controller
{
    public function index(Request $request)
    {
        $metadato  = metadato::orderBy('id','ASC')->get();
        $metadato_seccion = 'active';
        $metadato_edit = 'active';
    	return view('adm.control.metadatos.ListaMetadato')
        ->with('metadatos',$metadato)
        ->with('metadato_seccion', $metadato_seccion)
        ->with('metadato_edit', $metadato_edit);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $metadato = metadato::find($id);
        $metadato_seccion = 'active';
        $metadato_edit = 'active';
        return view('adm.control.metadatos.EditarMetadato')
            ->with('metadatos',$metadato)
            ->with('metadato_seccion', $metadato_seccion)
            ->with('metadato_edit', $metadato_edit);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $metadato=metadato::find($id);
        $metadato->keywords=$request->keywords;
        $metadato->description=$request->description;
        
        $metadato->save();
        
        return redirect()->route('metadatos.index');
    }

    public function destroy($id)
    {
       
    }
}
