<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','dependencia', 'contrato','fecha_contrato','requisicion','par_pre', 'monto', 'proveedor', 'fecha_entrega_1', 'fecha_entrega_2', 'descrip_bienes','descrip_tec','no_factura','no_folio', 'observaciones', 'status','created_at','updated_at'
    ];
    public $timestamps = true;
    //$hidden = ['created_at','updated_at'];

}
