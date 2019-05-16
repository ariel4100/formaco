<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Calidad extends Authenticatable
{
    protected $table = "calidad";
    protected $fillable = [
        'titulo', 'subtitulo', 'imagen', 'titulo_img', 'contenido'
    ];
}
