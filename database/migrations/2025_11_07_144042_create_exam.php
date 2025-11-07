<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->text('ACCREDITATION_ENTITIES_EXAM')->nullable();
            $table->text('LEVELS_EXAM')->nullable();
            $table->text('BOPS_EXAM')->nullable();
            $table->unsignedInteger('LANGUAGE_ID_EXAM')->nullable();
            $table->unsignedInteger('EVALUATION_TYPES_EXAM')->nullable();
            $table->text('NAME_EXAM')->nullable();
            $table->text('TEMAS_EXAM')->nullable();
            $table->integer('TOTAL_QUESTIONS_EXAM')->nullable();
            $table->integer('TOTAL_TIME_EXAM')->nullable();
            $table->integer('TOTAL_POINT_EXAM')->nullable();
            $table->integer('USES_EXAM')->nullable();
            $table->integer('APPROVAL_EXAM')->nullable();
            $table->double('PERCENT_EXAM')->nullable();
            $table->integer('ACTIVO_EXAM')->nullable();
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
        Schema::dropIfExists('exam');
    }
}
