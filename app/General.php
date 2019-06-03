<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class General extends Authenticatable
{
    protected $table = "generales";
    protected $fillable = [
        'id_familia', 'titulo', 'tabla', 'contenido', 'imagen_destacada', 'descarga', 'orden', 'id_subsector','status'
    ];
}
