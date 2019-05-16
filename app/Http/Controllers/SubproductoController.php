<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\Familia;
use App\Imagen;
use App\Buscador;

class SubproductoController extends Controller
{
    public function index()
    {
       	$servicio = General::orderBy('orden', 'ASC')->get();
       	$servicio_seccion ='active';
        $servicio_edit = 'active';
        return view('adm.control.producto.ListaSubproducto')
        ->with('productos',$servicio)
        ->with('producto_seccion', $servicio_seccion)
        ->with('subproducto_edit', $servicio_edit);
    }
    public function create()
    {
        $query = Familia::all();
        $familias = [];
        foreach ($query as $familia) {
            $familias[$familia->id] = $familia->nombre;
        }

        $flejes_b = Buscador::where('seccion', 'flejar')->get();
        $flejes = [];
        $flejes[0] = 'Ninguno';
        foreach ($flejes_b as $familia) {
            $flejes[$familia->id] = $familia->texto;
        }
        $sistema_b = Buscador::where('seccion', 'sistema')->get();
        $sistema = [];
        $sistema[0] = 'Ninguno';

        foreach ($sistema_b as $familia) {
            $sistema[$familia->id] = $familia->texto;
        }
        $tipo_b = Buscador::where('seccion', 'tipo')->get();
        $tipo = [];
        $tipo[0] = 'Ninguno';

        foreach ($tipo_b as $familia) {
            $tipo[$familia->id] = $familia->texto;
        }
        $cantidad_b = Buscador::where('seccion', 'cantidad')->get();
        $cantidad = [];
        $cantidad[0] = 'Ninguno';

        foreach ($cantidad_b as $familia) {
            $cantidad[$familia->id] = $familia->texto;
        }
        $servicio_seccion ='active';
        $servicio_create = 'active';
        return view('adm.control.producto.CrearSubproducto')
          ->with('producto_seccion', $servicio_seccion)
          ->with('subproducto_create', $servicio_create)
          ->with('flejes', $flejes)
          ->with('tipo', $tipo)
          ->with('cantidad', $cantidad)
          ->with('sistema', $sistema)
          ->with('familias',$familias);
    }
    public function store(Request $request)
    {
        $imagen = new General();
        $id = General::all()->max('id');
        $imagen->contenido = $request->contenido;
        $imagen->titulo = $request->titulo;
        $imagen->orden = $request->orden;
        $imagen->id_familia = $request->id_familia;
        $family = Familia::find($request->id_familia);
        $imagen->seccion = $family->seccion;
        $imagen->link = $request->link;
        if($request->flejar != 0)
            $imagen->flejar = $request->flejar;
        if($request->sistema != 0)
            $imagen->sistema = $request->sistema;
        if($request->tipo != 0)
            $imagen->tipo = $request->tipo;
        if($request->cantidad != 0)
            $imagen->cantidad = $request->cantidad;
        $id++;
        if ($request->hasFile('imagen_destacada')) {
            if ($request->file('imagen_destacada')->isValid()) {
                $file = $request->file('imagen_destacada');
                $path = public_path('img/producto/');
                $request->file('imagen_destacada')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->imagen_destacada = 'img/producto/'. $id.'_'.$file->getClientOriginalName();

            }
        }
        if ($request->hasFile('descarga')) {
            if ($request->file('descarga')->isValid()) {
                $file = $request->file('descarga');
                $path = public_path('img/producto/');
                $request->file('descarga')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->descarga = 'img/producto/'. $id.'_'.$file->getClientOriginalName();

            }
        }
        $imagen->save();

        $img = new Imagen();
        $id = Imagen::all()->max('id');
        $img->id_generales = $imagen->id;
        $img->orden = 'aa';
        $img->imagen = $imagen->imagen_destacada;

        $img->save();
        return redirect()->route('subproducto.index');
    }
    public function edit($id)
    {
        $servicio_seccion = 'active';
        $servicio_edit ='active';
        $servicio = General::find($id);
        $familia = Familia::all();
        $cantidad = Buscador::where('seccion', 'cantidad')->get();
        $flejes = Buscador::where('seccion', 'flejar')->get();
        $sistema = Buscador::where('seccion', 'sistema')->get();
        $tipo = Buscador::where('seccion', 'tipo')->get();

        return view('adm.control.producto.EditarSubproducto')
            ->with('producto',$servicio)
            ->with('producto_seccion', $servicio_seccion)
            ->with('familias', $familia)
            ->with('flejes', $flejes)
            ->with('tipo', $tipo)
            ->with('cantidad', $cantidad)
            ->with('sistema', $sistema)
            ->with('subproducto_edit', $servicio_edit);
    }
    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $servicio=General::find($id);
        $servicio->titulo=$request->titulo;
        $servicio->id_familia=$request->id_familia;
        $family = Familia::find($request->id_familia);
        $servicio->seccion = $family->seccion;
        $servicio->orden=$request->orden;
        $servicio->contenido=$request->contenido;
        $servicio->link = $request->link;
        if($request->flejar != 0){
            $servicio->flejar = $request->flejar;
        }
        else{
            $servicio->flejar = null;
        }
        if($request->sistema != 0){
            $servicio->sistema = $request->sistema;
        }
        else{
            $servicio->sistema = null;
        }
        if($request->tipo != 0){
            $servicio->tipo = $request->tipo;
        }
        else{
            $servicio->tipo = null;
        }

        if($request->cantidad != 0){
            $servicio->cantidad = $request->cantidad;
        }
        else{
            $servicio->cantidad = null;
        }
        $id = General::all()->max('id');
        $id++;
        if ($request->hasFile('imagen_destacada')) {
            if ($request->file('imagen_destacada')->isValid()) {
                $file = $request->file('imagen_destacada');
                $path = public_path('img/producto/');
                $request->file('imagen_destacada')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->imagen_destacada = 'img/producto/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('descarga')) {
            if ($request->file('descarga')->isValid()) {
                $file = $request->file('descarga');
                $path = public_path('img/producto/');
                $request->file('descarga')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->descarga = 'img/producto/'. $id.'_'.$file->getClientOriginalName();

            }
        }
        $servicio->save();

        return redirect()->route('subproducto.index');
    }

    public function destroy($id)
    {
    	$subproducto= General::find($id);
        $subproducto -> delete();
        return redirect()->route('subproducto.index');
    }

}
