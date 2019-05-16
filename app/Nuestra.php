<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nuestra extends Authenticatable
{
    protected $table = "nuestra_empresa";
    protected $fillable = [
        'titulo', 'contenido', 'subtitulo', 'imagen'
    ];
}
