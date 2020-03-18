<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'historico';

    protected $fillable = [

        'id', 'dependencia', 'cambs', 'progresivo', 'no_empleado', 'fecha_asignacion', 'edificio', 'piso', 'estado', 'observaciones', 'status', 'created_at','updated_at'
    ];
}
