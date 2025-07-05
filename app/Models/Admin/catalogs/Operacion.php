<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;
    protected $table = 'tipo_operacion';
    protected $primaryKey = 'ID_CATALOGO_OPERACION';
    protected $fillable = [
        'NOMBRE_OPERACION', 
        'ACTIVO_OPERACION'
    ];
}
