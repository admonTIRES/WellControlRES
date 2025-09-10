<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKillsheetSolution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('killsheet_IADC_v', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ID_KILLSHEET')->nullable();
            $table->longText('LONG_DP_REV')->nullable();//LONGITUD DP EN AGUJERO REVESTIDO
            $table->longText('REV_MD')->nullable();//REVESTIMIENTO MD
            $table->longText('REV_TVD')->nullable();//REVESTIMIENTO TVD
            $table->longText('LONG_DP_AB')->nullable();//LONGITUD DP EN AGUJERO ABIERTO
            $table->longText('LONG_HWDP');//LONGITUD HWDP
            $table->longText('LONG_DC');//LONGITUD DC
            $table->longText('TAM_AG')->nullable();//TAMANO DEL AGUJERO
            $table->longText('AG_MD')->nullable();//AGUJERO MD
            $table->longText('AG_TVD')->nullable();//AGUJERO TVD
            $table->longText('DP_CAP')->nullable();// CAPCIDAD DP
            $table->longText('HWDP_CAP')->nullable();//CAPACIDAD HWDP
            $table->longText('DC_CAP')->nullable();//CAPACIDAD DC
            $table->longText('DP_LONG')->nullable();//LONGITUD DP
            $table->longText('HWDP_LONG')->nullable();//LONGITUD HWDP
            $table->longText('DC_LONG')->nullable();//LONGITUD DC
            $table->longText('DP_RES')->nullable();//RESULTADO DP
            $table->longText('HWDP_RES')->nullable();//RESULTADO HWDP
            $table->longText('DC_RES')->nullable();//RESULTADO DC
            $table->longText('VOL_SARTA')->nullable();//VOLUMENTO TOTAL SARTA DE PERFORACION
            $table->longText('TUB_AG_REV_CAP')->nullable();//TUBERIA AGUJERO REVESTIDO CAPACIDAD
            $table->longText('TUB_AG_AB_CAP')->nullable();//TUBERIA AGUJERO ABIERTO CAPACIDAD
            $table->longText('HWDP_AG_AB_CAP')->nullable();//HWDP AGUJERO ABIERTO CAPACIDASD
            $table->longText('DC_AG_AB_CAP')->nullable();//COLLARES DE PERF EN AGUJERO  CAPACIDAD
            $table->longText('TUB_AG_REV_LONG')->nullable();//TUBERIA AGUJERO REVESTIDO LONGITUD
            $table->longText('TUB_AG_AB_LONG')->nullable();//TUBERIA AGUJERO ABIERTO LONGITUD
            $table->longText('HWDP_AG_AB_LONG')->nullable();//HWDP AGUJERO ABIERTO LONGITUD
            $table->longText('DC_AG_AB_LONG')->nullable();//COLLARES DE PERF EN AGUJERO ABIERTO LONGITUD
            $table->longText('TUB_AG_REV_RES')->nullable();//TUBERIA AGUJERO REVESTIDO RESULTADO
            $table->longText('TUB_AG_AB_RES')->nullable();//TUBERIA AGUJERO ABIERTO RESULTADO
            $table->longText('HWDP_AG_AB_RES')->nullable();//HWDP AGUJERO ABIERTO RESULTADO
            $table->longText('DC_AG_AB_RES')->nullable();//COLLARES DE PERF EN AGUJERO ABIERTO RESULTADO
            $table->longText('VOL_AG_AB')->nullable();//VOLUMEN TOTAL DE AGUJERO ABIERTO
            $table->longText('VOL_ESP_AN')->nullable();//VOLUMEN TOTAL DE ESPACIO ANULAR
            $table->longText('SAL_BOM')->nullable();//SDALIDA DE LA BOMBA
            $table->longText('EMB_BARR_ZAP')->nullable();//EMBOLADAS DESDE LA BARRENA HASTA L;A ZAPATA DEL REVESTIMEINTO
            $table->longText('EMB_FON_SUP')->nullable();//EMBOLADAS DE FONDO A SUPERFICIE
            $table->longText('CIR_POZ')->nullable();//CIRCULACION TOTAL DEL POZO
            $table->longText('EMB_LIN_SUP')->nullable();//EMBOLADAS LINEA DE SUPERFICIE
            $table->longText('SIDPP')->nullable();//
            $table->longText('SICP')->nullable();//
            $table->longText('GAN_TAN')->nullable();//GANACIA EN TANQUES
            $table->longText('OMW')->nullable();//DENSIDAD DEL LODO ORIGINAL
            $table->longText('SCRP')->nullable();//PRESION REDUCIDA DE LA BOMBA
            $table->longText('KMW')->nullable();//DENSIDAD DEL LODO PARA MATAR
            $table->longText('MAMW')->nullable();//MAXIMA DENSIDAD DEL LODO PERMITIDA
            $table->longText('PRE_LEAK')->nullable();//PRESION LEAK OFF EN SUPERFICIE
            $table->longText('DEN_LOD_PRU')->nullable();//DENSIDAD DEL LODO DURANTE LA PRUEBA
            $table->longText('GRAD_FRAC')->nullable();//GRADIENTE DE FRACTURA
            $table->longText('MAASP_AN')->nullable();//MAASP ANTES DEK INFLUJO
            $table->longText('DEN_LOD_ACT')->nullable();//DENSIDAD DEL LODO ACTUAL
            $table->longText('TVD_ZAP')->nullable();//TVD DE L;A ZAPATA
            $table->longText('MAASP_DES')->nullable();//MAASP DESPUES DEL QUE POZO ESAT MUERTO
            $table->longText('ICP')->nullable();//PRESION INCIAL DE CIRCULACION
            $table->longText('FCP')->nullable();//PRESION DINAL DE CIRCULACION
            $table->longText('RED_PRE_ETA')->nullable();//REDUCCION DE LA RPERSION POR CADA ETAPA
            $table->longText('RED_PRE_EMB')->nullable();//REDUCCION DE LA PRESION POR CADA 100 EMBOLADAS
            $table->longText('PRO_PRE_TUB')->nullable();//TABLA DE PROPGRAMA DE PRESION DE LA TUBERIA DE PERFORACION
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
        Schema::dropIfExists('killsheet_solution');
    }
}
