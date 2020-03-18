<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratosAlm extends Model
{
    protected $table = 'contratos_ai';

    protected $fillable = [
        'id', 'dependencia', 'almacen', 'contrato', 'fecha_contrato', 'fecha_entregaini', 'fecha_entregafin', 
        'proveedor', 'requisicion', 'marca','status', 'updated_at', 'created_at' ];
}
