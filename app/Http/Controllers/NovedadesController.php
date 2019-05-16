<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Categoria;
class NovedadesController extends Controller
{
  public function index()
  {
    $contenido_seccion = 'active';
    $contenido_edit = 'active';
      $categorias= Novedad::orderBy('orden','asc')->get();
      $cate = Categoria::orderBy('orden','asc')->get();
      return view('adm.control.novedades.ListaNovedad')
      ->with('novedades',$categorias)
      ->with('categorias',$cate)
      ->with('novedad_edit',$contenido_edit)
      ->with('categorias_seccion', $contenido_seccion);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $query = Categoria::all();
    $familias = [];
    foreach ($query as $familia) {
        $familias[$familia->id] = $familia->nombre;
    }
    $contenido_seccion = 'active';
    $contenido_edit = 'active';
      return view('adm.control.novedades.CrearNovedad')
      ->with('familias',$familias)
      ->with('novedad_create',$contenido_edit)
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
      $categoria= new Novedad();
      $categoria->nombre=$request->nombre;
      $categoria->texto=$request->texto;
      $categoria->texto_breve=$request->texto_breve;
      $categoria->fecha=$request->fecha;
      $categoria->orden=$request->orden;
      $categoria->id_categoria=$request->id_categoria;
      $id=Novedad::all()->max('id');
      $id++;
      if ($request->hasFile('imagen')) {
          if ($request->file('imagen')->isValid()) {
              $file = $request->file('imagen');
              $path = public_path('img/novedades/');
              $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
              $categoria->imagen = 'img/novedades/'. $id.'_'.$file->getClientOriginalName();
          }
      }

      if ($request->hasFile('imagen_maxi')) {
          if ($request->file('imagen_maxi')->isValid()) {
              $file = $request->file('imagen_maxi');
              $path = public_path('img/novedades/');
              $request->file('imagen_maxi')->move($path, $id.'_'.$file->getClientOriginalName());
              $categoria->imagen_maxi = 'img/novedades/'. $id.'_'.$file->getClientOriginalName();
          }
      }
      if ($request->hasFile('ficha')) {
          if ($request->file('ficha')->isValid()) {
              $file = $request->file('ficha');
              $path = public_path('img/novedades/');
              $request->file('ficha')->move($path, $id.'_'.$file->getClientOriginalName());
              $categoria->ficha = 'img/novedades/'. $id.'_'.$file->getClientOriginalName();
          }
      }
      $categoria->save();
      
      return redirect()->route('novedades.index');
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

      $categoria = Novedad::find($id);
      return view('adm.control.novedades.EditarNovedad')
      ->with('novedad', $categoria)
      ->with('novedad_edit',$contenido_edit)
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
    $categoria=Novedad::find($id);
    $categoria->nombre=$request->nombre;
    $categoria->texto=$request->texto;
    $categoria->texto_breve=$request->texto_breve;
    $categoria->fecha=$request->fecha;
    $categoria->orden=$request->orden;
    $id=Novedad::all()->max('id');
    $id++;
    if ($request->hasFile('imagen')) {
        if ($request->file('imagen')->isValid()) {
            $file = $request->file('imagen');
            $path = public_path('img/novedades/');
            $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
            $categoria->imagen = 'img/novedades/'. $id.'_'.$file->getClientOriginalName();
        }
    }
    if ($request->hasFile('imagen_maxi')) {
        if ($request->file('imagen_maxi')->isValid()) {
            $file = $request->file('imagen_maxi');
            $path = public_path('img/novedades/');
            $request->file('imagen_maxi')->move($path, $id.'_'.$file->getClientOriginalName());
            $categoria->imagen_maxi = 'img/novedades/'. $id.'_'.$file->getClientOriginalName();
        }
    }
    if ($request->hasFile('ficha')) {
        if ($request->file('ficha')->isValid()) {
            $file = $request->file('ficha');
            $path = public_path('img/novedades/');
            $request->file('ficha')->move($path, $id.'_'.$file->getClientOriginalName());
            $categoria->ficha = 'img/novedades/'. $id.'_'.$file->getClientOriginalName();
        }
    }
    $categoria->save();


    return redirect()->route('novedades.index');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $categoria= Novedad::find($id);
      $categoria -> delete();

      return redirect()->route('novedades.index');
  }
}
