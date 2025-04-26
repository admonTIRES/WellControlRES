<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaPreguntas extends Model
{
    protected $table = 'tema_pregunta';
    protected $primaryKey = 'ID_CATALOGO_TEMAPREGUNTA';
    protected $fillable = [
        'NOMBRE_TEMA', 
        'CERTIFICACION_TEMA', 
        'ACTIVO_TEMA'
    ];
}
