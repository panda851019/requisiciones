<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoFisico extends Model
{
    protected $table = 'cat_edo_fisico';

    protected $fillable = [
        'id','descripcion', 'status', 'updated_at', 'created_at'
    ];
}
