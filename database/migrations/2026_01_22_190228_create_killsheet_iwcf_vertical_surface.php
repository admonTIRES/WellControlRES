<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKillsheetIwcfVerticalSurface extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('killsheet_iwcf_vertical_surface', function (Blueprint $table) {
            $table->increments('ID_KILLSHEET_IWCF_VERTICAL_SURFACE');
            $table->integer('INFOKILLSHEET_ID')->nullable();
            $table->text('PRESION_FUGAR_SEC1');
            $table->text('DENSIDAD_LODO_SEC1');
            $table->text('PROFUNDIADA_ZAPATA_SEC1');
            $table->text('PRESION_ANULAR_SEC1');
            $table->text('DESPLAZAMIENTO_BOMBA1_SEC1');
            $table->text('DESPLAZAMIENTO_BOMBA2_SEC1');
            $table->text('DATOS_TASA_BOMBA1_SEC1');
            $table->text('DATOS_TASA_BOMBA2_SEC1');
            $table->text('CAIDA_PRESION_BOMABA1_SEC1');
            $table->text('CAIDA_PRESION_BOMABA2_SEC1');
            $table->text('CAIDA_DINAMICA_BOMA1_SEC1');
            $table->text('CAIDA_DINAMICA_BOMA2_SEC1');
            $table->text('DENSIDAD_POZO_SEC1');
            $table->text('TAMANIO_ZAPATA_SEC1');
            $table->text('PROFUNDIADA_MEDIDA_SEC1');
            $table->text('PROFUNDIAD_VERTICAL_SEC1');
            $table->text('TAMANIO_HOYO_SEC1');
            $table->text('PROFUNDIDAD_MEDIDA_HOYO_SEC1');
            $table->text('PROFUNDIDAD_VERTICAL_HOYO_SEC1');
            $table->text('INPUT1_SEC2');
            $table->text('INPUT2_SEC2');
            $table->text('INPUT3_SEC2');
            $table->text('INPUT4_SEC2');
            $table->text('INPUT5_SEC2');
            $table->text('INPUT6_SEC2');
            $table->text('INPUT7_SEC2');
            $table->text('INPUT8_SEC2');
            $table->text('INPUT9_SEC2');
            $table->text('INPUT10_SEC2');
            $table->text('INPUT11_SEC2');
            $table->text('INPUT12_SEC2');
            $table->text('INPUT13_SEC2');
            $table->text('INPUT14_SEC2');
            $table->text('INPUT15_SEC2');
            $table->text('INPUT16_SEC2');
            $table->text('INPUT17_SEC2');
            $table->text('INPUT18_SEC2');
            $table->text('INPUT19_SEC2');
            $table->text('INPUT20_SEC2');
            $table->text('INPUT21_SEC2');
            $table->text('INPUT22_SEC2');
            $table->text('INPUT23_SEC2');
            $table->text('INPUT24_SEC2');
            $table->text('INPUT25_SEC2');
            $table->text('INPUT26_SEC2');
            $table->text('INPUT27_SEC2');
            $table->text('INPUT28_SEC2');
            $table->text('INPUT29_SEC2');
            $table->text('INPUT30_SEC2');
            $table->text('INPUT31_SEC2');
            $table->text('INPUT32_SEC2');
            $table->text('INPUT33_SEC2');
            $table->text('INPUT34_SEC2');
            $table->text('INPUT35_SEC2');
            $table->text('INPUT36_SEC2');
            $table->text('PRESION_PERFORACION_SEC3');
            $table->text('PRESION_REVESTIMIENTO_SEC3');
            $table->text('AUMENTO_VOLUMEN_SEC3');
            $table->text('INPUT1_SEC3');
            $table->text('INPUT2_SEC3');
            $table->text('INPUT3_SEC3');
            $table->text('INPUT4_SEC3');
            $table->text('INPUT5_SEC3');
            $table->text('INPUT6_SEC3');
            $table->text('INPUT7_SEC3');
            $table->text('INPUT8_SEC3');
            $table->text('INPUT9_SEC3');
            $table->text('INPUT10_SEC3');
            $table->text('INPUT11_SEC3');
            $table->text('INPUT12_SEC3');
            $table->text('INPUT13_SEC3');
            $table->text('INPUT14_SEC3');
            $table->text('INPUT15_SEC3');
            $table->text('INPUT16_SEC3');
            $table->text('EMBOLADAS1_GRAFICA');
            $table->text('PRESION1_GRAFICA');
            $table->text('EMBOLADAS2_GRAFICA');
            $table->text('PRESION2_GRAFICA');
            $table->text('EMBOLADAS3_GRAFICA');
            $table->text('PRESION3_GRAFICA');
            $table->text('EMBOLADAS4_GRAFICA');
            $table->text('PRESION4_GRAFICA');
            $table->text('EMBOLADAS5_GRAFICA');
            $table->text('PRESION5_GRAFICA');
            $table->text('EMBOLADAS6_GRAFICA');
            $table->text('PRESION6_GRAFICA');
            $table->text('EMBOLADAS7_GRAFICA');
            $table->text('PRESION7_GRAFICA');
            $table->text('EMBOLADAS8_GRAFICA');
            $table->text('PRESION8_GRAFICA');
            $table->text('EMBOLADAS9_GRAFICA');
            $table->text('PRESION9_GRAFICA');
            $table->text('EMBOLADAS10_GRAFICA');
            $table->text('PRESION10_GRAFICA');
            $table->text('EMBOLADAS11_GRAFICA');
            $table->text('PRESION11_GRAFICA');
            $table->text('EMBOLADAS12_GRAFICA');
            $table->text('PRESION12_GRAFICA');
            $table->text('EMBOLADAS13_GRAFICA');
            $table->text('PRESION13_GRAFICA');
            $table->text('EMBOLADAS14_GRAFICA');
            $table->text('PRESION14_GRAFICA');
            $table->text('EMBOLADAS15_GRAFICA');
            $table->text('PRESION15_GRAFICA');
            $table->text('EMBOLADAS16_GRAFICA');
            $table->text('PRESION16_GRAFICA');
            $table->text('EMBOLADAS17_GRAFICA');
            $table->text('PRESION17_GRAFICA');
            $table->text('EMBOLADAS18_GRAFICA');
            $table->text('PRESION18_GRAFICA');
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
        Schema::dropIfExists('killsheet_iwcf_vertical_surface');
    }
}
