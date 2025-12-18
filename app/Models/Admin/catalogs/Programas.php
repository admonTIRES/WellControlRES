<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    use HasFactory;
    protected $table = 'programs';
    protected $primaryKey = 'ID_CATALOGO_PROGRAMA';
    protected $fillable = [
        'NOMBRE_PROGRAMA', 
        'MIN_PORCENTAJE_APROB',
        'MAX_PORCENTAJE_APROB',
        'OPCION_RESIT',
        'MIN_PORCENTAJE_REPROB_RE',
        'MAX_PORCENTAJE_REPROB_RE',
        'MIN_PORCENTAJE_REPROB',
        'MAX_PORCENTAJE_REPROB',
        'OPCION_RESIT_PERMITIDAS',
        'PERIODO_RESIT',
        'ACTIVO_PROGRAMA',
        'ACCREDITATION_ENTITIES_PROGRAM',
        'LEVELS_PROGRAM',
        'BOPS_PROGRAM',
        'OPERATIONS_PROGRAM',
        'COMPLEMENTS_PROGRAM'
    ];
     protected $casts = [
        'LEVELS_PROGRAM' => 'array',
        'BOPS_PROGRAM' => 'array',
        'OPERATIONS_PROGRAM' => 'array'
    ];
}
