<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NombreProyecto extends Model
{
    use HasFactory;
    protected $table = 'name_project';
    protected $primaryKey = 'ID_CATALOGO_NPROYECTOS';
    protected $fillable = [
        'NOMBRE_PROYECTO',
        'ACTIVO_NPROYECTO'
    ];
}
