<?php

namespace App\Models\Admin\Exercise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Killsheets extends Model
{
    use HasFactory;

    protected $table = 'killsheet';
    protected $primaryKey = 'ID_KILLSHEET';
    protected $fillable = [
        'ID_KILLSHEET_SOLUTION',
        'ENTE_KILLSHEET',
        'NIVELES_KILLSHEET',
        'BOP_KILLSHEET',
        'OPERACION_KILLSHEET',
        'LANGUAGE_KILLSHEET',
        'DATOS_POZO',
        'CAPACIDADES_INTERNAS',
        'CAPACIDADES_ANULARES',
        'BOMBA_LODO',
        'TASA_REDUCIDA',
        'OTRA_INFORMACION',
        'PRUEBA_FORMACION',
        'INFLUJO'
       
    ];


    protected $casts = [
        'ENTE_KILLSHEET' => 'array',
        'NIVELES_KILLSHEET' => 'array',
        'BOP_KILLSHEET' => 'array',
        'OPERACION_KILLSHEET' => 'array',
        'DATOS_POZO' => 'array',
        'CAPACIDADES_INTERNAS' => 'array',
        'CAPACIDADES_ANULARES' => 'array',
        'BOMBA_LODO' => 'array',
        'TASA_REDUCIDA' => 'array',
        'OTRA_INFORMACION' => 'array',
        'PRUEBA_FORMACION' => 'array',
        'INFLUJO' => 'array'
    ];

}
