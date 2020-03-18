<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
       'id', 'dependencia', 'area_depen', 'no_empleado', 'nombre', 'codigo_area', 'adscrip_cargo', 'status', 'created_at', 'updated_at'
    ];
}
