<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresias extends Model
{
    protected $table = 'membresias_catalogo';
    protected $primaryKey = 'ID_CATALOGO_MEMBRESIA';
    protected $fillable = [
        'NOMBRE_MEMBRESIA', 
        'DESCRIPCION_MEMBRESIA', 
        'ACTIVO_MEMBRESIA'
    ];
}
