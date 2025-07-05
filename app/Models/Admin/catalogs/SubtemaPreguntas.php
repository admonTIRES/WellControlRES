<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtemaPreguntas extends Model
{
    use HasFactory;
    protected $table = 'subtema_pregunta';
    protected $primaryKey = 'ID_CATALOGO_SUBTEMA';
    protected $fillable = [
        'TEMAPREGUNTA_ID',
        'NOMBRE_SUBTEMA', 
        'CERTIFICACION_SUBTEMA', 
        'ACTIVO_SUBTEMA'
    ];

     protected $casts = [
        'CERTIFICACION_SUBTEMA' => 'array'
    ];
}
