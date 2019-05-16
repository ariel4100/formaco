<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
Route::group(['middleware' => 'idioma'], function() {


	Route::resource('/','PaginasController');
	Route::get('empresa',[
		'uses' => 'PaginasController@empresa',
		'as' => 'empresa'
	]);
	Route::get('galeria/{id}',[
		'uses' => 'PaginasController@galeria',
		'as' => 'galeria'
	]);
	Route::get('novedades',[
		'uses' => 'PaginasController@novedades',
		'as' => 'novedades'
	]);
	Route::get('novedad/{id}',[
		'uses' => 'PaginasController@novedad',
		'as' => 'novedad'
	]);
	Route::get('calidad',[
		'uses'=>'PaginasController@calidad',
		'as'=>'calidad'
	]);
	Route::get('descargas',[
		'uses'=>'PaginasController@descargas',
		'as'=>'descargas'
	]);
	Route::get('contacto',[
		'uses' => 'PaginasController@contacto',
		'as' => 'contacto'
	]);
	Route::get('producto/{id}',[
		'uses'=>'PaginasController@subproducto',
		'as'=>'subproducto'
	]);

	Route::get('maquinas-herramientas',[
		'uses' => 'PaginasController@maquinas',
		'as' => 'maquinas-herramientas'
	]);
	Route::get('flejes',[
		'uses' => 'PaginasController@flejes',
		'as' => 'flejes'
	]);
	Route::get('articulos-embalaje',[
		'uses' => 'PaginasController@articulosembalaje',
		'as' => 'articulos-embalaje'
	]);
	Route::get('sellos-hebillas',[
		'uses' => 'PaginasController@selloshebillas',
		'as' => 'sellos-hebillas'
	]);
	Route::get('buscador-productos',[
		'uses' => 'PaginasController@buscador_productos',
		'as' => 'buscador-productos'
	]);
	Route::post('enviar_presupuesto',[
		'uses'=>'PaginasController@enviar_presupuesto',
		'as'=>'enviar_presupuesto'
	]);
	Route::get('sectores/{id}',[
		'uses'=>'PaginasController@sectores',
		'as'=>'sectores'
	]);
	Route::get('sectores/subsector/{id}',[
		'uses'=>'PaginasController@subsectores',
		'as'=>'subsectores'
	]);
	Route::post('productos/buscar',[
		'uses'=>'PaginasController@buscar',
		'as'=>'buscar'
	]);
	Route::post('productos/buscar/opciones',[
		'uses'=>'PaginasController@buscar_opciones',
		'as'=>'buscar_opciones'
	]);
	Route::post('enviar-mail',[
		'uses'=>'PaginasController@mail',
		'as'=>'mail'
	]);
Route::resource('buscarnove','BuscarController');
	Route::get('idioma/{idioma}', 'IdiomaController@cambiarIdioma');
});
Route::group(['prefix' => 'adm'], function(){
	/*-----------------------login administrador----------------------------*/

    Route::post('usuario/authentificate', [
		'uses' => 'UsuarioController@authentificate',
		'as'   => 'usuario.authentificate'
	]);
	Route::post('usuario/privado', [
		'uses' => 'UsuarioController@privado',
		'as'   => 'usuario.privado'
	]);
	Route::post('usuario/store/privado', [
		'uses' => 'UsuarioController@store_privado',
		'as'   => 'usuario.store_privado'
	]);
	Route::get('/', [
		'uses' => 'UsuarioController@login',
		'as'   => 'usuario.login'
	]);
	Route::get('logout', [
		'uses' => 'UsuarioController@logout',
		'as'   => 'usuario.logout'
	]);
});

