<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OficiosBajas extends Model
{

    protected $table = 'oficios_bajas';

    protected $fillable = [
        'id', 'oficio_baja', 'updated_at', 'created_at', 'status','status_recepcion'
    ];
}
