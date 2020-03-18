<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventFisico extends Model
{
	protected $table = 'invfis_actividades';

	protected $fillable = [
    'id','dependencia', 'anio', 'actividad', 'p_m01', 'r_m01', 'p_m02', 'r_m02', 'p_m03', 'r_m03', 'p_m04', 'r_m04', 
    'p_m05', 'r_m05','p_m06', 'r_m06', 'p_m07', 'r_m07', 'p_m08', 'r_m08', 'p_m09', 'r_m09', 'p_m10', 'r_m10', 
    'p_m11', 'r_m11', 'p_m12', 'r_m12','actividad', 'status', 'updated_at', 'created_at'
    ];
}