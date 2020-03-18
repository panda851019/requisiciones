<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauDestFinal extends Model
{
    protected $table = 'cat_destfinal';

    protected $fillable = [
        'id', 'clave', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
