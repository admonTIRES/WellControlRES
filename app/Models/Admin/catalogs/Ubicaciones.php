<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicaciones extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $primaryKey = 'ID_CATALOGO_UBICACION';
    protected $fillable = [
        'LUGAR_UBICACION', 
        'CIUDAD_UBICACION', 
        'ACTIVO_UBICACION'
    ];
}
