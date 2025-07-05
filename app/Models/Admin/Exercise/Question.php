<?php

namespace App\Models\Admin\Exercise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'exam_question';
    protected $primaryKey = 'ID_QUESTION';
    protected $fillable = [
        'ACCREDITATION_ENTITIES_QUESTION',
        'LEVELS_QUESTION',
        'BOPS_QUESTION',
        'LANGUAGE_ID_QUESTION',
        'TOPICS_QUESTION',
        'SUBTOPICS_QUESTION',
        'QUESTION_STRUCTURE_QUESTION',
        'ANSWER_TYPE_QUESTION',
        'ANSWER_OPTIONS_QUESTION',
        'CORRECT_ANSWERS_QUESTION',
        'MIN_RANGE_QUESTION',
        'MAX_RANGE_QUESTION',
        'TIME_MINUTES_QUESTION',
        'SCORE_QUESTION',
        'EVALUATION_TYPES_QUESTION',
        'HAS_FEEDBACK_QUESTION',
        'FEEDBACK_TEXT_QUESTION',
        'USES_QUESTION',
        'APPROVAL_QUESTION',
        'PERCENT_QUESTION'
    ];


    protected $casts = [
        'ACCREDITATION_ENTITIES_QUESTION' => 'array',
        'LEVELS_QUESTION' => 'array',
        'BOPS_QUESTION' => 'array',
        'TOPICS_QUESTION' => 'array',
        'SUBTOPICS_QUESTION' => 'array',
        'QUESTION_STRUCTURE_QUESTION' => 'array',
        'ANSWER_OPTIONS_QUESTION' => 'array',
        'CORRECT_ANSWERS_QUESTION' => 'array',
        'EVALUATION_TYPES_QUESTION' => 'array',
    ];


}
