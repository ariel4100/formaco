<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use config;

class IdiomaController extends Controller
{
    public function cambiarIdioma(Request $request, $idioma){

    	$request->session()->put('idioma', $idioma);

    	return back();
    }
}
