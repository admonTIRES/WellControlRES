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
        'UNITS',
        'PRACTICAL',
        'PRACTICAL_PASS',
        'EQUIPAMENT',
        'EQUIPAMENT_PASS',
        'PYP',
        'PYP_PASS',
        'RESUME',
        'STATUS',
        'RESIT',
        'MODULE_RESIT',
        'RESIT_DATE',
        'RESIT_SCORE',
        'RESIT_PASS',
        'FINAL_SCORE',
        'FINAL_STATUS',
        'HAVE_CERTIFIED',
        'CERTIFIED',
        'EXPIRATION'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'ID_CANDIDATE', 'ID_CANDIDATE');
    }

    public function project()
    {
        return $this->belongsTo(Proyect::class, 'ID_PROJECT', 'ID_PROJECT');
    }
}
