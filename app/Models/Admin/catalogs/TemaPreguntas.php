<?php

namespace App\Models\Admin\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaPreguntas extends Model
{
    protected $table = 'tema_pregunta';
    protected $fillable = [
        'tema', 
        'certificacion', 
        'activo'
    ];
}
