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
        'CO',
        'WORKOVER',
        'WO_STATUS',
        'SUBSEA',
        'SUBSEA_STATUS',
        'D1',
        'D1_STATUS',
        'D2',
        'D2_STATUS',
        'D3',
        'D3_STATUS',
        'STATUS',
        'RESIT',
        'INTENTOS',
        'RESIT_MODULE',
        'RESIT_INMEDIATO',
        'RESIT_INMEDIATO_DATE',
        'RESIT_INMEDIATO_SCORE',
        'RESIT_INMEDIATO_STATUS',
        'RESIT_1',
        'RESIT_1_DATE',
        'RESIT_1_SCORE',
        'RESIT_1_STATUS',
        'RESIT_1_ENTRENAMIENTO',
        'RESIT_1_FOLIO_PROYECTO',
        'RESIT_2',
        'RESIT_2_DATE',
        'RESIT_2_SCORE',
        'RESIT_2_STATUS',
        'RESIT_2_ENTRENAMIENTO',
        'RESIT_2_FOLIO_PROYECTO',
        'RESIT_3',
        'RESIT_3_DATE',
        'RESIT_3_SCORE',
        'RESIT_3_STATUS',
        'RESIT_3_ENTRENAMIENTO',
        'RESIT_3_FOLIO_PROYECTO',
        'FINAL_STATUS',
        'HAVE_CERTIFIED',
        'CERTIFIED',
        'CERTIFICATE_NUMBER',
        'REFRESH',
        'REFRESH_DATE',
        'REFRESH_EVIDENCE',
        'EXPIRATION',
        'ENABLE_NOTIFICATIONS',
        'EMAILS_SENT',
        'COMPLEMENTS_JSON'
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
