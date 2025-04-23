<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnteAcreditador extends Model
{
    protected $table = 'entes_acreditadores';
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'activo'
    ];

}
