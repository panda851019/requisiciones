<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratosAlmBienes extends Model
{
    protected $table = 'contratos_aibienes';

    protected $fillable = [
        'id', 'dependencia', 'almacen',  'contrato', 'id_cambsgrp', 'marca', 'modelo', 'serie', 'cantidad', 'costo_unit', 'impuesto', 'valida', 'status', 'updated_at', 'created_at' 
    ];
}
