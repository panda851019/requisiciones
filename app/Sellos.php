<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellos extends Model
{
    protected $table = 'sellos';

    protected $fillable = [
     'id','dependencia', 'id_requisicion', 
     'nombre_tramita', 'cadena_original_tramita', 'folio_conulta_tramita','sello_tramita', 'fecha_firma_tramita',
     'nombre_solicita','cadena_original_solicita','folio_conulta_solicita','sello_solicita', 'fecha_firma_solicita',
     'nombre_autoriza', 'cadena_original_autoriza', 'folio_conulta_autoriza','sello_autoriza', 'fecha_firma_autoriza',
     'nombre_autorizadf','cadena_original_autorizadf','folio_conulta_autorizadf','sello_autorizadf','fecha_firma_autorizadf','status', 'update_at', 'created_at'
    ];

     public $timestamps = true;

}