Route::group(['prefix' => 'adm', 'middleware' => 'admin'], function(){

    /*------------usuario----------------*/
    Route::get('usuario/{id}/destroy',[
			'uses'=>'UsuarioController@destroy',
			'as'=>'usuario.destroy'
	]);
    Route::resource('usuario', 'UsuarioController');
	/*----------slider-----------*/

    Route::get('sliders/create-empresa',[
				'uses'=>'SliderController@create_empresa',
				'as'=>'sliders.create_empresa'
    ]);
    Route::get('sliders/empresa',[
				'uses'=>'SliderController@index_empresa',
				'as'=>'sliders.index_empresa'
    ]);
     Route::get('sliders/create-descargas',[
				'uses'=>'SliderController@create_descargas',
				'as'=>'sliders.create_descargas'
    ]);
    Route::get('sliders/descargas',[
				'uses'=>'SliderController@index_descargas',
				'as'=>'sliders.index_descargas'
    ]);
    Route::get('sliders/{id}/destroy',[
			'uses'=>'SliderController@destroy',
			'as'=>'sliders.destroy'
	]);
	Route::resource('sliders','SliderController');
	/*-----------buscador----------*/
	Route::get('buscador/{id}/destroy',[
			'uses'=>'BuscadoresController@destroy',
			'as'=>'buscadores.destroy'
	]);
	Route::resource('buscadores','BuscadoresController');

    /*-------redes -------------*/
    Route::get('redes/{id}/destroy',[
				'uses'=>'RedController@destroy',
				'as'=>'redes.destroy'
		]);
	Route::resource('redes','RedController');

    /*----------productos-----------*/
	Route::resource('productos-destacados','ProductosController');

    /*----------Contenido-----------*/
	Route::resource('contenido','ContenidoController');

    /*-------logos -------------*/
    Route::resource('logos','LogoController');
    /*----------productos generales-----------*/
    Route::resource('calidades','CalidadController');
	/*----------Subproducto-----------*/

    Route::get('subproducto/{id}/destroy',[
			'uses'=>'SubproductoController@destroy',
			'as'=>'subproducto.destroy'
	]);
	Route::resource('subproducto','SubproductoController');
	/*---------Categorias-----------*/

    Route::get('categoria/{id}/destroy',[
			'uses'=>'CategoriaController@destroy',
			'as'=>'categorias.destroy'
	]);
	Route::post('categoria/update_categoria',[
		'uses'=>'CategoriaController@update_categoria',
		'as'=>'categorias.update_categoria'
]);
	Route::resource('categorias','CategoriaController');
	  /*----------galeria de trabajos -----------*/
	Route::get('galeria/{id}/create',[
			'uses'=>'ImagenesController@create_galeria',
			'as'=>'galerias.create_galeria'
	]);
    Route::get('galeria/{id}/index',[
			'uses'=>'ImagenesController@index_galeria',
			'as'=>'galerias.index_galeria'
	]);
	Route::get('galeria/{id}/destroy',[
			'uses'=>'ImagenesController@destroy',
			'as'=>'galerias.destroy'
	]);
	Route::resource('galerias','ImagenesController');

	/*------- Metadato-------------*/
    Route::resource('metadatos','MetadatoController');

	/*---------Calidad -----------*/
	Route::get('calidad/descarga/{id}/destroy',[
			'uses'=>'DescargaCalidadController@destroy',
			'as'=>'descargas_calidad.destroy'
	]);
	Route::resource('descargas_calidad','DescargaCalidadController');
	/*---------Productos -----------*/
	Route::get('producto/{id}/destroy',[
			'uses'=>'ProductoController@destroy',
			'as'=>'producto.destroy'
	]);
	Route::resource('producto','ProductoController');
	/*---------sectores -----------*/
	Route::get('sectores/{id}/destroy',[
			'uses'=>'ProductoController@destroy',
			'as'=>'sectores.destroy'
	]);
	Route::resource('sectores','SectoresController');
	/*--------- subsectores -----------*/
	Route::get('subsectores/{id}/destroy',[
			'uses'=>'SubsectorController@destroy',
			'as'=>'subsectores.destroy'
	]);
	Route::resource('subsectores','SubsectorController');
	/*-------------Compromiso--------------*/
	Route::resource('descargas','DescargaController');
	/*-------------Compromiso--------------*/
	Route::resource('novedades','NovedadesController');
	/*------- Datos de la empresa-------------*/
    Route::resource('datos','DatoController');
    /*------------Home----------------*/
    Route::resource('home', 'HomeController');
});
