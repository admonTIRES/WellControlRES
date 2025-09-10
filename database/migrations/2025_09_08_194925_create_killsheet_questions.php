<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKillsheetQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('killsheet_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ID_KILLSHEET')->nullable();
            $table->text('QUESTION')->nullable();//PREGUNTA
            $table->double('ANSWER_MIN')->nullable();//RESPUESAT MINIMO
            $table->double('ANSWER_MAX')->nullable();//RESPUESTA MAXIMO
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
        Schema::dropIfExists('killsheet_questions');
    }
}
