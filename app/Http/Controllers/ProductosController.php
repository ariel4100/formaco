<?php

namespace App\Http\Controllers;


use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;

class ProductosController extends Controller

{
    public function index(Request $request)
    {
        $producto_seccion='active';
        $producto_edit='active';
        $producto  = producto::orderBy('orden','ASC')->get();
    	return view('adm.control.productos.ListaProductos')
        ->with('productos',$producto)
        ->with('home_seccion', $producto_seccion)
        ->with('producto_edit', $producto_edit);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $producto_seccion='active';
        $producto_edit='active';
        $producto = producto::find($id);
        return view('adm.control.productos.EditarProductos')
            ->with('productos',$producto)
            ->with('home_seccion', $producto_seccion)
            ->with('producto_edit', $producto_edit);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {

        $producto = producto::find($id);
        $id = producto::all()->max('id');
        $producto->orden = $request->orden;
        $producto->link = $request->link;
        $producto->nombre = $request->nombre;
//        $producto->destacado = $request->destacado;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/productos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen = 'img/productos/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $producto->save();
        return redirect()->route('productos-destacados.index');
    }

    public function destroy($id)
    {
       
    }
}
