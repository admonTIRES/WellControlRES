<?php

namespace App\Http\Controllers\Admin\Exercises;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;
//MODELS
use App\Models\Admin\Exercise\Math;
use App\Models\Admin\catalogs\EnteAcreditador;
use App\Models\Admin\catalogs\TipoBOP;
use App\Models\Admin\catalogs\Operacion;
use App\Models\Admin\catalogs\IdiomasExamenes;
use App\Models\Admin\catalogs\NivelAcreditacion;


class MathController extends Controller
{
    //DATATABLE
    public function mathDatatable()
    {
        try {

            $tabla = Math::get();
            $entes = EnteAcreditador::pluck('NOMBRE_ENTE', 'ID_CATALOGO_ENTE')->toArray();
            $niveles = NivelAcreditacion::pluck('DESCRIPCION_NIVEL', 'ID_CATALOGO_NIVELACREDITACION')->toArray();
            $bops = TipoBOP::pluck('DESCRIPCION_TIPOBOP', 'ID_CATALOGO_TIPOBOP')->toArray();
            $operaciones = Operacion::pluck('NOMBRE_OPERACION', 'ID_CATALOGO_OPERACION')->toArray();
            $idiomas = IdiomasExamenes::pluck('NOMBRE_IDIOMA', 'ID_CATALOGO_IDIOMAEXAMEN')->toArray();
            function mapIdsToNames($ids, $catalogo)
            {
                if (!is_array($ids)) {
                    $ids = json_decode($ids, true) ?? [];
                }

                return implode(', ', array_map(function ($id) use ($catalogo) {
                    return $catalogo[$id] ?? '';
                }, array_filter($ids, fn($id) => isset($catalogo[$id]))));
            }
            foreach ($tabla as $value) {

                $value->CERTIFICACIONES_NOMBRES = mapIdsToNames($value->ENTE_MATH ?? [], $entes);
                $value->NIVELES_NOMBRES = mapIdsToNames($value->NIVELES_MATH ?? [], $niveles);
                $value->BOPS_NOMBRES = mapIdsToNames($value->BOP_MATH ?? [], $bops);
                $value->OPERACIONES_NOMBRES = mapIdsToNames($value->OPERATION_MATH ?? [], $operaciones);

                $idiomaId = $value->LANGUAGE_MATH ?? null;
                $value->IDIOMA_NOMBRE = $idiomas[$idiomaId] ?? null;
                switch ($value->TIPO_MATH) {
                    case 1:
                        $tipoNombre = 'Despejes';
                        break;
                    case 2:
                        $tipoNombre = 'Jerarquía';
                        break;
                    case 3:
                        $tipoNombre = 'Fracciones';
                        break;
                    case 4:
                        $tipoNombre = 'Elevación';
                        break;
                    case 5:
                        $tipoNombre = 'Redondeos';
                        break;
                    default:
                        $tipoNombre = 'Sin tipo';
                        break;
                }

                $value->TIPO = $tipoNombre;


                 
                // $OPCIONES_MATH = $value->OPCIONES_MATH ?? null;
                // $value->OPCION_A = $OPCIONES_MATH['OPCION_A'] ?? null;
                // $value->OPCION_A_CORRECT = $OPCIONES_MATH['OPCION_A_CORRECT'] ?? false;
                // $value->OPCION_B = $OPCIONES_MATH['OPCION_B'] ?? null;
                // $value->OPCION_B_CORRECT = $OPCIONES_MATH['OPCION_B_CORRECT'] ?? false;
                // $value->OPCION_C = $OPCIONES_MATH['OPCION_C'] ?? null;
                // $value->OPCION_C_CORRECT = $OPCIONES_MATH['OPCION_C_CORRECT'] ?? false;
                // $value->OPCION_D = $OPCIONES_MATH['OPCION_D'] ?? null;
                // $value->OPCION_D_CORRECT = $OPCIONES_MATH['OPCION_D_CORRECT'] ?? false;

                if ($value->ACTIVO_MATH == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_MATH_EXERCISE . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#mathModal">
                                                                    <span class="btn-inner">
                                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                </button>';
                } else {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_MATH_EXERCISE . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#mathModal">
                                                                    <span class="btn-inner">
                                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                </button>';
                }
            }

            return response()->json([
                'data' => $tabla,
                'msj' => 'Información consultada correctamente'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'msj' => 'Error ' . $e->getMessage(),
                'data' => 0
            ]);
        }
    }
    // STORE
    public function store(Request $request)
    {
        try {
            switch (intval($request->api)) {
                 
                // Caso para pregunta/question
                case 1:
                    function cleanTextareaInput($input)
                    {
                        if (empty($input)) {
                            return null;
                        }
                        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
                    }
                    $ENTE_MATH = $request->has('ENTE_MATH') ? (array)$request->input('ENTE_MATH') : [];
                    $NIVELES_MATH = $request->has('NIVELES_MATH') ? (array)$request->input('NIVELES_MATH') : [];
                    $BOP_MATH = $request->has('BOP_MATH') ? (array)$request->input('BOP_MATH') : [];
                    $OPERATION_MATH = $request->has('OPERATION_MATH') ? (array)$request->input('OPERATION_MATH') : [];

                    //ESTRUSTURA DE LA PREGUNTA 
                    $imagen1 = $request->hasFile('SOLUCIONIMG_MATH') ? $this->uploadFile($request->file('SOLUCIONIMG_MATH')) : null;

                    $OPCIONES_MATH  = [
                        'OPCION_A' => $request->OPCION_A ?? '',
                        'OPCION_A_CORRECT' => $request->OPCION_A == 1 ? $request->TEXTO1_QUESTION : null,
                        'OPCION_B' => $request->OPCION_A == 1 ? $request->TEXTO1_QUESTION : null,
                        'OPCION_B_CORRECT' => $request->OPCION_A == 1 ? $request->TEXTO1_QUESTION : null,
                        'OPCION_C' => $request->OPCION_A == 1 ? $request->TEXTO1_QUESTION : null,
                        'OPCION_C_CORRECT' => $request->OPCION_A == 1 ? $request->TEXTO1_QUESTION : null,
                        'OPCION_D' => $request->OPCION_A == 1 ? $request->TEXTO1_QUESTION : null,
                        'OPCION_D_CORRECT' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on',
                    ];

                    //RESPUESTAS ESTRUCTURA
                    $OPCIONES_MATH = [];
                    $correctas = $request->respuesta_check ? (array)$request->respuesta_check : [];
                    $textos = $request->respuesta_text ? (array)$request->respuesta_text : [];

                    $respuestas = [];

                    for ($i = 0; $i < count($textos); $i++) {
                        $respuestas[] = [
                            'numero' => $i + 1,
                            'texto' => $textos[$i] ?? '',
                            'correcta' => in_array(($i + 1), $correctas)
                        ];
                    }

                    $OPCIONES_MATH = $respuestas;

                    $CALCULADORA_MATH = [];

                    if ($request->ID_MATH_EXERCISE == 0) {
                        $math = Math::create([
                            'TIPO_MATH' => $request->TIPO_MATH,
                            'ENTE_MATH' => $ENTE_MATH,
                            'NIVELES_MATH' => $NIVELES_MATH,
                            'BOP_MATH' => $BOP_MATH,
                            'OPERATION_MATH' => $OPERATION_MATH,
                            'LANGUAGE_MATH' => $request->LANGUAGE_MATH,
                            'FRACCION_MATH' => cleanTextareaInput($request->FRACCION_MATH),
                            'DECIMAL_MATH' => cleanTextareaInput($request->DECIMAL_MATH),
                            'PREGUNTA_MATH' => cleanTextareaInput($request->PREGUNTA_MATH),
                            'FORMULA_MATH' => cleanTextareaInput($request->FORMULA_MATH),
                            'OPCIONES_MATH' => $OPCIONES_MATH,
                            'EXPLICACION_MATH' => $request->EXPLICACION_MATH,
                            'SOLUCIONIMG_MATH' => $request->SOLUCIONIMG_MATH,
                            'CALCULADORA_MATH' => $CALCULADORA_MATH,
                            'ACTIVO_MATH' => 1
                        ]);
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $question = Math::where('ID_MATH_EXERCISE', $request['ID_MATH_EXERCISE'])->update(['ACTIVO_MATH' => 0]);
                                $response['code'] = 1;
                                $response['math'] = 'Desactivado';
                            } else {
                                $question = Math::where('ID_MATH_EXERCISE', $request['ID_MATH_EXERCISE'])->update(['ACTIVO_MATH' => 1]);
                                $response['code'] = 1;
                                $response['math'] = 'Activado';
                            }
                        } else {
                            $math = Math::find($request->ID_MATH_EXERCISE);
                            $math->update([
                                'TIPO_MATH' => $request->TIPO_MATH,
                                'ENTE_MATH' => $ENTE_MATH,
                                'NIVELES_MATH' => $NIVELES_MATH,
                                'BOP_MATH' => $BOP_MATH,
                                'OPERATION_MATH' => $OPERATION_MATH,
                                'LANGUAGE_MATH' => $request->SUBTOPICS_QUESTION,
                                'FRACCION_MATH' => $request->FRACCION_MATH,
                                'DECIMAL_MATH' => $request->DECIMAL_MATH,
                                'PREGUNTA_MATH' =>  cleanTextareaInput($request->PREGUNTA_MATH),
                                'FORMULA_MATH' =>  cleanTextareaInput($request->FORMULA_MATH),
                                'OPCIONES_MATH' => $OPCIONES_MATH,
                                'EXPLICACION_MATH' =>  cleanTextareaInput($request->EXPLICACION_MATH),
                                'SOLUCIONIMG_MATH' => $request->SOLUCIONIMG_MATH,
                                'CALCULADORA_MATH' => $CALCULADORA_MATH
                            ]);
                            $response['code'] = 1;
                            $response['math'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['math']  = $math;
                    return response()->json($response);
                    break;

                default:
                    $response['code'] = 1;
                    $response['msj'] = 'Api no encontrada';
                    return response()->json($response);
            }
        } catch (Exception $e) {
            return response()->json('Error al guardar la información');
        }
    }

    //limpiar los textareas
   
}
