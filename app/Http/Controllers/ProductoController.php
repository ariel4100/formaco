<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Familia;

class ProductoController extends Controller

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

      $productos= Familia::orderBy('orden','asc')->get();

      return view('adm.control.producto.ListaProducto')

      ->with('productos',$productos)

      ->with('producto_seccion', $servicio_seccion)

      ->with('producto_edit', $servicio_create);

    }



    public function create()

    {

      $servicio_seccion ='active';

      $servicio_create = 'active';

        return view('adm.control.producto.CrearProducto')

        ->with('producto_seccion', $servicio_seccion)

        ->with('producto_create', $servicio_create);

    }



    public function store(Request $request)

    {

        $producto= new Familia($request->all());

        $producto->nombre = $request->nombre;

        $producto->orden= $request->orden;
        $producto->seccion= $request->seccion;

        $id= Familia::all()->max('id');

        $newid= $id+1;

        $producto->save();

        return redirect()->route('producto.index');

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

        $producto = Familia::find($id);

        return view('adm.control.producto.editarProducto')

        ->with('producto', $producto)

        ->with('producto_seccion', $servicio_seccion)

        ->with('producto_edit', $servicio_create);;

    }



    public function update(Request $request, $id)

    {

        $producto= Familia::find($id);

        $producto->nombre= $request->nombre;
        $producto->seccion= $request->seccion;
        $producto->orden= $request->orden;

        $id= Familia::all()->max('id');

        $newid= $id+1;



       

        $producto->save();


        return redirect()->route('producto.index');

    }





    public function destroy($id)

    {

        $producto= Familia::find($id);

        $producto->delete();


        return redirect()->route('producto.index');

    }

}

