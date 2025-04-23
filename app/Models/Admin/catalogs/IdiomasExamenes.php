<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomasExamenes extends Model
{
    protected $table = 'idioma_examen';
    protected $fillable = [
        'idioma', 
        'descripcion', 
        'activo'
    ];
}
