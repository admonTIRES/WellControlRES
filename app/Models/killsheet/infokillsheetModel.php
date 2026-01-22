<?php

namespace App\Models\killsheet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infokillsheetModel extends Model
{
    use HasFactory;

    protected $table = 'informacion_killsheet';
    protected $primaryKey = 'ID_INFORMACION_KILLSHEET';
    protected $fillable = [


        'TIPO_ENTE_KILL',
        'TIPO_POZO_KILL',
        'TIPO_BOP_KILL',
        'TIPO_IDIOMA_KILL',
        'NIVELES_KILLSHEET',
        'DATOS_EJERCICIO_JSON',
        'PREGUNTAS_JSON',
        'ACTIVO'


    ];


    protected $casts = [
        'NIVELES_KILLSHEET'      => 'array',
        'DATOS_EJERCICIO_JSON'   => 'array',
        'PREGUNTAS_JSON'         => 'array'
    ];

    }
