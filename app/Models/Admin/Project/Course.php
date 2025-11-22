<?php

namespace App\Models\Admin\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $primaryKey = 'ID_COURSE';
    protected $fillable = [
        'ID_PROJECT',
        'ID_CANDIDATE',
        'PRACTICAL',
        'PRACTICAL_PASS',
        'EQUIPAMENT',
        'EQUIPAMENT_PASS',
        'PYP',
        'PYP_PASS',
        'STATUS',
        'RESIT',
        'INTENTOS',
        'RESIT_MODULE',
        'RESIT_INMEDIATO',
        'RESIT_INMEDIATO_DATE',
        'RESIT_INMEDIATO_SCORE',
        'RESIT_INMEDIATO_STATUS',
        'RESIT_PROGRAMADO',
        'RESIT_ENTRENAMIENTO',
        'RESIT_FOLIO_PROYECTO',
        'RESIT_PROGRAMADO_DATE',
        'RESIT_PROGRAMADO_SCORE',
        'RESIT_PROGRAMADO_STATUS',
        'FINAL_STATUS',
        'HAVE_CERTIFIED',
        'CERTIFIED',
        'EXPIRATION'
    ];

    public function candidate()
    {
        return $this->belongsTo(candidate::class, 'ID_CANDIDATE', 'ID_CANDIDATE');
    }

    public function project()
    {
        return $this->belongsTo(Proyect::class, 'ID_PROJECT', 'ID_PROJECT');
    }
}
