<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelAcreditacion extends Model
{
    protected $table = 'nivel_acreditacion';
    protected $primaryKey = 'ID_CATALOGO_NIVELACREDITACION';
    protected $fillable = [
        'NOMBRE_NIVEL', 
        'DESCRIPCION_NIVEL', 
        'ACTIVO_NIVEL'
    ];
}
