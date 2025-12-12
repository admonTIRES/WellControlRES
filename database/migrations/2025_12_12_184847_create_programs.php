<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->text('NOMBRE_PROGRAMA');
            $table->text('MIN_PORCENTAJE_APROB')->nullable();
            $table->text('MAX_PORCENTAJE_APROB')->nullable();
            $table->text('OPCION_RESIT')->nullable();
            $table->text('MIN_PORCENTAJE_REPROB_RE')->nullable();
            $table->text('MAX_PORCENTAJE_REPROB_RE')->nullable();
            $table->text('MIN_PORCENTAJE_REPROB')->nullable();
            $table->text('MAX_PORCENTAJE_REPROB')->nullable();
            $table->text('OPCION_RESIT_PERMITIDAS')->nullable();
            $table->text('ACTIVO_PROGRAMA');
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
        Schema::dropIfExists('programs');
    }
}
