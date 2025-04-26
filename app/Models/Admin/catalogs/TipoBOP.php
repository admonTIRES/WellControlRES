<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBOP extends Model
{
    protected $table = 'tipo_bop';
    protected $primaryKey = 'ID_CATALOGO_TIPOBOP';
    protected $fillable = [
        'ABREVIATURA', 
        'DESCRIPCION_TIPOBOP', 
        'ACTIVO_TIPOBOP'
    ];
}
