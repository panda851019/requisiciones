<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormatosUsuarios extends Model
{
    protected $table = 'formatos_usuarios';

    protected $fillable = [
       'id','dependencia','id_area_enlace', 'id_formato', 'recibe_envia','nombre','puesto', 'rfc','status', 'updated_at', 'created_at'
    ];
}
