<?php

namespace App\Models\Admin\Exercise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exam';
    protected $primaryKey = 'ID_EXAM';
    protected $fillable = [
        'ACCREDITATION_ENTITIES_EXAM',
        'LEVELS_EXAM',
        'BOPS_EXAM',
        'LANGUAGE_ID_EXAM',
        'EVALUATION_TYPES_EXAM',
        'NAME_EXAM',
        'TEMAS_EXAM',
        'TOTAL_QUESTIONS_EXAM',
        'TOTAL_TIME_EXAM',
        'TOTAL_POINT_EXAM',
        'USES_EXAM',
        'APPROVAL_EXAM',
        'PERCENT_EXAM',
        'ACTIVO_EXAM'
    ];


    protected $casts = [
        'ACCREDITATION_ENTITIES_EXAM' => 'array',
        'LEVELS_EXAM' => 'array',
        'BOPS_EXAM' => 'array',
        'EVALUATION_TYPES_EXAM' => 'array',
        'TEMAS_EXAM' => 'array'
    ];
}
