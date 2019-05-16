<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Home extends Authenticatable
{
    protected $table = "homes";
    protected $fillable = [
        'titulo', 'subtitulo', 'contenido', 'link', 'imagen'
    ];
}
