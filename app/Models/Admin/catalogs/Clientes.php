<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
     use HasFactory;
    protected $table = 'costumers';
    protected $primaryKey = 'ID_CATALOGO_CENTRO';
    protected $fillable = [
        'RAZON_SOCIAL_CLIENTE', 
        'NOMBRE_COMERCIAL_CLIENTE', 
        'CONTACTO_CLIENTE', 
        'ACTIVO_CLIENTE'
    ];
}
