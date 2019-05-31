<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoRelacionados extends Model
{
    protected $table = "producto_relacionados";

    protected $fillable = [
        'producto','producto_id'
    ];
}
