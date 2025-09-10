<?php

namespace App\Models\Admin\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    use HasFactory;
    protected $table = 'proyect';
    protected $primaryKey = 'ID_PROJECT';
    protected $fillable = [
        'CONTACT_NAME_PROJEC',
        'CONTACT_PHONE_PROJECT',
        'COURSE_TYPE_PROJECT',
        'COURSE_NAME_ES_PROJECT',
        'COURSE_NAME_EN_PROJECT',
        'FOLIO_PROJECT',
        'LOCATION_PROJECT',
        'CITY_PROJECT',
        'CENTER_NUMBER_PROJECT',
        'CERTIFICATION_CENTER_PROJECT',
        'LANGUAGE_PROJECT',
        'ACCREDITING_ENTITY_PROJECT',
        'OPERATION_TYPE_PROJECT',
        'ACCREDITATION_LEVELS_PROJECT',
        'BOP_TYPES_PROJECT',
        'COMPANIES_PROJECT',
        'COURSE_START_DATE_PROJECT',
        'COURSE_END_DATE_PROJECT',
        'MEMBERSHIP_START_PROJECT',
        'MEMBERSHIP_END_PROJECT',
        'EXAM_DATE_PROJECT',
        'EXAM_TIME_PROJECT',
        'PRACTICAL_EXAM_DATE_PROJECT',
        'PRACTICAL_EXAM_TIME_PROJECT',
        'INSTRUCTOR_ID_PROJECT',
        'INSTRUCTOR_EMAIL_PROJECT'
    ];

    protected $casts = [
        'ACCREDITATION_LEVELS_PROJECT' => 'array',
        'BOP_TYPES_PROJECT' => 'array',
        'COMPANIES_PROJECT' => 'array'
    ];

      public function candidates()
    {
        return $this->hasMany(Candidate::class, 'ID_PROJECT', 'ID_PROJECT');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'ID_PROJECT', 'ID_PROJECT');
    }
}
