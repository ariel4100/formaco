<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuarioRequest;
use App\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuario = User::orderBy('id','ASC')->get();
        $usuario_seccion = 'active';
        $usuario_edit = 'active';
        return view('adm.control.usuario.ListaUsuario')
        ->with('usuarios',$usuario)
        ->with('usuario_seccion',$usuario_seccion)
        ->with('usuario_edit',$usuario_edit);
    }

    public function create()
    {
        $usuario_seccion = 'active';
        $usuario_create = 'active';
        return view('adm.control.usuario.CrearUsuario')
        ->with('usuario_seccion',$usuario_seccion)
        ->with('usuario_create',$usuario_create);
    } 

    public function store(UsuarioRequest $request)
     {
        $usuario = new User();
        $usuario->nombre= ucfirst(trans($request->nombre));
        $usuario->username = $request->username;
        $usuario->password= \Hash::make($request->password);
        $usuario->nivel = $request->nivel;
        $usuario->checking = $request->checking;
        $usuario->save();
        return redirect()->route('usuario.index');
    }
    public function store_privado(Request $request)
     {
        $usuario = new User();
        $usuario->nombre= $request->nombre;
        $usuario->apellido= $request->apellido;
        $usuario->username = $request->username;
        $usuario->password= \Hash::make($request->password);
        $usuario->nivel = 'privado';
        $usuario->checking = "Inactivo";
        $usuario->save();
        return redirect()->route('index');
    }

    public function authentificate (UsuarioRequest $request) {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'nivel' => 'administrador'])) {
            return view('adm.cuerpo')->
            with('usuario',$request);
        }
        else{
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'nivel' => 'usuario'])) {
                return view('adm.cuerpo')->
                with('usuario',$request);
            }
            else {
                flash('Credenciales incorrectas')->error()->important();
                return redirect()->route('usuario.login');
            }
        }
    }
    public function privado (Request $request) {
        dd("H");
        $user = User::where('username',$request->username)->first();
        if($user->checking == "Activo"){
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'nivel' => 'privado']) ) {
                $metadato= metadato::where('seccion','home')->first();
                return view('zonaprivada',[
                'metadatos' => $metadato
                ]);
            }
            else {
                return redirect()->route('index');
            }
        }
        else {
            return redirect()->route('index');
        }
    }
    public function login(){
        return view('adm.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('usuario.login');
    }

    public function edit($id)
    {
        $usuario = user::find($id);
        $usuario_seccion = 'active';
        $usuario_edit = 'active';
        return view('adm.control.usuario.EditarUsuario')
        ->with('usuarios',$usuario)
        ->with('usuario_seccion',$usuario_seccion)
        ->with('usuario_edit',$usuario_edit);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $usuario=User::find($id);
        $usuario->nombre= ucfirst(trans($request->nombre));
        $usuario->username=$request->username;
        $usuario->nivel=$request->nivel;
        $usuario->checking =  $request->checking;
        if($request->password != $usuario->password){
            $usuario->password= \Hash::make($request->password);
        }
        
        $usuario->save();
        
        return redirect()->route('usuario.index');
    }


    public function destroy($id)
    {
        $usuario= User::find($id);
        $usuario -> delete();
        return redirect()->route('usuario.index');
    }
}
