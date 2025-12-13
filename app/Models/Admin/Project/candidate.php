<?php

namespace App\Models\Admin\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    use HasFactory;
    protected $table = 'candidate';
    protected $primaryKey = 'ID_CANDIDATE';
    protected $fillable = [
        'ID_PROJECT',
        'COMPANY_PROJECT', 
        'COMPANY_ID_PROJECT', 
        'CR_PROJECT',
        'LAST_NAME_PROJECT',
        'FIRST_NAME_PROJECT', 
        'MIDDLE_NAME_PROJECT', 
        'DOB_PROJECT',
        'ID_NUMBER_PROJECT', 
        'EMAIL_PROJECT', 
        'PASSWORD_PROJECT',
        'POSITION_PROJECT', 
        'MEMBERSHIP_PROJECT', 
        'STATUS_MAIL_PROJECT',
        'ACTIVO',
        'ASISTENCIA',
        'MOTIVO',
        'LEVEL',
        'ASISTENCIAS'
    ];

    protected $casts = [
    'ASISTENCIAS' => 'array', 
];

     public function project()
    {
        return $this->belongsTo(Proyect::class, 'ID_PROJECT', 'ID_PROJECT');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'ID_CANDIDATE', 'ID_CANDIDATE');
    }

}
