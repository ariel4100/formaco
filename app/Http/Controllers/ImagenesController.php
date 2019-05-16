<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\Http\Requests\GaleriaRequest;
use App\Imagen;

class ImagenesController extends Controller
{

    public function index()
    {
    }
    public function index_galeria($id)
    {
        $imagen = Imagen::orderBy('orden','ASC')->where('id_generales',$id)->get();
        $general = General::where('id',$id)->first();
        $general_seccion ='active';
        $general_edit = 'active';
        return view('adm.control.trabajo.ListaGaleria')
        ->with('imagenes', $imagen)
        ->with('general',$general)
        ->with('producto_seccion', $general_seccion)
        ->with('subproducto_edit', $general_edit);
    }
    public function create()
    {

    }
    public function create_galeria($id)
    {
        $general  = General::where('id',$id)->first();
        $general_seccion ='active';
        $general_edit = 'active';
        return view('adm.control.trabajo.CrearGaleria')
        ->with('general',$general)
        ->with('producto_seccion', $general_seccion)
        ->with('subproducto_edit', $general_edit);
    }

    public function store(GaleriaRequest $request)
    {
        $imagen = new Imagen();
        $id = Imagen::all()->max('id');
        $imagen->id_generales = $request->id_generales;
        $imagen->imagen = $request->imagen;
        $imagen->orden = $request->orden;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/galeria_productos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->imagen = 'img/galeria_productos/'. $id.'_'.$file->getClientOriginalName();
                $imagen->save();
            }
        }
        return redirect()->route('galerias.create_galeria',$imagen->id_generales);

    }
    public function edit($id)
    {
        $general_seccion ='active';
        $general_edit = 'active';
        $imagen = Imagen::where('id',$id)->first();
        return view('adm.control.trabajo.EditarGaleria')
            ->with('imagen',$imagen)
            ->with('producto_seccion', $general_seccion)
            ->with('producto_edit', $general_edit);
    }
    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $imagen = Imagen::find($id);
        $id = Imagen::all()->max('id');
        $imagen->orden = $request->orden;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/galeria_productos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->imagen = 'img/galeria_productos/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $imagen->save();
        return redirect()->route('galerias.index_galeria',$imagen->id_generales);

    }

    public function destroy($id)
    {
        $imagen= Imagen::find($id);
        $imagen -> delete();
        return redirect()->route('subproducto.index');
    }
}
