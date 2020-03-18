<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoliosDepen extends Model
{
    protected $table = 'folios_depen';
    protected $fillable = [
        'id', 'clave_num', 'no_folio', 'folio_ent', 'folio_sal', 'folio_req','folio_cot', 'status', 'updated_at', 'created_at'
    ];
}
