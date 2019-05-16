<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Metadato;
use App\Categoria;
use App\Novedad;
class BuscarController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $buscar = $request->busca;

        $categorias = Categoria::orderBy('orden','ASC')->get();

        $categorias2 = Categoria::orderBy('orden','ASC')->get();
        $novedades = Novedad::where('nombre',$buscar)->orWhere('nombre','like','%'.$buscar.'%')->get();

        $metadato= Metadato::where('seccion','novedades')->first();
        $active='novedades';
        return view('pages.novedades', [
            'metadatos' => $metadato,
            'active' => $active,
            'categorias' => $categorias,
            'categorias2' => $categorias2,
            'novedades' => $novedades
        ]);
    }

    public function show($id)
    {

        $categorias = Categoria::where('id',$id)->orderBy('orden','ASC')->get();
        $categorias2 = Categoria::orderBy('orden','ASC')->get();
        $novedades = Novedad::orderBy('orden','ASC')->get();

        $metadato= Metadato::where('seccion','novedades')->first();
        $active='novedades';
        return view('pages.novedades', [
            'metadatos' => $metadato,
            'active' => $active,
            'categorias' => $categorias,
            'categorias2' => $categorias2,
            'novedades' => $novedades
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
