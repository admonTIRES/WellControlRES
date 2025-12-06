<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrosCapacitacion extends Model
{
    use HasFactory;
    protected $table = 'centro_capacitacion';
    protected $primaryKey = 'ID_CATALOGO_CENTRO';
    protected $fillable = [
        'ACREDITACION_CENTRO', 
        'TIPO_CENTRO', 
        'ASOCIADO_CENTRO', 
        'RAZON_SOCIAL_CENTRO', 
        'NOMBRE_COMERCIAL_CENTRO', 
        'NUMERO_CENTRO', 
        'VIGENCIA_DESDE_CENTRO', 
        'VIGENCIA_HASTA_CENTRO', 
        'CONTACTOS_CENTRO', 
        'INCLUYE_CENTRO', 
        'DOC_CENTRO',
        'UBICACION_CENTRO'
    ];

}
