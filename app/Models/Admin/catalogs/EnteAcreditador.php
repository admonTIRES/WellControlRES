<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnteAcreditador extends Model
{
    protected $table = 'entes_acreditadores';
    protected $primaryKey = 'ID_CATALOGO_ENTE';
    protected $fillable = [
        'NOMBRE_ENTE', 
        'DESCRIPCION_ENTE', 
        'ACTIVO_ENTE'
    ];

}
