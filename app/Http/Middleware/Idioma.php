<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Idioma
{
    public function handle($request, Closure $next)
    {
        $idioma = "es";

        if($request->session()->has('idioma')) {
            $idioma = $request->session()->get('idioma');
        }

        App::setLocale($idioma);

        view()->share('idioma', $idioma);

        return $next($request);
    }
}
