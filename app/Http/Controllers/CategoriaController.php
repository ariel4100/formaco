<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
  public function index()
  {
    $contenido_seccion = 'active';
    $contenido_edit = 'active';
      $categorias= Categoria::orderBy('orden','asc')->get();
      return view('adm.control.categoria.editarCategorias')->with('categorias',$categorias)
      ->with('categorias_edit',$contenido_edit)
      ->with('categorias_seccion', $contenido_seccion);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $contenido_seccion = 'active';
    $contenido_edit = 'active';
      return view('adm.control.categoria.crearCategoria')
      ->with('categorias_create',$contenido_edit)
      ->with('categorias_seccion', $contenido_seccion);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $categoria= new Categoria($request->all());
      $categoria->save();
      return redirect()->route('categorias.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $contenido_seccion = 'active';
    $contenido_edit = 'active';
      $categoria = Categoria::find($id);
      return view('adm.control.categoria.editarCategoria')->with('categoria', $categoria)
      ->with('categorias_edit',$contenido_edit)
      ->with('categorias_seccion', $contenido_seccion);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }
  public function update_categoria(Request $request)
  {
      $categoria=Categoria::find($request->id);
      $categoria->nombre=$request->nombre;
      $categoria->orden=$request->orden;
      $categoria->save();

      return redirect()->route('categorias.index');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $categoria= Categoria::find($id);
      $categoria -> delete();

      return redirect()->route('categorias.index');
  }
}
