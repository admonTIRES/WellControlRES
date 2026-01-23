<?php

namespace App\Http\Controllers\Admin\Exercises;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;
//MODELS
use App\Models\Admin\Exercise\Killsheets;
use App\Models\Admin\catalogs\EnteAcreditador;
use App\Models\Admin\catalogs\TipoBOP;
use App\Models\Admin\catalogs\Operacion;
use App\Models\Admin\catalogs\IdiomasExamenes;
use App\Models\Admin\catalogs\NivelAcreditacion;



use App\Models\killsheet\infokillsheetModel;
use App\Models\killsheet\killsheetiwcfverticalsurfaceModel;



class KillsheetsController extends Controller
{
    //DATATABLE



    public function killsheetsDatatable()
    {
        try {

            $tabla = infokillsheetModel::get();

            foreach ($tabla as $value) {

           
                switch (intval($value->TIPO_ENTE_KILL)) {
                    case 1:
                        $value->TIPO_ENTE_TEXT = 'IWCF';
                        break;
                    case 2:
                        $value->TIPO_ENTE_TEXT = 'IADC';
                        break;
                    default:
                        $value->TIPO_ENTE_TEXT = 'N/A';
                }

              
                switch (intval($value->TIPO_POZO_KILL)) {
                    case 1:
                        $value->TIPO_POZO_TEXT = 'Pozo Vertical';
                        break;
                    case 2:
                        $value->TIPO_POZO_TEXT = 'Pozo Desviado';
                        break;
                    default:
                        $value->TIPO_POZO_TEXT = 'N/A';
                }

                switch (intval($value->TIPO_BOP_KILL)) {
                    case 1:
                    case 3:
                        $value->TIPO_BOP_TEXT = 'Surface';
                        break;
                    case 2:
                    case 4:
                        $value->TIPO_BOP_TEXT = 'Subsea';
                        break;
                    default:
                        $value->TIPO_BOP_TEXT = 'N/A';
                }

                switch (intval($value->TIPO_IDIOMA_KILL)) {
                    case 1:
                        $value->TIPO_IDIOMA_TEXT = 'Inglés';
                        break;
                    case 2:
                        $value->TIPO_IDIOMA_TEXT = 'Español';
                        break;
                    case 3:
                        $value->TIPO_IDIOMA_TEXT = 'Árabe';
                        break;
                    case 4:
                        $value->TIPO_IDIOMA_TEXT = 'Portugués';
                        break;
                    default:
                        $value->TIPO_IDIOMA_TEXT = 'N/A';
                }

              
                if ($value->ACTIVO == 0) {
                
                    $value->BTN_EDITAR =
                        '<button type="button" class="btn btn-secondary btn-custom rounded-pill EDITAR" disabled>
                        <i class="bi bi-ban"></i>
                    </button>';
                } else {
                    $value->BTN_EDITAR =
                        '<button type="button" class="btn btn-warning btn-custom rounded-pill EDITAR">
                        <i class="bi bi-pencil-square"></i>
                    </button>';
                }
            }

            return response()->json([
                'data' => $tabla,
                'msj'  => 'Información consultada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'msj'  => 'Error ' . $e->getMessage(),
                'data' => []
            ]);
        }
    }



    /// OBTENER HOJA DE MATAR


    public function obtenerKillsheet(Request $request)
    {
        try {

            $infoId = $request->INFOKILLSHEET_ID;

            if (!$infoId) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID no recibido'
                ], 400);
            }

            $killsheet = killsheetiwcfverticalsurfaceModel::where(
                'INFOKILLSHEET_ID',
                $infoId
            )->first();

            if (!$killsheet) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe hoja para este registro'
                ]);
            }

            return response()->json([
                'success' => true,
                'data'    => $killsheet
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener killsheet',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


    // STORE




    public function store(Request $request)
    {
        try {

            if (intval($request->api) !== 1) {
                return response()->json([
                    'code' => 0,
                    'msj'  => 'Api no encontrada'
                ]);
            }

            DB::beginTransaction();

          
            if ($request->ID_INFORMACION_KILLSHEET) {

                $info = infokillsheetModel::findOrFail(
                    $request->ID_INFORMACION_KILLSHEET
                );

                $info->update([
                    'TIPO_ENTE_KILL'   => $request->TIPO_ENTE_KILL,
                    'TIPO_POZO_KILL'   => $request->TIPO_POZO_KILL,
                    'TIPO_BOP_KILL'    => $request->TIPO_BOP_KILL,
                    'TIPO_IDIOMA_KILL'  => $request->TIPO_IDIOMA_KILL,
                    'INDICACIONES_KILL'  => $request->INDICACIONES_KILL,

                    'NIVELES_KILLSHEET'    => $request->NIVELES_KILLSHEET ?? [],
                    'DATOS_EJERCICIO_JSON' => $request->DATOS_EJERCICIO_JSON
                        ? json_decode($request->DATOS_EJERCICIO_JSON, true)
                        : [],
                    'PREGUNTAS_JSON'       => $request->PREGUNTAS_JSON
                        ? json_decode($request->PREGUNTAS_JSON, true)
                        : [],
                ]);
            } else {

                $info = infokillsheetModel::create([
                    'TIPO_ENTE_KILL'  => $request->TIPO_ENTE_KILL,
                    'TIPO_POZO_KILL'  => $request->TIPO_POZO_KILL,
                    'TIPO_BOP_KILL'   => $request->TIPO_BOP_KILL,
                    'TIPO_IDIOMA_KILL' => $request->TIPO_IDIOMA_KILL,
                    'INDICACIONES_KILL'  => $request->INDICACIONES_KILL,
                    'NIVELES_KILLSHEET'    => $request->NIVELES_KILLSHEET ?? [],
                    'DATOS_EJERCICIO_JSON' => $request->DATOS_EJERCICIO_JSON
                        ? json_decode($request->DATOS_EJERCICIO_JSON, true)
                        : [],
                    'PREGUNTAS_JSON'       => $request->PREGUNTAS_JSON
                        ? json_decode($request->PREGUNTAS_JSON, true)
                        : [],
                ]);
            }

         
            if (
                intval($request->TIPO_ENTE_KILL)   === 1 &&
                intval($request->TIPO_POZO_KILL)   === 1 &&
                intval($request->TIPO_BOP_KILL)    === 1 &&
                intval($request->TIPO_IDIOMA_KILL) === 2
            ) {

                $killsheetData = $request->except([
                    '_token',
                    'api',
                    'ID_INFORMACION_KILLSHEET',
                    'TIPO_ENTE_KILL',
                    'TIPO_POZO_KILL',
                    'TIPO_BOP_KILL',
                    'TIPO_IDIOMA_KILL',
                    'NIVELES_KILLSHEET',
                    'DATOS_EJERCICIO_JSON',
                    'PREGUNTAS_JSON',
                ]);

                $killsheetData['INFOKILLSHEET_ID'] =
                    $info->ID_INFORMACION_KILLSHEET;

                $killsheet = killsheetiwcfverticalsurfaceModel::where(
                    'INFOKILLSHEET_ID',
                    $info->ID_INFORMACION_KILLSHEET
                )->first();

                if ($killsheet) {
                    $killsheet->update($killsheetData);
                } else {
                    killsheetiwcfverticalsurfaceModel::create($killsheetData);
                }
            }

            DB::commit();

            return response()->json([
                'code'    => 1,
                'success' => true,
                'message' => 'Killsheet guardado correctamente',
                'id'      => $info->ID_INFORMACION_KILLSHEET
            ]);
        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json([
                'code'    => 0,
                'success' => false,
                'message' => 'Error al guardar',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
