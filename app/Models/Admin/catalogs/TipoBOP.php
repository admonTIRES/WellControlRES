<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBOP extends Model
{
    protected $table = 'tipo_bop';
    protected $fillable = [
        'abreviatura', 
        'descripcion', 
        'activo'
    ];
}
