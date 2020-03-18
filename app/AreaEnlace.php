<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaEnlace extends Model
{
    protected $table = 'cat_areas';

    protected $fillable = [
        'id','dependencia', 'id_area', 'clave', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
