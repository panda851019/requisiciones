<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CausaBaja extends Model
{
    protected $table = 'cat_bajas';

    protected $fillable = [
        'id','clave_causa_baja', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
