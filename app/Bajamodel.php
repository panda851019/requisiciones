<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bajamodel extends Model
{
    protected $table = 'bajas';

    protected $fillable = [
         'id', 'dependencia', 'cambs', 'progresivo', 'procedencia', 'clave_causa_baja', 'fecha_baja', 'costo_estim', 'acta_num', 'b_observaciones', 'clave_destfinal', 'acta_dest', 'fecha_dest', 'valor_avaluo', 'valor_venta', 'f_observaciones', 'status', 'updated_at', 'created_at'
    ];
    protected $primaryKey = 'id';
}