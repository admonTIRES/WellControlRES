<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionKillsheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_killsheet', function (Blueprint $table) {
            $table->increments('ID_INFORMACION_KILLSHEET');
            $table->text('TIPO_ENTE_KILL');
            $table->text('TIPO_POZO_KILL')->nullable();
            $table->text('TIPO_BOP_KILL')->nullable();
            $table->text('TIPO_IDIOMA_KILL')->nullable();
            $table->text('NIVELES_KILLSHEET')->nullable();
            $table->text('DATOS_EJERCICIO_JSON')->nullable();
            $table->text('PREGUNTAS_JSON')->nullable();
            $table->boolean('ACTIVO')->default(1);
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
        Schema::dropIfExists('informacion_killsheet');
    }
}
