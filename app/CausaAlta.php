<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CausaAlta extends Model
{
    protected $table = 'cat_altas';

    protected $fillable = [
        'id', 'clave_causa_alta', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
