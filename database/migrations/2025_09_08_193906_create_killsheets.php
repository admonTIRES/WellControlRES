<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKillsheets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('killsheet', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ID_KILLSHEET_SOLUTION')->nullable();
            $table->longText('ENTE_KILLSHEET')->nullable();
            $table->longText('NIVELES_KILLSHEET')->nullable();
            $table->longText('BOP_KILLSHEET')->nullable();
            $table->longText('OPERACION_KILLSHEET')->nullable();
            $table->unsignedInteger('LANGUAGE_KILLSHEET')->nullable();
            $table->longText('DATOS_POZO')->nullable();//PUEDEN SER HASTA 5 DATOS POR SECCION
            $table->longText('CAPACIDADES_INTERNAS')->nullable();
            $table->longText('CAPACIDADES_ANULARES')->nullable();
            $table->longText('BOMBA_LODO')->nullable();
            $table->longText('TASA_REDUCIDA')->nullable();
            $table->longText('OTRA_INFORMACION')->nullable();
            $table->longText('PRUEBA_FORMACION')->nullable();
            $table->longText('INFLUJO')->nullable();
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
        Schema::dropIfExists('killsheets');
    }
}
