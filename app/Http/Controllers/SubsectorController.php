<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Subsector;
use App\Subsector_producto;
use App\Sector;
use App\General;

class SubsectorController extends Controller

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

      $productos= Subsector::orderBy('orden','asc')->get();
      $sectores = Sector::orderBy('orden', 'asc')->get();
      return view('adm.control.sectores.ListaSubsector')

      ->with('productos',$productos)
      ->with('sectores', $sectores)
      ->with('sectores_seccion', $servicio_seccion)
      ->with('subsectores_edit', $servicio_create);

    }



    public function create()

    {

      $servicio_seccion ='active';
      $servicio_create = 'active';
      $query = Sector::all();
      $productos = General::all();
      $familias = [];
      foreach ($query as $familia) {
          $familias[$familia->id] = $familia->nombre;
      }
      return view('adm.control.sectores.CrearSubsector')
      ->with('sectores_seccion', $servicio_seccion)
      ->with('familias',$familias)
      ->with('productos',$productos)
      ->with('subsectores_create', $servicio_create);

    }



    public function store(Request $request)

    {

        $subsector= new Subsector($request->all());

        $subsector->nombre = $request->nombre;
        $subsector->id_sector= $request->id_sector;
        $subsector->orden= $request->orden;

        $id= Subsector::all()->max('id');

        $newid= $id+1;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('imagenes/sectores/');
                $request->file('imagen')->move($path, $newid.'_'.$file->getClientOriginalName());
                $subsector->imagen = 'imagenes/sectores/' . $newid.'_'.$file->getClientOriginalName();
            }

        }

        $subsector->save();

        $delete= Subsector_producto::where('id_subsector',$newid)->get();
        foreach ($delete as $d) {
          $d->delete();
        }
        if($request->producto){
        foreach ($request->producto as $producto_selected) {


          $colores = new Subsector_producto();
          $colores->id_subsector = $newid;
          $colores->id_producto = $producto_selected;
          $colores->save();
        }
        }
        return redirect()->route('subsectores.index');

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





    public function edit($id){

      $servicio_seccion ='active';

      $servicio_create = 'active';

        $producto = Subsector::find($id);
        $familias = Sector::all();
        $productos = General::all();
        $selects= Subsector_producto::where('id_subsector',$id)->get();

        return view('adm.control.sectores.EditarSubsector')
        ->with('producto', $producto)
        ->with('familias', $familias)
        ->with('selects',$selects)
        ->with('productos', $productos)
        ->with('sectores_seccion', $servicio_seccion)
        ->with('subsectores_edit', $servicio_create);
    }



    public function update(Request $request, $id)

    {

        $producto= Subsector::find($id);

        $producto->nombre= $request->nombre;
        $producto->id_sector= $request->id_sector;
        $producto->orden= $request->orden;

        $id= Subsector::all()->max('id');

        $newid= $id+1;

        if ($request->hasFile('imagen')) {

            if ($request->file('imagen')->isValid()) {

                $file = $request->file('imagen');

                $path = public_path('imagenes/sectores/');

                $request->file('imagen')->move($path, $newid.'_'.$file->getClientOriginalName());

                $producto->imagen = 'imagenes/sectores/' . $newid.'_'.$file->getClientOriginalName();

            }

        }

        $delete= Subsector_producto::where('id_subsector',$producto->id)->get();
        foreach ($delete as $d) {
          $d->delete();
        }
        if($request->producto_selected){
        foreach ($request->producto_selected as $producto_selected) {
          $colores = new Subsector_producto();
          $colores->id_subsector = $producto->id;
          $colores->id_producto = $producto_selected;
          $colores->save();
        }
        }
   
        $producto->save();

        return redirect()->route('subsectores.index');

    }





    public function destroy($id)

    {

        $producto= Subsector::find($id);

        $producto -> delete();

        return redirect()->route('subsectores.index');

    }

}

