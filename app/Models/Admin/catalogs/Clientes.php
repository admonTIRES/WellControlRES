<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
     use HasFactory;
    protected $table = 'costumers';
    protected $primaryKey = 'ID_CATALOGO_CLIENTE';
    protected $fillable = [
        'RAZONES_SOCIALES', 
        'NOMBRE_COMERCIAL_CLIENTE', 
        'CONTACTO_CLIENTE', 
        'ACTIVO_CLIENTE'
    ];
}
