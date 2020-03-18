
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resguardos extends Model
{
    protected $table = 'resguardos';

    protected $fillable = [
        'id','dependencia', 'cambs', 'progresivo', 'fecha_asignacion', 'no_empleado', 'edificio', 'piso', 'estado', 'observaciones', 'status', 'updated_at', 'created_at'
    ];
}