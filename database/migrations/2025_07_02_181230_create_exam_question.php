<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_question', function (Blueprint $table) {
            $table->id();
            
            // Generalidades
            $table->longText('ACCREDITATION_ENTITIES_QUESTION')->nullable(); // ENTE_MATH (multiple)
            $table->longText('LEVELS_QUESTION')->nullable(); // NIVEL_MATH (multiple)
            $table->longText('BOPS_QUESTION')->nullable(); // BOP_MATH (multiple)

            // Idioma
            $table->unsignedInteger('LANGUAGE_QUESTION'); // IDIOMA_QUESTION

            // Temas y subtemas
            $table->longText('TOPICS_QUESTION')->nullable(); // TEMA_QUESTION (multiple)
            $table->longText('SUBTOPICS_QUESTION')->nullable(); // SUBTEMA_QUESTION

            // Estructura de la pregunta
            $table->longText('QUESTION_STRUCTURE_QUESTION'); // Contendrá TIPO1_QUESTION, TEXTO1_QUESTION, IMAGEN1_QUESTION, etc.

            // Respuestas
            $table->unsignedTinyInteger('ANSWER_TYPE_QUESTION'); // TIPO_RESPUESTA_QUESTION
            $table->unsignedInteger('ANSWER_OPTIONS_QUESTION')->nullable(); // Para opciones de respuesta
            $table->unsignedInteger('CORRECT_ANSWERS_QUESTION')->nullable(); // Respuestas correctas
            $table->longText('ANSWERS_QUESTION')->nullable(); // Respuestas DESCRIPCION Y TRUE O FALSE SI ES CORERECTA
            $table->unsignedInteger('MIN_RANGE_QUESTION')->nullable(); // Para rango numérico
            $table->unsignedInteger('MAX_RANGE_QUESTION')->nullable(); // Para rango numérico

            // Tiempo y puntaje
            $table->unsignedInteger('TIME_MINUTES_QUESTION'); // TIEMPO_QUESTION
            $table->unsignedInteger('SCORE_QUESTION'); // PUNTAJE_QUESTION

            // Tipo de evaluación
            $table->longText('EVALUATION_TYPES_QUESTION')->nullable(); // TIPOEVA_QUESTION (multiple)

            // Retroalimentación
            $table->boolean('HAS_FEEDBACK_QUESTION'); // RETROALIMENTACION_QUESTION
            $table->text('FEEDBACK_TEXT_QUESTION')->nullable(); // RETROTEXT_QUESTION

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_question');
    }
}
