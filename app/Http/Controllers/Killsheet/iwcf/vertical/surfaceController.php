<?php

namespace App\Http\Controllers\killsheet\iwcf\vertical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class surfaceController extends Controller
{
  
    public function obtenerKillsheetsfirst()
    {
        try {

            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no autenticado'
                ], 401);
            }

            $candidate = DB::table('candidate')
                ->where('EMAIL_PROJECT', $user->email)
                ->first();

            if (!$candidate) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe registro de candidato'
                ]);
            }

           
            $project = DB::table('proyect')
                ->where('ID_PROJECT', $candidate->ID_PROJECT)
                ->first();

            if (!$project || !$project->ACCREDITATION_LEVELS_PROJECT) {
                return response()->json([
                    'success' => false,
                    'message' => 'El proyecto no tiene niveles asignados'
                ]);
            }

            $nivelesProyecto = json_decode(
                $project->ACCREDITATION_LEVELS_PROJECT,
                true
            );

       
            $killsheet = DB::table('informacion_killsheet')->get()
                ->filter(function ($item) use ($nivelesProyecto) {

                    $nivelesKillsheet = json_decode(
                        $item->NIVELES_KILLSHEET,
                        true
                    );

                    if (!is_array($nivelesKillsheet)) return false;

                    return count(array_intersect(
                        $nivelesProyecto,
                        $nivelesKillsheet
                    )) > 0;
                })
                ->random(1)
                ->first();

            if (!$killsheet) {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay hojas de matar disponibles para tu nivel'
                ]);
            }

            $killsheetTecnica = DB::table('killsheet_iwcf_vertical_surface')
                ->where('INFOKILLSHEET_ID', $killsheet->ID_INFORMACION_KILLSHEET)
                ->first();

         
            $answers = [];

            if ($killsheetTecnica) {

                $camposExcluidos = [
                    'ID_KILLSHEET_IWCF_VERTICAL_SURFACE',
                    'INFOKILLSHEET_ID',
                    'ACTIVO',
                    'created_at',
                    'updated_at',
                ];

                foreach ((array) $killsheetTecnica as $campo => $valor) {

                    if (in_array($campo, $camposExcluidos)) {
                        continue;
                    }

                    if ($valor === null || $valor === '') {
                        continue;
                    }

                    $answers[$campo] = (string) $valor;
                }
            }

        
            session([
                'killsheet_tecnica_' . $user->id => $answers
            ]);

           
            return response()->json([
                'success' => true,
                'data' => [
                    'ID_INFORMACION_KILLSHEET' => $killsheet->ID_INFORMACION_KILLSHEET,
                    'DATOS_EJERCICIO_JSON'     => $killsheet->DATOS_EJERCICIO_JSON,
                    'INDICACIONES_KILL'        => $killsheet->INDICACIONES_KILL ?? '',
                    'PREGUNTAS_JSON'           => $killsheet->PREGUNTAS_JSON ?? [],
                    'ANSWERS'                  => $answers, 
                ]
            ]);
        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al consultar hojas',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


    public function obtenerKillsheetsexercise()
    {
        try {

            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no autenticado'
                ], 401);
            }

            $candidate = DB::table('candidate')
                ->where('EMAIL_PROJECT', $user->email)
                ->first();

            if (!$candidate) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe registro de candidato'
                ]);
            }


            $project = DB::table('proyect')
                ->where('ID_PROJECT', $candidate->ID_PROJECT)
                ->first();

            if (!$project || !$project->ACCREDITATION_LEVELS_PROJECT) {
                return response()->json([
                    'success' => false,
                    'message' => 'El proyecto no tiene niveles asignados'
                ]);
            }

            $nivelesProyecto = json_decode(
                $project->ACCREDITATION_LEVELS_PROJECT,
                true
            );


            $killsheet = DB::table('informacion_killsheet')->get()
                ->filter(function ($item) use ($nivelesProyecto) {

                    $nivelesKillsheet = json_decode(
                        $item->NIVELES_KILLSHEET,
                        true
                    );

                    if (!is_array($nivelesKillsheet)) return false;

                    return count(array_intersect(
                        $nivelesProyecto,
                        $nivelesKillsheet
                    )) > 0;
                })
                ->random(1)
                ->first();

            if (!$killsheet) {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay hojas de matar disponibles para tu nivel'
                ]);
            }

            $killsheetTecnica = DB::table('killsheet_iwcf_vertical_surface')
                ->where('INFOKILLSHEET_ID', $killsheet->ID_INFORMACION_KILLSHEET)
                ->first();


            $answers = [];

            if ($killsheetTecnica) {

                $camposExcluidos = [
                    'ID_KILLSHEET_IWCF_VERTICAL_SURFACE',
                    'INFOKILLSHEET_ID',
                    'ACTIVO',
                    'created_at',
                    'updated_at',
                ];

                foreach ((array) $killsheetTecnica as $campo => $valor) {

                    if (in_array($campo, $camposExcluidos)) {
                        continue;
                    }

                    if ($valor === null || $valor === '') {
                        continue;
                    }

                    $answers[$campo] = (string) $valor;
                }
            }


            session([
                'killsheet_tecnica_' . $user->id => $answers
            ]);


            return response()->json([
                'success' => true,
                'data' => [
                    'ID_INFORMACION_KILLSHEET' => $killsheet->ID_INFORMACION_KILLSHEET,
                    'DATOS_EJERCICIO_JSON'     => $killsheet->DATOS_EJERCICIO_JSON,
                    'INDICACIONES_KILL'        => $killsheet->INDICACIONES_KILL ?? '',
                    'PREGUNTAS_JSON'           => $killsheet->PREGUNTAS_JSON ?? [],
                    'ANSWERS'                  => $answers,
                ]
            ]);
        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al consultar hojas',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
