<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = [
        'id','unidad', 'dependencia', 'cambs', 'progresivo', 'tipo_unidad', 'procedencia', 'clave_causa_alta', 'fecha_alta', 'estado', 'factura', 'costo_alta', 'marca', 'submarca', 'serie', 'modelo',  'motor',  'placa', 'genero', 'criadero', 'nombrecientifico', 'contrato', 'area_enlace', 'status_resg', 'status_baja', 'updated_at', 'created_at', 'status'
    ];
   protected $primaryKey = 'id';
    public $timestamps = true;
    //public $incrementing = false;
}
