<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionesBienes extends Model
{
   protected $table = 'cotizaciones_bienes';

    protected $fillable = [
          'id','dependencia','folio_cot','id_bienreq','precio_unit','impuesto','meses','otros','status','updated_at','created_at'
    ];
}





