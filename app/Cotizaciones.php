<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
   protected $table = 'cotizaciones';

    protected $fillable = [
          'id', 'dependencia', 'no_requisicion', 'id_biereq', 'precio_unit', 'impuesto', 'meses', 
          'rfc_proveedor', 'no_cotizacion', 'vigencia', 'plazo_entrega', 'integr_nac', 'pais_origen', 'garantia', 'forma_pago', 
          'repre_legal','subtotal','iva','total','status', 'updated_at', 'created_at'
    ];
}
