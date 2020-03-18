<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class V_02ConsolidadoResg extends Model
{
    protected $table = 'V_02ConsolidadoResg';

    protected $fillable = [

        'dependencia', 'area_enlace', 'descripcion', 'cant_area', 'cant_resg'

    ];
}
