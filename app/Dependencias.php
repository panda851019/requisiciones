<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
  	protected $table = 'cat_dependencias';

    protected $fillable = [
        'id', 'clave', 'sector', 'descripcion','clave_num', 'tipo_almacen', 'id_asesor', 'status', 'updated_at', 'created_at'
    ];
}

