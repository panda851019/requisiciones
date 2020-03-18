<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisicionesBienes extends Model
{
    protected $table = 'requisiciones_bienes';

    protected $fillable = [
 		'id','dependencia','no_requisicion','id_cabmsgrp','cantidad','status','updated_at','created_at'
    ];
}
