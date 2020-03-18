<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguimientoABDF extends Model
{
    protected $table = 'segumiento_rep_abdf';

    protected $fillable = [
        'id','nombre_doc', 'f_ini_periodo', 'f_fin_periodo', 'id_elaboro', 'descripcion_elaboro', 
        'fecha_elaboro', 'id_reviso','descripcion_reviso','fecha_reviso','id_autorizo','descripcion_autorizo',
        'estatus_recepcion','updated_at','created_at','status','recep_generado','id_vobo','fecha_vobo',
        'descripcion_vobo','verifica_vobo'
    ];
}