<?php

namespace App\Models\Admin\Exercise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Math extends Model
{
    use HasFactory;

    protected $table = 'math_exercise';
    protected $primaryKey = 'ID_MATH_EXERCISE';
    protected $fillable = [
        'TIPO_MATH',
        'ENTE_MATH',
        'NIVELES_MATH',
        'BOP_MATH',
        'OPERATION_MATH',
        'LANGUAGE_MATH',
        'FRACCION_MATH',
        'DECIMAL_MATH',
        'PREGUNTA_MATH',
        'FORMULA_MATH',
        'OPCIONES_MATH',
        'EXPLICACION_MATH',
        'SOLUCIONIMG_MATH',
        'CALCULADORA_MATH',
        'ACTIVO_MATH'
    ];


    protected $casts = [
        'ENTE_MATH' => 'array',
        'NIVELES_MATH' => 'array',
        'BOP_MATH' => 'array',
        'OPERATION_MATH' => 'array',
        'OPCIONES_MATH' => 'array',
        'CALCULADORA_MATH' => 'array'
    ];

}
