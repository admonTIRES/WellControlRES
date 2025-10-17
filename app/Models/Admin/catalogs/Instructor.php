<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $table = 'instructors';
    protected $primaryKey = 'ID_CATALOGO_INSTRUCTOR';
    protected $fillable = [
        'FNAME_INSTRUCTOR', 
        'MDNAME_INSTRUCTOR', 
        'LSNAME_INSTRUCTOR', 
        'MAIL_INSTRUCTOR', 
        'LADA_INSTRUCTOR', 
        'TEL_INSTRUCTOR', 
        'ACREDITACION_INSTRUCTOR', 
        'EXPIRACION_INSTRUCTOR', 
        'DOC_INSTRUCTOR',
        'ACTIVO_INSTRUCTOR'
    ];

     protected $casts = [
        'ACREDITACION_INSTRUCTOR' => 'array'
    ];

}
