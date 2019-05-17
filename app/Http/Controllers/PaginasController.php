<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Producto;
use App\Nuestra;
use App\Producto_general;
use App\Subproducto;
use App\Imagen;
use App\Metadato;
use App\Calidad;
use App\Calidad_descarga;
use App\Descarga;
use App\Home;
use App\Dato;
use App\Familia;
use App\General;
use App\Categoria;
use App\Sector;
use App\Subsector;
use App\Subsector_producto;
use App\Novedad;
use App\Buscador;
use App\Http\Requests\Contacto;
use App\Http\Requests\ContactoRequest;
use App\Mail\sendmail;
use Mail;

class PaginasController extends Controller
{
	public function index(){
        $metadato= metadato::where('seccion','home')->first();
        $slider= Slider::where('seccion','home')->orderBy('orden','ASC')->get();
        $producto= Producto::orderBy('orden','ASC')->get();
				$home = Home::all()->first();
				$active = 'index';
        return view('pages.home',[
            'sliders' => $slider,
            'productos' => $producto,
            'metadatos' => $metadato,
						'active' => $active,
						'home' => $home
        ]);
    }
    public function empresa(Request $request)
    {
        $metadato= metadato::where('seccion','empresa')->first();
        $slider= slider::where('seccion','empresa')->orderBy('orden','ASC')->get();
        $nuestra_empresa = Nuestra::all()->first();
				$active = 'empresa';
        return view('pages.empresa',[
            'metadatos' => $metadato,
            'sliders' => $slider,
            'nuestra' => $nuestra_empresa,
						'active' => $active
        ]);
    }
    public function galeria($id){
        
			 
			 $seleccionada = General::find($id);
			 
			 $familia = Familia::orderBy('orden','asc')->where('seccion',$seleccionada->seccion)->get();
			 $subfamilia = General::orderBy('orden','asc')->where('seccion',$seleccionada->seccion)->get();
			 
			 $metadato= Metadato::where('seccion','productos')->first();
			 $active='productos';
			 $galeria = Imagen::where('id_generales',$id)->orderBy('orden','asc')->get();
             $producto= Producto::orderBy('orden','ASC')->get();
			 return view('pages.galeria', [
					 'familias' => $familia,
					 'subfamilias' => $subfamilia,
					 'seleccionada' => $seleccionada,
					 'metadatos' => $metadato,
					 'active' => $active,
					 'galerias' => $galeria,
                     'productos' => $producto,
                    			 ]);
    }
    public function Novedades()
    {
			$categorias = Categoria::orderBy('orden','ASC')->get();
			$categorias2 = Categoria::orderBy('orden','ASC')->get();
			$novedades = Novedad::orderBy('orden','asc')->get();

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
		public function novedad($id)
    {
        $categorias = Categoria::orderBy('orden','ASC')->get();
        $categorias2 = Categoria::orderBy('orden','ASC')->get();
        $novedad = Novedad::where('id',$id)->first();
        $categorianove= Categoria::where('id',$novedad->id_categoria)->first();

        $metadato= Metadato::where('seccion','novedades')->first();
        $active='novedades';
        return view('pages.novedad', [
            'metadatos' => $metadato,
            'active' => $active,
            'categorias' => $categorias,
            'categorias2' => $categorias2,
            'novedad' => $novedad,
            'categorianove' => $categorianove
        ]);
    }

    public function calidad(){
        $metadato= Metadato::where('seccion','calidad')->first();
        $calidad= Calidad::all()->first();
				$descargas = Calidad_descarga::orderBy('orden', 'ASC')->get();
				$active = 'calidad';
        return view('pages.calidad',[
            'metadatos' => $metadato,
            'calidad' => $calidad,
						'descargas' => $descargas,
						'active' => $active
        ]);
    }

    public function descargas(){

        $metadato= Metadato::where('seccion','descargas')->first();
        $clientes= Descarga::orderBy('orden','ASC')->get();
        $slider= slider::where('seccion','descargas')->orderBy('orden','ASC')->get();
				$active = 'descargas';
        return view('pages.descarga',[
            'metadatos' => $metadato,
            'descargas' => $clientes,
            'sliders' => $slider,
			'active' => $active
        ]);
    }



    public function subproducto($id){

    	 $seleccionada = Familia::find($id);
    	 
         $familia = Familia::orderBy('orden','asc')->where('seccion',$seleccionada->seccion)->get();
         $subfamilia = General::orderBy('orden','asc')->where('seccion',$seleccionada->seccion)->get();
    	 $metadato= Metadato::where('seccion','productos')->first();
    	 $active=$seleccionada->seccion;
    	 return view('pages.subproducto', [
    			 'familias' => $familia,
    			 'subfamilias' => $subfamilia,
    			 'seleccionada' => $seleccionada,
    			 'metadatos' => $metadato,
    			 'active' => $active,
                 'titulo' => "Máquinas y Herramientas",
    	 ]);
    }

    public function maquinas()
    {
        $sliders= Slider::where('section','productos')->where('type','Maquinas y Herramientas')->get();
        $metadato= Metadato::where('seccion','productos')->first();
        $familias = Familia::orderBy('orden','ASC')->where('seccion','maquinas')->get();
        $subfamilia = General::orderBy('orden','asc')->where('seccion','maquinas')->get();
		$active='productos';
        return view('pages.productos',[
            'metadatos' => $metadato,
            'subfamilias' => $subfamilia,
            'familias' => $familias,
            'titulo' => "Máquinas y Herramientas",
			'active' => $active,
            'sliders' => $sliders,
        ]);
    }

    public function flejes()
    {
        $sliders= Slider::where('section','productos')->where('type','Flejes')->get();
        $metadato= Metadato::where('seccion','productos')->first();
        $familias = Familia::orderBy('orden','ASC')->where('seccion','flejes')->get();
        $subfamilia = General::orderBy('orden','asc')->where('seccion','flejes')->get();
        $active='productos';
        return view('pages.productos',[
            'metadatos' => $metadato,
            'subfamilias' => $subfamilia,
            'familias' => $familias,
            'titulo' => "Flejes",
            'active' => $active,
            'sliders' => $sliders,
        ]);
    }

    public function articulosembalaje()
    {
        $sliders= Slider::where('section','productos')->where('type','Articulos de Embalaje')->get();
        $metadato= Metadato::where('seccion','productos')->first();
        $familias = Familia::orderBy('orden','ASC')->where('seccion','embalaje')->get();
        $subfamilia = General::orderBy('orden','asc')->where('seccion','embalaje')->get();
        $active='productos';
        return view('pages.productos',[
            'metadatos' => $metadato,
            'subfamilias' => $subfamilia,
            'familias' => $familias,
            'titulo' => "Artículos de Embalaje",
            'active' => $active,
            'sliders' => $sliders,
        ]);
    }

    public function selloshebillas()
    {
        $sliders= Slider::where('section','productos')->where('type','Sellos y Hebillas')->get();
        $metadato= Metadato::where('seccion','productos')->first();
        $familias = Familia::orderBy('orden','ASC')->where('seccion','sellos')->get();
        $subfamilia = General::orderBy('orden','asc')->where('seccion','sellos')->get();
        $active='productos';
        return view('pages.productos',[
            'metadatos' => $metadato,
            'subfamilias' => $subfamilia,
            'familias' => $familias,
            'titulo' => "Sellos y Hebillas",
            'active' => $active,
            'sliders' => $sliders,
        ]);
    }
    

    public function contacto(Request $request){
        $metadato= Metadato::where('seccion','contacto')->first();
				$active = 'contacto';
        return view('pages.contacto',[
            'metadatos' => $metadato,
						'active' => $active
        ]);
    }
    public function sectores($id){
        $sliders= Slider::where('section','sectores')->get();
        $metadato= Metadato::where('seccion','sectores')->first();
        $sectores = Sector::orderBy('orden','asc')->get();
        if($id==0)
            $subsector = Subsector::where('id_sector',$sectores->first()->id)->get();
        else
            $subsector = Subsector::where('id_sector',$id)->get();

        $active = null;
        return view('pages.sector',[
            'metadatos' => $metadato,
            'sectores' => $sectores,
            'active' => $active,               
            'subsectores' => $subsector,
            'sliders' => $sliders,
        ]);
    }
    public function subsectores($id){
        $productos = General::orderBy('orden','asc')->get();
        $productos_selected = Subsector_producto::where('id_subsector', $id)->get();
        $metadato= Metadato::where('seccion','sectores')->first();
        $sectores = Sector::orderBy('orden','asc')->get();
        $sector_selected = Subsector::find($id);
        $subsector = Subsector::where('id_sector',$sector_selected->id_sector)->get();
        $active = null;
        return view('pages.subsector',[
            'metadatos' => $metadato,
            'sectores' => $sectores,
            'active' => $active,               
            'subsectores' => $subsector,
            'productos' =>  $productos,
            'productos_selected' => $productos_selected,
        ]);
    }
    public function buscador_productos(Request $request){
        $metadatos= Metadato::where('seccion','productos')->first();
        $buscadores= Buscador::all();
        return view('pages.buscador_productos',[
            'metadatos' => $metadatos,
            'active' => null,               
            'buscadores' => $buscadores,
        ]);

    }
    public function buscar(Request $request){
        $metadatos= Metadato::where('seccion','productos')->first();
        $imagenes = Imagen::orderBy('orden','ASC')->get();
        $productos = null;
				$active = "buscador";
        if($request){
            if($request->buscar){
                $productos = Familia::where('nombre','like','%'.$request->buscar.'%')->get();
								$subproductos = General::where('titulo','like','%'.$request->buscar.'%')->get();
            }
        }


        return view('pages.buscador',compact('productos','metadatos','imagenes','subproductos','active'));
    }
    public function buscar_opciones(Request $request){
  
        $metadatos= Metadato::where('seccion','productos')->first();
        $imagenes = Imagen::orderBy('orden','ASC')->get();
        $productos = null;
				$active = "buscador";
        if($request){
            if($request->flejar == null){
                $request->flejar = 0;
            }
            if($request->sistema == null){
                $request->sistema = 0;
            }
            if($request->tipo == null){
                $request->tipo = 0;
            }
            if($request->cantidad == null){
                $request->cantidad = 0;
            }
            if($request->flejar || $request->sistema || $request->tipo || $request->cantidad){
                $productos = General::where('flejar', $request->flejar)->orWhere('sistema', $request->sistema)->orWhere('tipo', $request->tipo)->orWhere('cantidad', $request->cantidad)->get();
                $subproductos = General::where('flejar', $request->flejar)->orWhere('sistema', $request->sistema)->orWhere('tipo', $request->tipo)->orWhere('cantidad', $request->cantidad)->get();
								
						
            }
        }

        return view('pages.buscador',compact('productos','metadatos','imagenes','subproductos','active'));
    }
    /*---------------------------------AQUI ----------*/

    public function mail(ContactoRequest $request){
        $correo = Dato::where('tipo','mail')->first();
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $empresa = $request->empresa;
        $email = $request->email;
        $mensaje = $request->mensaje;
        Mail::to('angelicabaca4@gmail.com')->send(new sendmail($nombre, $apellido, $empresa, $email, $mensaje));

        if(Mail::failures()){
            flash('Ha ocurrido un error')->error()->important();
            return redirect()->route('contacto');
        }
        flash('El mensaje se ha enviado exitosamente')->success()->important();
            return redirect()->route('contacto');
    }
    public function enviar_presupuesto(Contacto $request)
    {
        $dato= Dato::where('tipo','mail')->first();
        $nombre= $request->nombre;
        $localidad= $request->localidad;
        $telefono= $request->telefono;
        $email= $request->email;
        $plano= $request->plano;
        $newid = Imagen::all()->max('subproducto_id');
        $mensaje= $request->mensaje;
        $newid++;
        if ($request->hasFile('archivo')) {
            if ($request->file('archivo')->isValid()) {
                $file = $request->file('archivo');
                $path = public_path('img/archivos/');
                $request->file('archivo')->move($path, $newid.'_'.$file->getClientOriginalName());
                $archivo = 'img/archivos/' . $newid.'_'.$file->getClientOriginalName();

            }
        }

        //Mail::to($dato)->send(new sendpresupuesto($nombre,$localidad,$email,$telefono,$mensaje,$plano,$archivo));

        Mail::send('pages.enviarpresupuesto', ['nombre' => $nombre, 'localidad' => $localidad, 'email' => $email, 'telefono' => $telefono, 'mensaje' => $mensaje, 'plano' => $plano], function ($message) use ($archivo){

            $message->from('cercas@osolelaravel.com', 'Cercas');

            $message->to('angelicabaca4@gmail.com');

            //Attach file
            $message->attach($archivo);

            //Add a subject
            $message->subject("Hello from Scotch");

        });
        if (Mail::failures()) {
            flash('Ha ocurrido un error.')->error()->important();
            return redirect()->route('presupuesto');
        }
        flash('El mensaje se ha enviado exitosamente.')->success()->important();
        return redirect()->route('presupuesto');
    }

/*----------------------------------------------------------------------------------------*/
}
