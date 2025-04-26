<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomasExamenes extends Model
{
    protected $table = 'idioma_examen';
    protected $primaryKey = 'ID_CATALOGO_IDIOMAEXAMEN';
    protected $fillable = [
        'NOMBRE_IDIOMA', 
        'DESCRIPCION_IDIOMAS', 
        'ACTIVO_IDIOMA'
    ];
}
