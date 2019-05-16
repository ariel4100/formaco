<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Sector;

class SectoresController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

      $servicio_seccion ='active';

      $servicio_create = 'active';

      $productos= Sector::orderBy('orden','asc')->get();

      return view('adm.control.sectores.ListaSector')

      ->with('productos',$productos)

      ->with('sectores_seccion', $servicio_seccion)

      ->with('sectores_edit', $servicio_create);

    }



    public function create()

    {

      $servicio_seccion ='active';

      $servicio_create = 'active';

        return view('adm.control.sectores.CrearSector')

        ->with('sectores_seccion', $servicio_seccion)

        ->with('sectores_create', $servicio_create);

    }



    public function store(Request $request)

    {

        $producto= new Sector($request->all());

        $producto->nombre = $request->nombre;

        $producto->orden= $request->orden;

        $id= Sector::all()->max('id');

        $newid= $id+1;

        if ($request->hasFile('imagen')) {

            if ($request->file('imagen')->isValid()) {

                $file = $request->file('imagen');

                $path = public_path('imagenes/sectores/');

                $request->file('imagen')->move($path, $newid.'_'.$file->getClientOriginalName());

                $producto->imagen = 'imagenes/sectores/' . $newid.'_'.$file->getClientOriginalName();

            }

        }

        $producto->save();


        return redirect()->route('sectores.index');

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





    public function edit($id)

    {

      $servicio_seccion ='active';

      $servicio_create = 'active';

        $producto = Sector::find($id);

        return view('adm.control.sectores.EditarSector')

        ->with('producto', $producto)

        ->with('sectores_seccion', $servicio_seccion)

        ->with('sectores_edit', $servicio_create);;

    }



    public function update(Request $request, $id)

    {

        $producto= Sector::find($id);

        $producto->nombre= $request->nombre;

        $producto->orden= $request->orden;

        $id= Sector::all()->max('id');

        $newid= $id+1;



        if ($request->hasFile('imagen')) {

            if ($request->file('imagen')->isValid()) {

                $file = $request->file('imagen');

                $path = public_path('imagenes/sectores/');

                $request->file('imagen')->move($path, $newid.'_'.$file->getClientOriginalName());

                $producto->imagen = 'imagenes/sectores/' . $newid.'_'.$file->getClientOriginalName();

            }

        }

        $producto->save();

        return redirect()->route('sectores.index');

    }





    public function destroy($id)

    {

        $producto= Sector::find($id);

        $producto -> delete();


        return redirect()->route('sectores.index');

    }

}

