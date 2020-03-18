<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoBaja extends Model
{
    protected $table = 'proceso_baja';

    protected $fillable = [

        'id', 'dependencia', 'cambs', 'progresivo', 'no_oficio', 'no_acta', 'fecha', 'dictamen', 'verifica','clave_causa_baja', 'verifica', 'valida', 'clasifica_almacen', 'fecha_recep', 'fecha_clasifica', 'fecha_salida', 'status', 'updated_at', 'created_at'
    ];
}
