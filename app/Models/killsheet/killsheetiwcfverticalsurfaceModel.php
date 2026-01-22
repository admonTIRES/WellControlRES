<?php

namespace App\Models\killsheet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class killsheetiwcfverticalsurfaceModel extends Model
{
    use HasFactory;


    protected $table = 'killsheet_iwcf_vertical_surface';
    protected $primaryKey = 'ID_KILLSHEET_IWCF_VERTICAL_SURFACE';
    protected $fillable = [


        'INFOKILLSHEET_ID',

        // =====================
        // SECCIÓN 1
        // =====================
        'PRESION_FUGAR_SEC1',
        'DENSIDAD_LODO_SEC1',
        'PROFUNDIADA_ZAPATA_SEC1',
        'PRESION_ANULAR_SEC1',
        'DESPLAZAMIENTO_BOMBA1_SEC1',
        'DESPLAZAMIENTO_BOMBA2_SEC1',
        'DATOS_TASA_BOMBA1_SEC1',
        'DATOS_TASA_BOMBA2_SEC1',
        'CAIDA_PRESION_BOMABA1_SEC1',
        'CAIDA_PRESION_BOMABA2_SEC1',
        'CAIDA_DINAMICA_BOMA1_SEC1',
        'CAIDA_DINAMICA_BOMA2_SEC1',
        'DENSIDAD_POZO_SEC1',
        'TAMANIO_ZAPATA_SEC1',
        'PROFUNDIADA_MEDIDA_SEC1',
        'PROFUNDIAD_VERTICAL_SEC1',
        'TAMANIO_HOYO_SEC1',
        'PROFUNDIDAD_MEDIDA_HOYO_SEC1',
        'PROFUNDIDAD_VERTICAL_HOYO_SEC1',

        // =====================
        // SECCIÓN 2
        // =====================
        'INPUT1_SEC2',
        'INPUT2_SEC2',
        'INPUT3_SEC2',
        'INPUT4_SEC2',
        'INPUT5_SEC2',
        'INPUT6_SEC2',
        'INPUT7_SEC2',
        'INPUT8_SEC2',
        'INPUT9_SEC2',
        'INPUT10_SEC2',
        'INPUT11_SEC2',
        'INPUT12_SEC2',
        'INPUT13_SEC2',
        'INPUT14_SEC2',
        'INPUT15_SEC2',
        'INPUT16_SEC2',
        'INPUT17_SEC2',
        'INPUT18_SEC2',
        'INPUT19_SEC2',
        'INPUT20_SEC2',
        'INPUT21_SEC2',
        'INPUT22_SEC2',
        'INPUT23_SEC2',
        'INPUT24_SEC2',
        'INPUT25_SEC2',
        'INPUT26_SEC2',
        'INPUT27_SEC2',
        'INPUT28_SEC2',
        'INPUT29_SEC2',
        'INPUT30_SEC2',
        'INPUT31_SEC2',
        'INPUT32_SEC2',
        'INPUT33_SEC2',
        'INPUT34_SEC2',
        'INPUT35_SEC2',
        'INPUT36_SEC2',

        // =====================
        // SECCIÓN 3
        // =====================
        'PRESION_PERFORACION_SEC3',
        'PRESION_REVESTIMIENTO_SEC3',
        'AUMENTO_VOLUMEN_SEC3',

        'INPUT1_SEC3',
        'INPUT2_SEC3',
        'INPUT3_SEC3',
        'INPUT4_SEC3',
        'INPUT5_SEC3',
        'INPUT6_SEC3',
        'INPUT7_SEC3',
        'INPUT8_SEC3',
        'INPUT9_SEC3',
        'INPUT10_SEC3',
        'INPUT11_SEC3',
        'INPUT12_SEC3',
        'INPUT13_SEC3',
        'INPUT14_SEC3',
        'INPUT15_SEC3',
        'INPUT16_SEC3',
        'INPUT17_SEC3',
        // =====================
        // GRÁFICA
        // =====================
        'EMBOLADAS1_GRAFICA',
        'PRESION1_GRAFICA',
        'EMBOLADAS2_GRAFICA',
        'PRESION2_GRAFICA',
        'EMBOLADAS3_GRAFICA',
        'PRESION3_GRAFICA',
        'EMBOLADAS4_GRAFICA',
        'PRESION4_GRAFICA',
        'EMBOLADAS5_GRAFICA',
        'PRESION5_GRAFICA',
        'EMBOLADAS6_GRAFICA',
        'PRESION6_GRAFICA',
        'EMBOLADAS7_GRAFICA',
        'PRESION7_GRAFICA',
        'EMBOLADAS8_GRAFICA',
        'PRESION8_GRAFICA',
        'EMBOLADAS9_GRAFICA',
        'PRESION9_GRAFICA',
        'EMBOLADAS10_GRAFICA',
        'PRESION10_GRAFICA',
        'EMBOLADAS11_GRAFICA',
        'PRESION11_GRAFICA',
        'EMBOLADAS12_GRAFICA',
        'PRESION12_GRAFICA',
        'EMBOLADAS13_GRAFICA',
        'PRESION13_GRAFICA',
        'EMBOLADAS14_GRAFICA',
        'PRESION14_GRAFICA',
        'EMBOLADAS15_GRAFICA',
        'PRESION15_GRAFICA',
        'EMBOLADAS16_GRAFICA',
        'PRESION16_GRAFICA',
        'EMBOLADAS17_GRAFICA',
        'PRESION17_GRAFICA',
        'EMBOLADAS18_GRAFICA',
        'PRESION18_GRAFICA',
        'EMBOLADAS19_GRAFICA',
        'PRESION19_GRAFICA'

    ];
}

