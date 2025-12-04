<?php

namespace App\Http\Controllers\Admin\Exercises;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;
use Illuminate\Support\Facades\Log;
//MODELS
use App\Models\Admin\Exercise\Question;
use App\Models\Admin\catalogs\EnteAcreditador;
use App\Models\Admin\catalogs\TemaPreguntas;
use App\Models\Admin\catalogs\SubtemaPreguntas;
use App\Models\Admin\catalogs\IdiomasExamenes;
use App\Models\Admin\catalogs\NivelAcreditacion;
use App\Models\Admin\Exercise\Exam;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    //DATATABLE
    public function questionDatatable()
    {
        try {
            $tabla = Question::get();
            $entes = EnteAcreditador::pluck('NOMBRE_ENTE', 'ID_CATALOGO_ENTE')->toArray();
            $temas = TemaPreguntas::pluck('NOMBRE_TEMA', 'ID_CATALOGO_TEMAPREGUNTA')->toArray();
            $subtemas = SubtemaPreguntas::pluck('NOMBRE_SUBTEMA', 'ID_CATALOGO_SUBTEMA')->toArray();
            $idiomas = IdiomasExamenes::pluck('NOMBRE_IDIOMA', 'ID_CATALOGO_IDIOMAEXAMEN')->toArray();
            $niveles = NivelAcreditacion::pluck('DESCRIPCION_NIVEL', 'ID_CATALOGO_NIVELACREDITACION')->toArray();
            $tipoEvaluacion = ["","Diagnóstica", "Intermedia", "Final"];

            function mapIdsToNames($ids, $catalogo)
            {
                if (!is_array($ids)) {
                    $ids = json_decode($ids, true) ?? [];
                }

                return implode(', ', array_map(function ($id) use ($catalogo) {
                    return $catalogo[$id] ?? '';
                }, array_filter($ids, fn($id) => isset($catalogo[$id]))));
            }

            $folios = [];
            foreach ($tabla as $value) {
                $temasIds = is_array($value->TOPICS_QUESTION)
                    ? $value->TOPICS_QUESTION
                    : json_decode($value->TOPICS_QUESTION, true);
                $i = !empty($temasIds) ? $temasIds[0] : '0';

                $subtemasIds = is_array($value->SUBTOPICS_QUESTION)
                    ? $value->SUBTOPICS_QUESTION
                    : json_decode($value->SUBTOPICS_QUESTION, true);
                $x = !empty($subtemasIds) ? $subtemasIds[0] : '0';

                $clave = "{$i}.{$x}";

                if (!isset($folios[$clave])) {
                    $folios[$clave] = 0;
                }

                $folios[$clave]++;

                $n = $folios[$clave];

                $value->FOLIO_PREGUNTA = "{$i}.{$x}.{$n}";
                $value->TIPO_EVALUACION_NOMBRES = mapIdsToNames($value->EVALUATION_TYPES_QUESTION ?? [], $tipoEvaluacion);
                $value->CERTIFICACIONES_NOMBRES = mapIdsToNames($value->ACCREDITATION_ENTITIES_QUESTION ?? [], $entes);
                $value->TEMAS_NOMBRES = mapIdsToNames($value->TOPICS_QUESTION ?? [], $temas);
                $value->NIVELES_NOMBRES = mapIdsToNames($value->LEVELS_QUESTION ?? [], $niveles);
                $value->SUBTEMAS_NOMBRES = mapIdsToNames($value->SUBTOPICS_QUESTION ?? [], $subtemas);
                $idiomaId = $value->LANGUAGE_ID_QUESTION ?? null;
                $value->IDIOMA_NOMBRE = $idiomas[$idiomaId] ?? null;

                $QUESTION_STRUCTURE_QUESTION = $value->QUESTION_STRUCTURE_QUESTION ?? null;
                $value->TIPO1_QUESTION = $QUESTION_STRUCTURE_QUESTION['TIPO1_QUESTION'] ?? null;
                $value->TEXTO1_QUESTION = $QUESTION_STRUCTURE_QUESTION['TEXTO1_QUESTION'] ?? null;
                $value->SECCION_EXTRA1 = $QUESTION_STRUCTURE_QUESTION['SECCION_EXTRA1'] ?? false;
                $value->TIPO2_QUESTION = $QUESTION_STRUCTURE_QUESTION['TIPO2_QUESTION'] ?? null;
                $value->TEXTO2_QUESTION = $QUESTION_STRUCTURE_QUESTION['TEXTO2_QUESTION'] ?? null;
                $value->SECCION_EXTRA2 = $QUESTION_STRUCTURE_QUESTION['SECCION_EXTRA2'] ?? false;
                $value->TIPO3_QUESTION = $QUESTION_STRUCTURE_QUESTION['TIPO3_QUESTION'] ?? null;
                $value->TEXTO3_QUESTION = $QUESTION_STRUCTURE_QUESTION['TEXTO3_QUESTION'] ?? null;


                $value->IMAGEN1_QUESTION = isset($QUESTION_STRUCTURE_QUESTION['IMAGEN1_QUESTION']) 
                    ? $QUESTION_STRUCTURE_QUESTION['IMAGEN1_QUESTION'] 
                    : null;

                $value->IMAGEN2_QUESTION = isset($QUESTION_STRUCTURE_QUESTION['IMAGEN2_QUESTION']) 
                    ? $QUESTION_STRUCTURE_QUESTION['IMAGEN2_QUESTION'] 
                    : null;

                $value->IMAGEN3_QUESTION = isset($QUESTION_STRUCTURE_QUESTION['IMAGEN3_QUESTION']) 
                    ? $QUESTION_STRUCTURE_QUESTION['IMAGEN3_QUESTION']
                    : null;


                // foreach ($tabla as $value) {

                // }


                if ($value->ACTIVO_QUESTION == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_QUESTION . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#temaModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_QUESTION . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#temaModal">
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

    public function examDatatable()
    {
        try {
            $tabla = Exam::get();
            $entes = EnteAcreditador::pluck('NOMBRE_ENTE', 'ID_CATALOGO_ENTE')->toArray();
            $idiomas = IdiomasExamenes::pluck('NOMBRE_IDIOMA', 'ID_CATALOGO_IDIOMAEXAMEN')->toArray();
            $niveles = NivelAcreditacion::pluck('DESCRIPCION_NIVEL', 'ID_CATALOGO_NIVELACREDITACION')->toArray();
            $tipoEvaluacion = ["","Diagnóstica", "Intermedia", "Final"];

            function mapIdsToName($ids, $catalogo)
            {
                if (!is_array($ids)) {
                    $ids = json_decode($ids, true) ?? [];
                }

                return implode(', ', array_map(function ($id) use ($catalogo) {
                    return $catalogo[$id] ?? '';
                }, array_filter($ids, fn($id) => isset($catalogo[$id]))));
            }
            foreach ($tabla as $value) {
                
                $value->TIPO_EVALUACION_NOMBRES = mapIdsToName($value->EVALUATION_TYPES_EXAM ?? [], $tipoEvaluacion);
                $value->CERTIFICACIONES_NOMBRES = mapIdsToName($value->ACCREDITATION_ENTITIES_EXAM ?? [], $entes);
                $value->NIVELES_NOMBRES = mapIdsToName($value->LEVELS_EXAM ?? [], $niveles);
                $idiomaId = $value->LANGUAGE_ID_EXAM ?? null;
                $value->IDIOMA_NOMBRE = $idiomas[$idiomaId] ?? null;


                if ($value->ACTIVO_EXAM == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_EXAM . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#temaModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_EXAM . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#temaModal">
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
                    $ACCREDITATION_ENTITIES_QUESTION = $request->has('ACCREDITATION_ENTITIES_QUESTION') ? (array)$request->input('ACCREDITATION_ENTITIES_QUESTION') : [];
                    $LEVELS_QUESTION = $request->has('LEVELS_QUESTION') ? (array)$request->input('LEVELS_QUESTION') : [];
                    $BOPS_QUESTION = $request->has('BOPS_QUESTION') ? (array)$request->input('BOPS_QUESTION') : [];
                    $TOPICS_QUESTION = $request->has('TOPICS_QUESTION') ? (array)$request->input('TOPICS_QUESTION') : [];
                    $SUBTOPICS_QUESTION = $request->has('SUBTOPICS_QUESTION') ? (array)$request->input('SUBTOPICS_QUESTION') : [];
                    $EVALUATION_TYPES_QUESTION = $request->has('EVALUATION_TYPES_QUESTION') ? (array)$request->input('EVALUATION_TYPES_QUESTION') : [];


                   
                    // $QUESTION_STRUCTURE_QUESTION  = [
                    //     'TIPO1_QUESTION' => $request->TIPO1_QUESTION ?? '',
                    //     'TEXTO1_QUESTION' => $request->TIPO1_QUESTION == 1 ? $request->TEXTO1_QUESTION : null,
                    //     'IMAGEN1_QUESTION' => $request->TIPO1_QUESTION == 2 ? $imagen1 : null,
                    //     'SECCION_EXTRA1' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on',
                    //     'TIPO2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' ? ($request->TIPO2_QUESTION ?? '') : '',
                    //     'TEXTO2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' && $request->TIPO2_QUESTION == 1 ? $request->TEXTO2_QUESTION : null,
                    //     'IMAGEN2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' && $request->TIPO2_QUESTION == 2 ? $imagen2 : null,
                    //     'SECCION_EXTRA2' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on',
                    //     'TIPO3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' ? ($request->TIPO3_QUESTION ?? '') : '',
                    //     'TEXTO3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' && $request->TIPO3_QUESTION == 1 ? $request->TEXTO3_QUESTION : null,
                    //     'IMAGEN3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' && $request->TIPO3_QUESTION == 2 ? $imagen3 : null,
                    // ];

                    //RESPUESTAS ESTRUCTURA
                    $ANSWERS_QUESTION = [];
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

                    $ANSWERS_QUESTION = $respuestas;

                    if ($request->ID_QUESTION == 0) {
                        $question = Question::create([
                            'ACCREDITATION_ENTITIES_QUESTION' => $ACCREDITATION_ENTITIES_QUESTION,
                            'LEVELS_QUESTION' => $LEVELS_QUESTION,
                            'BOPS_QUESTION' => $BOPS_QUESTION,
                            'LANGUAGE_ID_QUESTION' => $request->LANGUAGE_ID_QUESTION,
                            'TOPICS_QUESTION' => $TOPICS_QUESTION,
                            'SUBTOPICS_QUESTION' => $SUBTOPICS_QUESTION,
                           'QUESTION_STRUCTURE_QUESTION' => [],
                            'ANSWER_TYPE_QUESTION' => $request->ANSWER_TYPE_QUESTION,
                            'ANSWER_OPTIONS_QUESTION' => $request->ANSWER_OPTIONS_QUESTION,
                            'CORRECT_ANSWERS_QUESTION' => $request->CORRECT_ANSWERS_QUESTION,
                            'ANSWERS_QUESTION' => $ANSWERS_QUESTION,
                            'MIN_RANGE_QUESTION' => $request->MIN_RANGE_QUESTION,
                            'MAX_RANGE_QUESTION' => $request->MAX_RANGE_QUESTION,
                            'TIME_MINUTES_QUESTION' => $request->TIME_MINUTES_QUESTION,
                            'SCORE_QUESTION' => $request->SCORE_QUESTION,
                            'EVALUATION_TYPES_QUESTION' => $EVALUATION_TYPES_QUESTION,
                            'TEMAPREGUNTA_ID' => $request->TEMAPREGUNTA_ID,
                            'HAS_FEEDBACK_QUESTION' => $request->HAS_FEEDBACK_QUESTION,
                            'FEEDBACK_TEXT_QUESTION' => $request->FEEDBACK_TEXT_QUESTION,
                            'USES_QUESTION' => 0, //SIN USOS PREGUNTA NUEVA
                            'APPROVAL_QUESTION' => 0, //SIN APROBAR
                            'PERCENT_QUESTION' => 0, // SIN PORCENTAJE
                            'ACTIVO_QUESTION' => 1
                        ]);

                        $idQuestion = $question->ID_QUESTION;
                        $imagen1 = $request->hasFile('IMAGEN1_QUESTION') ? $this->uploadFile($request->file('IMAGEN1_QUESTION'), $idQuestion, 1) : null;
                        $imagen2 = $request->hasFile('IMAGEN2_QUESTION') ? $this->uploadFile($request->file('IMAGEN2_QUESTION'), $idQuestion, 2) : null;
                        $imagen3 = $request->hasFile('IMAGEN3_QUESTION') ? $this->uploadFile($request->file('IMAGEN3_QUESTION'), $idQuestion, 3) : null;

                        $QUESTION_STRUCTURE_QUESTION  = [
                            'TIPO1_QUESTION' => $request->TIPO1_QUESTION ?? '',
                            'TEXTO1_QUESTION' => $request->TIPO1_QUESTION == 1 ? $request->TEXTO1_QUESTION : null,
                            'IMAGEN1_QUESTION' => $request->TIPO1_QUESTION == 2 ? $imagen1 : null,
                            'SECCION_EXTRA1' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on',
                            'TIPO2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' ? ($request->TIPO2_QUESTION ?? '') : '',
                            'TEXTO2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' && $request->TIPO2_QUESTION == 1 ? $request->TEXTO2_QUESTION : null,
                            'IMAGEN2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' && $request->TIPO2_QUESTION == 2 ? $imagen2 : null,
                            'SECCION_EXTRA2' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on',
                            'TIPO3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' ? ($request->TIPO3_QUESTION ?? '') : '',
                            'TEXTO3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' && $request->TIPO3_QUESTION == 1 ? $request->TEXTO3_QUESTION : null,
                            'IMAGEN3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' && $request->TIPO3_QUESTION == 2 ? $imagen3 : null,
                        ];

                        $question->QUESTION_STRUCTURE_QUESTION = $QUESTION_STRUCTURE_QUESTION;
                        $question->save();
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $question = Question::where('ID_QUESTION', $request['ID_QUESTION'])->update(['ACTIVO_QUESTION' => 0]);
                                $response['code'] = 1;
                                $response['question'] = 'Desactivado';
                            } else {
                                $question = Question::where('ID_QUESTION', $request['ID_QUESTION'])->update(['ACTIVO_QUESTION' => 1]);
                                $response['code'] = 1;
                                $response['question'] = 'Activado';
                            }
                        } else {
                            $question = Question::find($request->ID_QUESTION);
                            $idQuestion = $question->ID_QUESTION;
                            $QUESTION_STRUCTURE_ACTUAL = $question->QUESTION_STRUCTURE_QUESTION ?? [];
                            
                            $imagen1 = null;
                            if ($request->hasFile('IMAGEN1_QUESTION')) {
                                if (isset($QUESTION_STRUCTURE_ACTUAL['IMAGEN1_QUESTION']) && $QUESTION_STRUCTURE_ACTUAL['IMAGEN1_QUESTION']) {
                                    Storage::delete($QUESTION_STRUCTURE_ACTUAL['IMAGEN1_QUESTION']);
                                }
                                $imagen1 = $this->uploadFile($request->file('IMAGEN1_QUESTION'), $idQuestion, 1);
                            } else {
                                $imagen1 = $QUESTION_STRUCTURE_ACTUAL['IMAGEN1_QUESTION'] ?? null;
                            }
                            
                            $imagen2 = null;
                            if ($request->hasFile('IMAGEN2_QUESTION')) {
                                if (isset($QUESTION_STRUCTURE_ACTUAL['IMAGEN2_QUESTION']) && $QUESTION_STRUCTURE_ACTUAL['IMAGEN2_QUESTION']) {
                                    Storage::delete($QUESTION_STRUCTURE_ACTUAL['IMAGEN2_QUESTION']);
                                }
                                $imagen2 = $this->uploadFile($request->file('IMAGEN2_QUESTION'), $idQuestion, 2);
                            } else {
                                $imagen2 = $QUESTION_STRUCTURE_ACTUAL['IMAGEN2_QUESTION'] ?? null;
                            }
                            
                            $imagen3 = null;
                            if ($request->hasFile('IMAGEN3_QUESTION')) {
                                if (isset($QUESTION_STRUCTURE_ACTUAL['IMAGEN3_QUESTION']) && $QUESTION_STRUCTURE_ACTUAL['IMAGEN3_QUESTION']) {
                                    Storage::delete($QUESTION_STRUCTURE_ACTUAL['IMAGEN3_QUESTION']);
                                }
                                $imagen3 = $this->uploadFile($request->file('IMAGEN3_QUESTION'), $idQuestion, 3);
                            } else {
                                $imagen3 = $QUESTION_STRUCTURE_ACTUAL['IMAGEN3_QUESTION'] ?? null;
                            }
                            
                            $QUESTION_STRUCTURE_QUESTION  = [
                                'TIPO1_QUESTION' => $request->TIPO1_QUESTION ?? '',
                                'TEXTO1_QUESTION' => $request->TIPO1_QUESTION == 1 ? $request->TEXTO1_QUESTION : null,
                                'IMAGEN1_QUESTION' => $request->TIPO1_QUESTION == 2 ? $imagen1 : null,
                                'SECCION_EXTRA1' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on',
                                'TIPO2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' ? ($request->TIPO2_QUESTION ?? '') : '',
                                'TEXTO2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' && $request->TIPO2_QUESTION == 1 ? $request->TEXTO2_QUESTION : null,
                                'IMAGEN2_QUESTION' => $request->has('SECCION_EXTRA1') && $request->SECCION_EXTRA1 == 'on' && $request->TIPO2_QUESTION == 2 ? $imagen2 : null,
                                'SECCION_EXTRA2' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on',
                                'TIPO3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' ? ($request->TIPO3_QUESTION ?? '') : '',
                                'TEXTO3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' && $request->TIPO3_QUESTION == 1 ? $request->TEXTO3_QUESTION : null,
                                'IMAGEN3_QUESTION' => $request->has('SECCION_EXTRA2') && $request->SECCION_EXTRA2 == 'on' && $request->TIPO3_QUESTION == 2 ? $imagen3 : null,
                            ];

                            $question->update([
                                'ACCREDITATION_ENTITIES_QUESTION' => $ACCREDITATION_ENTITIES_QUESTION,
                                'LEVELS_QUESTION' => $LEVELS_QUESTION,
                                'BOPS_QUESTION' => $BOPS_QUESTION,
                                'LANGUAGE_ID_QUESTION' => $request->LANGUAGE_ID_QUESTION,
                                'TOPICS_QUESTION' => $TOPICS_QUESTION,
                                'SUBTOPICS_QUESTION' => $SUBTOPICS_QUESTION,
                                'QUESTION_STRUCTURE_QUESTION' => $QUESTION_STRUCTURE_QUESTION,
                                'ANSWER_TYPE_QUESTION' => $request->ANSWER_TYPE_QUESTION,
                                'ANSWER_OPTIONS_QUESTION' => $request->ANSWER_OPTIONS_QUESTION,
                                'CORRECT_ANSWERS_QUESTION' => $request->CORRECT_ANSWERS_QUESTION,
                                'ANSWERS_QUESTION' => $ANSWERS_QUESTION,
                                'MIN_RANGE_QUESTION' => $request->MIN_RANGE_QUESTION,
                                'MAX_RANGE_QUESTION' => $request->MAX_RANGE_QUESTION,
                                'TIME_MINUTES_QUESTION' => $request->TIME_MINUTES_QUESTION,
                                'SCORE_QUESTION' => $request->SCORE_QUESTION,
                                'EVALUATION_TYPES_QUESTION' => $EVALUATION_TYPES_QUESTION,
                                'TEMAPREGUNTA_ID' => $request->TEMAPREGUNTA_ID,
                                'HAS_FEEDBACK_QUESTION' => $request->HAS_FEEDBACK_QUESTION,
                                'FEEDBACK_TEXT_QUESTION' => isset($request->FEEDBACK_TEXT_QUESTION) 
                                ? $this->cleanTextareaInput($request->FEEDBACK_TEXT_QUESTION) 
                                : null,

                            ]);
                            $response['code'] = 1;
                            $response['question'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['question']  = $question;
                    return response()->json($response);
                break;

                case 2:
                    $ACCREDITATION_ENTITIES_EXAM = $request->has('ACCREDITATION_ENTITIES_EXAM') ? (array)$request->input('ACCREDITATION_ENTITIES_EXAM') : [];
                    $LEVELS_EXAM = $request->has('LEVELS_EXAM') ? (array)$request->input('LEVELS_EXAM') : [];
                    $BOPS_EXAM = $request->has('BOPS_EXAM') ? (array)$request->input('BOPS_EXAM') : [];
                    $EVALUATION_TYPES_EXAM = $request->has('EVALUATION_TYPES_EXAM') ? (array)$request->input('EVALUATION_TYPES_EXAM') : [];

                    //TEMAS Y SUBTEMAS ESTRUCTURA

                    if ($request->ID_EXAM == 0) {
                        $exam = Exam::create([
                            'ACCREDITATION_ENTITIES_EXAM' => $ACCREDITATION_ENTITIES_EXAM,
                            'LEVELS_EXAM' => $LEVELS_EXAM,
                            'BOPS_EXAM' => $BOPS_EXAM,
                            'LANGUAGE_ID_EXAM' => $request->LANGUAGE_ID_EXAM,
                            'EVALUATION_TYPES_EXAM' => $EVALUATION_TYPES_EXAM, 
                            'NAME_EXAM' => $request->NAME_EXAM,
                            'TEMAS_EXAM' => json_decode($request->TEMAS_EXAM, true),
                            'TOTAL_QUESTIONS_EXAM' => $request->TOTAL_QUESTIONS_EXAM,
                            'TOTAL_TIME_EXAM' => $request->TOTAL_TIME_EXAM,
                            'TOTAL_POINT_EXAM' => $request->TOTAL_POINT_EXAM,
                            'USES_EXAM' => 0,
                            'APPROVAL_EXAM' => 0,
                            'PERCENT_EXAM' => 0,
                            'ACTIVO_EXAM' => 1
                        ]);
                        $TEMAS_EXAM = [];

                        // $exam->TEMAS_EXAM = $TEMAS_EXAM;
                        $exam->save();
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $exam = Exam::where('ID_EXAM', $request['ID_EXAM'])->update(['ACTIVO_EXAM' => 0]);
                                $response['code'] = 1;
                                $response['exam'] = 'Desactivado';
                            } else {
                                $exam = Exam::where('ID_EXAM', $request['ID_EXAM'])->update(['ACTIVO_EXAM' => 1]);
                                $response['code'] = 1;
                                $response['exam'] = 'Activado';
                            }
                        } else {
                            $exam = Exam::find($request->ID_EXAM);
                            // $TEMAS_EXAM = $exam->TEMAS_EXAM ?? [];
                            // $TEMAS_EXAM = [];

                            $exam->update([
                                'ACCREDITATION_ENTITIES_EXAM' => $ACCREDITATION_ENTITIES_EXAM,
                                'LEVELS_EXAM' => $LEVELS_EXAM,
                                'BOPS_EXAM' => $BOPS_EXAM,
                                'LANGUAGE_ID_EXAM' => $request->LANGUAGE_ID_EXAM,
                                'EVALUATION_TYPES_EXAM' => $EVALUATION_TYPES_EXAM, 
                                'NAME_EXAM' => $request->NAME_EXAM,
                                'TEMAS_EXAM' => json_decode($request->TEMAS_EXAM, true),
                                'TOTAL_QUESTIONS_EXAM' => $request->TOTAL_QUESTIONS_EXAM,
                                'TOTAL_TIME_EXAM' => $request->TOTAL_TIME_EXAM,
                                'TOTAL_POINT_EXAM' => $request->TOTAL_POINT_EXAM,
                                'USES_EXAM' => 0,
                                'APPROVAL_EXAM' => 0,
                                'PERCENT_EXAM' => 0,
                                'ACTIVO_EXAM' => 1

                            ]);
                            $response['code'] = 1;
                            $response['exam'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['exam']  = $exam;
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
    public function cleanTextareaInput($input)
    {
        if (empty($input)) {
            return null; 
        }
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }

   private function uploadFile($file, $questionId, $tipoImagen)
    {
        if (!$file || !$file->isValid()) {
            return null;
        }
        try {
            $directorio = 'admin/exam/questions/' . $questionId . '/imagen';
            $extension = $file->getClientOriginalExtension();
            $nombreArchivo = $tipoImagen . '.' . $extension;
            $rutaCompleta = $file->storeAs($directorio, $nombreArchivo);
            return $rutaCompleta;
            
        } catch (\Exception $e) {
            return null;
        }
    }

    public function showImage($ruta)
    {
        if (Storage::exists($ruta)) {
            return Storage::response($ruta);
        }

        abort(404, 'Imagen no encontrada');
    }
    public function getTemas(Request $request)
    {
        $entesIds = json_decode($request->input('entes', '[]'), true);

        if (!is_array($entesIds) || empty($entesIds)) {
            return response()->json(['error' => 'El parámetro "entes" no es válido o está vacío'], 400);
        }

        try {
            $temas = TemaPreguntas::whereHas('subtemas', function ($query) use ($entesIds) {
                foreach ($entesIds as $enteId) {
                    $query->orWhereRaw('FIND_IN_SET(?, CERTIFICACION_SUBTEMA)', [$enteId]);
                }
            })
            ->with(['subtemas' => function ($query) use ($entesIds) {
                foreach ($entesIds as $enteId) {
                    $query->orWhereRaw('FIND_IN_SET(?, CERTIFICACION_SUBTEMA)', [$enteId]);
                }
            }])
            ->get();

            return response()->json($temas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un problema al cargar los temas', 'message' => $e->getMessage()], 500);
        }
    }

}
