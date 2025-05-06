<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathExercise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('math_exercise', function (Blueprint $table) {
            $table->id('ID_MATH_EXERCISE');
            $table->integer('TIPO_MATH');
            $table->integer('ENTE_MATH');
            $table->longText('NIVELES_MATH');
            $table->integer('BOP_MATH');
            $table->text('FRACCION_MATH')->nullable();
            $table->double('DECIMAL_MATH')->nullable();
            $table->text('PREGUNTA_MATH')->nullable();
            $table->text('FORMULA_MATH')->nullable();
            $table->longText('OPCIONES_MATH')->nullable();
            $table->text('EXPLICACION_MATH')->nullable();
            $table->string('SOLUCIONIMG_MATH')->nullable();
            $table->string('CALCULADORA_MATH')->nullable();
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
        Schema::dropIfExists('math_exercise');
    }
}
