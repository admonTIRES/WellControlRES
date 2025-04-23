<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelAcreditacion extends Model
{
    protected $table = 'nivel_acreditacion';
    protected $fillable = [
        'nivel', 
        'descripcion', 
        'activo'
    ];
}
