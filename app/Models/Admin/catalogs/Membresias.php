<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresias extends Model
{
    protected $table = 'membresias_catalogo';
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'activo'
    ];
}
