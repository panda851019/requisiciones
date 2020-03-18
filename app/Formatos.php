<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formatos extends Model
{
    protected $table = 'formatos';

    protected $fillable = [
       'id','formato', 'status', 'updated_at', 'created_at'
    ];
}
