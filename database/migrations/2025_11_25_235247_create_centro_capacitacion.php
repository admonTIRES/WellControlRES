<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentroCapacitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_capacitacion', function (Blueprint $table) {
            $table->id();
            $table->text('ACREDITACION_CENTRO')->nullable();
            $table->text('TIPO_CENTRO')->nullable();
            $table->text('ASOCIADO_CENTRO')->nullable();
            $table->text('RAZON_SOCIAL_CENTRO')->nullable();
            $table->text('NOMBRE_COMERCIAL_CENTRO')->nullable();
            $table->text('NUMERO_CENTRO')->nullable();
            $table->text('VIGENCIA_DESDE_CENTRO')->nullable();
            $table->text('VIGENCIA_HASTA_CENTRO')->nullable();
            $table->text('CONTACTOS_CENTRO')->nullable();
            $table->text('DOCUMENTOS_CENTRO')->nullable();
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
        Schema::dropIfExists('centro_capacitacion');
    }
}
