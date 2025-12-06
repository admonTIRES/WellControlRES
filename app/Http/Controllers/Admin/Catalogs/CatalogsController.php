<?php

namespace App\Http\Controllers\Admin\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;
use Illuminate\Support\Facades\Storage;

// MODELOS
use App\Models\Admin\catalogs\EnteAcreditador;
use App\Models\Admin\catalogs\NivelAcreditacion;
use App\Models\Admin\catalogs\TipoBOP;
use App\Models\Admin\catalogs\TemaPreguntas;
use App\Models\Admin\catalogs\SubtemaPreguntas;
use App\Models\Admin\catalogs\IdiomasExamenes;
use App\Models\Admin\catalogs\Membresias;
use App\Models\Admin\catalogs\Operacion;
use App\Models\Admin\catalogs\NombreProyecto;
use App\Models\Admin\catalogs\Instructor;
use App\Models\Admin\catalogs\CentrosCapacitacion;
use App\Models\Admin\catalogs\Ubicaciones;
use App\Models\Admin\catalogs\Clientes;
use DateTime;



class CatalogsController extends Controller
{
    // DATATABLE - CATALOGOS
    public function entesDatatable()
    {
        try {
            $tabla = EnteAcreditador::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_ENTE == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_ENTE . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_ENTE . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
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

    public function nivelesDatatable()
    {
        try {
            $tabla = NivelAcreditacion::get();
            $entes = EnteAcreditador::pluck('NOMBRE_ENTE', 'ID_CATALOGO_ENTE')->toArray();
            foreach ($tabla as $value) {
                $value->ACREDITACION_NOMBRE = $entes[$value->ACREDITACION_NIVEL] ?? 'No especificado';
                if ($value->ACTIVO_NIVEL == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_NIVEL . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#nivelModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_NIVEL . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#nivelModal">
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

    public function tiposbopDatatable()
    {
        try {
            $tabla = TipoBOP::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_TIPOBOP == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_TIPOBOP . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#tipobopModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_TIPOBOP . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#tipobopModal">
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

    public function temasDatatable()
    {
        try {
            $tabla = TemaPreguntas::get();
            $entes = EnteAcreditador::pluck('NOMBRE_ENTE', 'ID_CATALOGO_ENTE')->toArray();
            foreach ($tabla as $value) {
                $certificacionesIds = $value->CERTIFICACION_TEMA ?? [];

                $nombresEntes = [];
                foreach ($certificacionesIds as $id) {
                    if (isset($entes[$id])) {
                        $nombresEntes[] = $entes[$id];
                    }
                }

                $value->CERTIFICACIONES_NOMBRES  = implode(', ', $nombresEntes);

                if ($value->ACTIVO_TEMA == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_TEMA . '">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_TEMA . '" checked>
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

    public function centrosDatatable()
    {
        try {
            $tabla = CentrosCapacitacion::get();
            $entes = EnteAcreditador::pluck('NOMBRE_ENTE', 'ID_CATALOGO_ENTE')->toArray();

            foreach ($tabla as $value) {
                // MOSTRAR NOMBRE DEL ENTE EN LUGAR DEL ID
                if (isset($entes[$value->ACREDITACION_CENTRO])) {
                    $value->NOMBRE_ENTE = $entes[$value->ACREDITACION_CENTRO];
                } else {
                    $value->NOMBRE_ENTE = 'No especificado';
                }

                // MOSTRAR TIPO DE CENTRO EN TEXTO
                if ($value->TIPO_CENTRO == 1) {
                    $value->TIPO_CENTRO_TEXTO = 'ASOCIADO';
                } elseif ($value->TIPO_CENTRO == 2) {
                    $value->TIPO_CENTRO_TEXTO = 'PRIMARIO';
                } else {
                    $value->TIPO_CENTRO_TEXTO = 'No especificado';
                }

                // CALCULAR VIGENCIA Y COLOR
                $vigenciaInfo = $this->calcularVigencia($value->VIGENCIA_DESDE_CENTRO, $value->VIGENCIA_HASTA_CENTRO);
                $value->VIGENCIA_TEXTO = $vigenciaInfo['texto'];
                $value->COLOR_FILA = $vigenciaInfo['color'];
                $value->DIAS_RESTANTES = $vigenciaInfo['dias_restantes'];
                $value->PORCENTAJE = $vigenciaInfo['porcentaje'];

                // BOTÓN EDITAR
                $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#centroModal">
                                    <span class="btn-inner">
                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </button>';

                // BOTÓN PDF
                $tieneDocumento = false;
                $rutaDocumento = '';
                $idCentro = $value->ID_CATALOGO_CENTRO;

                if (!empty($value->DOC_CENTRO)) {
                    try {
                        $docData = json_decode($value->DOC_CENTRO, true);

                        if (json_last_error() === JSON_ERROR_NONE && is_array($docData) && !empty($docData)) {
                            $primerDoc = $docData[0];
                            $tieneDocumento = true;
                            $rutaCompleta = $primerDoc['ruta'] ?? '';
                            $nombreArchivo = basename($rutaCompleta);
                            $rutaDocumento = $nombreArchivo;
                        }
                    } catch (Exception $e) {
                        $tieneDocumento = !empty($value->DOC_CENTRO);
                        $rutaDocumento = basename($value->DOC_CENTRO);
                    }
                }

                $value->BTN_PDF = $tieneDocumento ?
                    '<button type="button" class="btn btn-sm btn-icon btn-info VER_PDF" data-toggle="tooltip" data-placement="top" title="Ver PDF" data-id="' . $idCentro . '" data-ruta="' . htmlspecialchars($rutaDocumento, ENT_QUOTES) . '">
                    <span class="btn-inner">
                        <i class="fas fa-file-pdf"></i>
                    </span>
                </button>' :
                    '<button type="button" class="btn btn-sm btn-icon btn-secondary" disabled data-toggle="tooltip" data-placement="top" title="Sin documento">
                    <span class="btn-inner">
                        <i class="fas fa-file-pdf"></i>
                    </span>
                </button>';
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
    public function ubicacionesDatatable()
    {
        try {
            $tabla = Ubicaciones::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_UBICACION == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_UBICACION . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_UBICACION . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
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


    // FUNCIÓN PARA CALCULAR VIGENCIA (CORREGIDA - POR PORCENTAJE)
    private function calcularVigencia($fechaDesde, $fechaHasta)
    {
        $hoy = new DateTime();

        // Si no hay fechas válidas
        if (!$fechaDesde || !$fechaHasta) {
            return [
                'texto' => 'SIN FECHAS',
                'color' => 'fila-gris',
                'dias_restantes' => 0,
                'porcentaje' => 0
            ];
        }

        $desde = new DateTime($fechaDesde);
        $hasta = new DateTime($fechaHasta);

        // Formatear fechas para comparación solo por día (sin hora)
        $hoyFormateado = $hoy->format('Y-m-d');
        $hastaFormateado = $hasta->format('Y-m-d');

        // Si la fecha de vencimiento es hoy
        if ($hoyFormateado == $hastaFormateado) {
            return [
                'texto' => 'VENCE HOY (0 días)',
                'color' => 'fila-vence-hoy',
                'dias_restantes' => 0,
                'porcentaje' => 100
            ];
        }

        // Si la fecha de vencimiento ya pasó (después de hoy)
        if ($hoy > $hasta) {
            $diasVencido = $hoy->diff($hasta)->days;
            $textoVencido = $diasVencido == 1 ? 'VENCIDO (1 día)' : 'VENCIDO (' . $diasVencido . ' días)';

            return [
                'texto' => $textoVencido,
                'color' => 'fila-vencido',
                'dias_restantes' => 0,
                'porcentaje' => 100
            ];
        }

        // Calcular días totales y días transcurridos
        $diasTotales = $hasta->diff($desde)->days;
        $diasTranscurridos = $hoy->diff($desde)->days;
        $diasRestantes = $hasta->diff($hoy)->days;

        // Calcular porcentaje transcurrido
        $porcentajeTranscurrido = $diasTotales > 0 ? ($diasTranscurridos / $diasTotales) * 100 : 0;

        // DETERMINAR COLOR SEGÚN PORCENTAJE TRANSCURRIDO
        if ($porcentajeTranscurrido <= 40) {
            // 0% - 40%: VERDE
            $color = 'fila-verde';
            $estado = 'VIGENTE';
        } elseif ($porcentajeTranscurrido <= 70) {
            // 41% - 70%: AMARILLO
            $color = 'fila-amarillo';
            $estado = 'VIGENTE';
        } else {
            // 71% - 100%: ROJO (pero aún vigente)
            $color = 'fila-rojo';
            $estado = 'VIGENTE';
        }

        // Texto con días en singular o plural
        $textoDias = $diasRestantes == 1 ? '1 día' : $diasRestantes . ' días';

        return [
            'texto' => $estado . ' (' . $textoDias . ')',
            'color' => $color,
            'dias_restantes' => $diasRestantes,
            'porcentaje' => round($porcentajeTranscurrido, 1)
        ];
    }

    public function clienteDatatable()
    {
        try {
            $tabla = Clientes::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_CLIENTE == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                            <input class="form-check-input ACTIVAR_CLIENTE" type="checkbox" data-id="' . $value->ID_CATALOGO_CLIENTE . '">
                                                        </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR_CLIENTE" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#clienteModal">
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
                                            <input class="form-check-input ACTIVAR_CLIENTE" type="checkbox" data-id="' . $value->ID_CATALOGO_CLIENTE . '" checked>
                                        </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR_CLIENTE" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#clienteModal">
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

    public function subtemasDatatable()
    {
        try {
            $tabla = SubtemaPreguntas::get();
            $entes = EnteAcreditador::pluck('NOMBRE_ENTE', 'ID_CATALOGO_ENTE')->toArray();
            foreach ($tabla as $value) {
                $certificacionesIds = $value->CERTIFICACION_SUBTEMA ?? [];

                $nombresEntes = [];
                foreach ($certificacionesIds as $id) {
                    if (isset($entes[$id])) {
                        $nombresEntes[] = $entes[$id];
                    }
                }

                $value->CERTIFICACIONES_NOMBRES  = implode(', ', $nombresEntes);

                if ($value->ACTIVO_SUBTEMA == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_SUBTEMA . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#subtemaModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_SUBTEMA . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#subtemaModal">
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

    public function idiomasDatatable()
    {
        try {
            $tabla = IdiomasExamenes::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_IDIOMA == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_IDIOMAS . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#idiomaModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_IDIOMAS . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#idiomaModal">
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

    public function membresiasDatatable()
    {
        try {
            $tabla = Membresias::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_MEMBRESIA == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_MEMBRESIA . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#membresiasModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_MEMBRESIA . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#membresiasModal">
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

    public function operacionDatatable()
    {
        try {
            $tabla = Operacion::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_OPERACION == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ACTIVO_OPERACION . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#operacionModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ACTIVO_OPERACION . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#operacionModal">
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

    public function nombresDatatable()
    {
        try {
            $tabla = NombreProyecto::get();
            foreach ($tabla as $value) {
                if ($value->ACTIVO_NPROYECTO == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ACTIVO_NPROYECTO . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#nombresModal">
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
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ACTIVO_NPROYECTO . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#nombresModal">
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

    public function instructoresDatatable()
    {
        try {
            $tabla = Instructor::get();

            foreach ($tabla as $value) {
                $value->NOMBRE_INSTRUCTOR = trim("{$value->FNAME_INSTRUCTOR} {$value->MDNAME_INSTRUCTOR} {$value->LSNAME_INSTRUCTOR}");
                $value->VIGENCIA = $value->EXPIRACION_INSTRUCTOR ?? '';
                if (!empty($value->ACREDITACION_INSTRUCTOR) && is_array($value->ACREDITACION_INSTRUCTOR)) {
                    $certificaciones = EnteAcreditador::whereIn('ID_CATALOGO_ENTE', $value->ACREDITACION_INSTRUCTOR)
                        ->pluck('NOMBRE_ENTE')
                        ->toArray();
                    $value->CERTIFICACIONES_INSTRUCTOR = implode(', ', $certificaciones);
                } else {
                    $value->CERTIFICACIONES_INSTRUCTOR = '';
                }


                $checked = $value->ACTIVO_INSTRUCTOR == 1 ? 'checked' : '';
                $value->BTN_ACTIVO = '
                    <div class="form-check form-switch">
                        <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_INSTRUCTOR . '" ' . $checked . '>
                    </div>
                ';

                $value->BTN_EDITAR = '
                    <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" 
                            data-id="' . $value->ID_CATALOGO_INSTRUCTOR . '" 
                            data-toggle="tooltip" title="Editar" 
                            data-bs-toggle="modal" data-bs-target="#instructoresModal">
                        <span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" 
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" 
                                    stroke="currentColor" stroke-width="1.5" 
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" 
                                    d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" 
                                    stroke="currentColor" stroke-width="1.5" 
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.1655 4.60254L19.7315 9.16854" 
                                    stroke="currentColor" stroke-width="1.5" 
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>';

                $value->BTN_ACCESO = '
                    <button type="button" class="btn btn-sm btn-icon btn-warning ACCESO" 
                            data-id="' . $value->ID_CATALOGO_INSTRUCTOR . '" 
                            data-toggle="tooltip" title="Acceso" 
                            data-bs-toggle="modal" data-bs-target="#instructoresModal">
                        <span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" 
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" 
                                    stroke="currentColor" stroke-width="1.5" 
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" 
                                    d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" 
                                    stroke="currentColor" stroke-width="1.5" 
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.1655 4.60254L19.7315 9.16854" 
                                    stroke="currentColor" stroke-width="1.5" 
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>';
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


    // STORE - CATALOGOS
    public function store(Request $request)
    {
        try {
            switch (intval($request->api)) {
                // Caso para Ente Acreditador
                case 1:
                    if ($request->ID_CATALOGO_ENTE == 0) {
                        DB::statement('ALTER TABLE entes_acreditadores AUTO_INCREMENT=1;');
                        $enteAcreditador = EnteAcreditador::create($request->all());
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $enteAcreditador = EnteAcreditador::where('ID_CATALOGO_ENTE', $request['ID_CATALOGO_ENTE'])->update(['ACTIVO_ENTE' => 0]);
                                $response['code'] = 1;
                                $response['ente'] = 'Desactivado';
                            } else {
                                $enteAcreditador = EnteAcreditador::where('ID_CATALOGO_ENTE', $request['ID_CATALOGO_ENTE'])->update(['ACTIVO_ENTE' => 1]);
                                $response['code'] = 1;
                                $response['ente'] = 'Activado';
                            }
                        } else {
                            $enteAcreditador = EnteAcreditador::find($request->ID_CATALOGO_ENTE);
                            $enteAcreditador->update($request->all());
                            $response['code'] = 1;
                            $response['ente'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['ente']  = $enteAcreditador;
                    return response()->json($response);
                    break;

                // Caso para Nivel de Acreditación
                case 2:
                    if ($request->ID_CATALOGO_NIVELACREDITACION == 0) {
                        $nivelAcreditacion = NivelAcreditacion::create($request->all());
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $nivelAcreditacion = NivelAcreditacion::where('ID_CATALOGO_NIVELACREDITACION', $request['ID_CATALOGO_NIVELACREDITACION'])->update(['ACTIVO_NIVEL' => 0]);
                                $response['code'] = 1;
                                $response['nivel'] = 'Desactivado';
                            } else {
                                $nivelAcreditacion = NivelAcreditacion::where('ID_CATALOGO_NIVELACREDITACION', $request['ID_CATALOGO_NIVELACREDITACION'])->update(['ACTIVO_NIVEL' => 1]);
                                $response['code'] = 1;
                                $response['nivel'] = 'Activado';
                            }
                        } else {
                            $nivelAcreditacion = NivelAcreditacion::find($request->ID_CATALOGO_NIVELACREDITACION);
                            $nivelAcreditacion->update($request->all());
                            $response['code'] = 1;
                            $response['nivel'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['nivel']  = $nivelAcreditacion;
                    return response()->json($response);
                    break;

                // Caso para Tipo de BOP
                case 3:
                    if ($request->ID_CATALOGO_TIPOBOP == 0) {
                        $tipoBop = TipoBOP::create($request->all());
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $tipoBop = TipoBOP::where('ID_CATALOGO_TIPOBOP', $request['ID_CATALOGO_TIPOBOP'])->update(['ACTIVO_TIPOBOP' => 0]);
                                $response['code'] = 1;
                                $response['tipobop'] = 'Desactivado';
                            } else {
                                $tipoBop = TipoBOP::where('ID_CATALOGO_TIPOBOP', $request['ID_CATALOGO_TIPOBOP'])->update(['ACTIVO_TIPOBOP' => 1]);
                                $response['code'] = 1;
                                $response['tipobop'] = 'Activado';
                            }
                        } else {
                            $tipoBop = TipoBOP::find($request->ID_CATALOGO_TIPOBOP);
                            $tipoBop->update($request->all());
                            $response['code'] = 1;
                            $response['tipobop'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['tipobop']  = $tipoBop;
                    return response()->json($response);
                    break;

                // Caso para Tema de Preguntas
                case 4:
                    $certificaciones = $request->has('CERTIFICACION_TEMA') ? (array)$request->input('CERTIFICACION_TEMA') : [];

                    if ($request->ID_CATALOGO_TEMAPREGUNTA == 0) {
                        $temaPregunta = TemaPreguntas::create([
                            'NOMBRE_TEMA' => $request->NOMBRE_TEMA,
                            'CERTIFICACION_TEMA' => $certificaciones,
                            'ACTIVO_TEMA' => 1
                        ]);
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $temaPregunta = TemaPreguntas::where('ID_CATALOGO_TEMAPREGUNTA', $request['ID_CATALOGO_TEMAPREGUNTA'])->update(['ACTIVO_TEMA' => 0]);
                                $response['code'] = 1;
                                $response['tema'] = 'Desactivado';
                            } else {
                                $temaPregunta = TemaPreguntas::where('ID_CATALOGO_TEMAPREGUNTA', $request['ID_CATALOGO_TEMAPREGUNTA'])->update(['ACTIVO_TEMA' => 1]);
                                $response['code'] = 1;
                                $response['tema'] = 'Activado';
                            }
                        } else {
                            $temaPregunta = TemaPreguntas::find($request->ID_CATALOGO_TEMAPREGUNTA);
                            $temaPregunta->update([
                                'NOMBRE_TEMA' => $request->NOMBRE_TEMA,
                                'CERTIFICACION_TEMA' => $certificaciones
                            ]);
                            $response['code'] = 1;
                            $response['tema'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['tema']  = $temaPregunta;
                    return response()->json($response);
                    break;

                // Caso para Idiomas de Examen
                case 5:
                    if ($request->ID_CATALOGO_IDIOMAEXAMEN == 0) {
                        $idiomaExamen = IdiomasExamenes::create($request->all());
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $idiomaExamen = IdiomasExamenes::where('ID_CATALOGO_IDIOMAEXAMEN', $request['ID_CATALOGO_IDIOMAEXAMEN'])->update(['ACTIVO_IDIOMA' => 0]);
                                $response['code'] = 1;
                                $response['idioma'] = 'Desactivado';
                            } else {
                                $idiomaExamen = IdiomasExamenes::where('ID_CATALOGO_IDIOMAEXAMEN', $request['ID_CATALOGO_IDIOMAEXAMEN'])->update(['ACTIVO_IDIOMA' => 1]);
                                $response['code'] = 1;
                                $response['idioma'] = 'Activado';
                            }
                        } else {
                            $idiomaExamen = IdiomasExamenes::find($request->ID_CATALOGO_IDIOMAEXAMEN);
                            $idiomaExamen->update($request->all());
                            $response['code'] = 1;
                            $response['idioma'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['idioma']  = $idiomaExamen;
                    return response()->json($response);
                    break;

                // Caso para Membresías
                case 6:
                    if ($request->ID_CATALOGO_MEMBRESIA == 0) {
                        $membresia = Membresias::create($request->all());
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $membresia = Membresias::where('ID_CATALOGO_MEMBRESIA', $request['ID_CATALOGO_MEMBRESIA'])->update(['ACTIVO_MEMBRESIA' => 0]);
                                $response['code'] = 1;
                                $response['membresia'] = 'Desactivado';
                            } else {
                                $membresia = Membresias::where('ID_CATALOGO_MEMBRESIA', $request['ID_CATALOGO_MEMBRESIA'])->update(['ACTIVO_MEMBRESIA' => 1]);
                                $response['code'] = 1;
                                $response['membresia'] = 'Activado';
                            }
                        } else {
                            $membresia = Membresias::find($request->ID_CATALOGO_MEMBRESIA);
                            $membresia->update($request->all());
                            $response['code'] = 1;
                            $response['membresia'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['membresia']  = $membresia;
                    return response()->json($response);
                    break;

                case 7:
                    $certificaciones = $request->has('CERTIFICACION_SUBTEMA') ? (array)$request->input('CERTIFICACION_SUBTEMA') : [];

                    if ($request->ID_CATALOGO_SUBTEMA == 0) {
                        $subtemaPregunta = SubtemaPreguntas::create([
                            'TEMAPREGUNTA_ID' => $request->TEMAPREGUNTA_ID,
                            'NOMBRE_SUBTEMA' => $request->NOMBRE_SUBTEMA,
                            'CERTIFICACION_SUBTEMA' => $certificaciones,
                            'ACTIVO_SUBTEMA' => 1
                        ]);
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $subtemaPregunta = SubtemaPreguntas::where('ID_CATALOGO_SUBTEMA', $request['ID_CATALOGO_SUBTEMA'])->update(['ACTIVO_SUBTEMA' => 0]);
                                $response['code'] = 1;
                                $response['subtema'] = 'Desactivado';
                            } else {
                                $subtemaPregunta = SubtemaPreguntas::where('ID_CATALOGO_SUBTEMA', $request['ID_CATALOGO_SUBTEMA'])->update(['ACTIVO_SUBTEMA' => 1]);
                                $response['code'] = 1;
                                $response['subtema'] = 'Activado';
                            }
                        } else {
                            $subtemaPregunta = SubtemaPreguntas::find($request->ID_CATALOGO_SUBTEMA);
                            $subtemaPregunta->update([
                                'TEMAPREGUNTA_ID' => $request->TEMAPREGUNTA_ID,
                                'NOMBRE_SUBTEMA' => $request->NOMBRE_SUBTEMA,
                                'CERTIFICACION_SUBTEMA' => $certificaciones
                            ]);
                            $response['code'] = 1;
                            $response['subtema'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['subtema']  = $subtemaPregunta;
                    return response()->json($response);
                    break;

                case 8:
                    if ($request->ID_CATALOGO_OPERACION == 0) {
                        DB::statement('ALTER TABLE tipo_operacion AUTO_INCREMENT=1;');
                        $Operacion = Operacion::create($request->all());
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $Operacion = Operacion::where('ID_CATALOGO_OPERACION', $request['ID_CATALOGO_OPERACION'])->update(['ACTIVO_OPERACION' => 0]);
                                $response['code'] = 1;
                                $response['operacion'] = 'Desactivado';
                            } else {
                                $Operacion = Operacion::where('ID_CATALOGO_OPERACION', $request['ID_CATALOGO_OPERACION'])->update(['ACTIVO_OPERACION' => 1]);
                                $response['code'] = 1;
                                $response['operacion'] = 'Activado';
                            }
                        } else {
                            $Operacion = Operacion::find($request->ID_CATALOGO_OPERACION);
                            $Operacion->update($request->all());
                            $response['code'] = 1;
                            $response['operacion'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['operacion']  = $Operacion;
                    return response()->json($response);
                    break;
                case 9:
                    $data = $request->except('documents');

                    $data['ACTIVO_INSTRUCTOR'] = 1;

                    if ($request->ID_CATALOGO_INSTRUCTOR == 0) {
                        DB::statement('ALTER TABLE instructors AUTO_INCREMENT=1;');
                        $Instructor = Instructor::create($data);

                        $documentosGuardados = [];

                        if ($request->has('documents')) {
                            $directory = 'app/admin/catalogs/instructor/' . $Instructor->ID_CATALOGO_INSTRUCTOR;
                            $fullPath = storage_path($directory);

                            if (!file_exists($fullPath)) {
                                mkdir($fullPath, 0755, true);
                            }

                            foreach ($request->documents as $doc) {
                                if (!isset($doc['file'])) continue;
                                $file = $doc['file'];

                                if ($file->getClientOriginalExtension() !== 'pdf') {
                                    return response()->json(['code' => 0, 'error' => 'Todos los archivos deben ser PDF']);
                                }

                                if ($file->getSize() > 10485760) {
                                    return response()->json(['code' => 0, 'error' => 'Cada archivo no debe exceder los 10MB']);
                                }

                                // Nombre de archivo único
                                $fileName = uniqid() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                                $file->move($fullPath, $fileName);

                                $documentosGuardados[] = [
                                    'nombre' => $doc['name'] ?? 'Sin nombre',
                                    'ruta' => $directory . '/' . $fileName,
                                    'archivo_original' => $file->getClientOriginalName(),
                                ];
                            }

                            // Guardar JSON con los documentos
                            $Instructor->update([
                                'DOC_INSTRUCTOR' => json_encode($documentosGuardados, JSON_UNESCAPED_UNICODE),
                            ]);
                        }

                        $response['code'] = 1;
                        $response['instructor'] = $Instructor;
                        return response()->json($response);
                    } else {
                        // ACTUALIZACIÓN
                        $Instructor = Instructor::find($request->ID_CATALOGO_INSTRUCTOR);

                        $documentosGuardados = json_decode($Instructor->DOC_INSTRUCTOR, true) ?? [];

                        if ($request->has('documents')) {
                            $directory = 'app/admin/catalogs/instructor/' . $Instructor->ID_CATALOGO_INSTRUCTOR;
                            $fullPath = storage_path($directory);
                            if (!file_exists($fullPath)) {
                                mkdir($fullPath, 0755, true);
                            }

                            foreach ($request->documents as $doc) {
                                if (!isset($doc['file'])) continue;
                                $file = $doc['file'];

                                $fileName = uniqid() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                                $file->move($fullPath, $fileName);

                                $documentosGuardados[] = [
                                    'nombre' => $doc['name'] ?? 'Sin nombre',
                                    'ruta' => $directory . '/' . $fileName,
                                    'archivo_original' => $file->getClientOriginalName(),
                                ];
                            }
                        }

                        $data['DOC_INSTRUCTOR'] = json_encode($documentosGuardados, JSON_UNESCAPED_UNICODE);
                        $Instructor->update($data);

                        $response['code'] = 1;
                        $response['instructor'] = 'Actualizado';
                        return response()->json($response);
                    }
                    break;
                case 10:
                    if ($request->ID_CATALOGO_NPROYECTOS == 0) {
                        DB::statement('ALTER TABLE tipo_operacion AUTO_INCREMENT=1;');
                        $data = $request->all();
                        $data['ACTIVO_NPROYECTO'] = 1;

                        $NombreProyecto = NombreProyecto::create($data);
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $NombreProyecto = NombreProyecto::where('ID_CATALOGO_NPROYECTOS', $request['ID_CATALOGO_NPROYECTOS'])->update(['ACTIVO_NPROYECTO' => 0]);
                                $response['code'] = 1;
                                $response['nombres'] = 'Desactivado';
                            } else {
                                $NombreProyecto = NombreProyecto::where('ID_CATALOGO_NPROYECTOS', $request['ID_CATALOGO_NPROYECTOS'])->update(['ACTIVO_NPROYECTO' => 1]);
                                $response['code'] = 1;
                                $response['nombres'] = 'Activado';
                            }
                        } else {
                            $NombreProyecto = NombreProyecto::find($request->ID_CATALOGO_NPROYECTOS);
                            $NombreProyecto->update($request->all());
                            $response['code'] = 1;
                            $response['nombres'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['nombres']  = $NombreProyecto;
                    return response()->json($response);
                    break;
                case 11:
                    $data = $request->except('DOCUMENTO_CENTRO');
                    $contactosJSON = $request->contactosJSON;
                    $queIncluyeJSON = $request->queIncluyeJSON;

                    // Validar que sean JSON válidos
                    if ($contactosJSON) {
                        json_decode($contactosJSON);
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            return response()->json([
                                'success' => false,
                                'message' => 'Formato de contactos inválido'
                            ]);
                        }
                        // Agregar al array de datos
                        $data['CONTACTOS_CENTRO'] = $contactosJSON;
                    }

                    if ($queIncluyeJSON) {
                        json_decode($queIncluyeJSON);
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            return response()->json([
                                'success' => false,
                                'message' => 'Formato de "qué incluye" inválido'
                            ]);
                        }
                        // Agregar al array de datos
                        $data['INCLUYE_CENTRO'] = $queIncluyeJSON;
                    }

                    if ($request->ID_CATALOGO_CENTRO == 0) {
                        DB::statement('ALTER TABLE centro_capacitacion AUTO_INCREMENT=1;');

                        // Crear primero el registro sin documentos
                        $CentrosCapacitacion = CentrosCapacitacion::create($data);

                        $documentosArray = [];

                        if ($request->hasFile('DOCUMENTO_CENTRO')) {
                            $directory = 'admin/catalogs/centros/' . $CentrosCapacitacion->ID_CATALOGO_CENTRO;
                            $fullPath = storage_path('app/' . $directory);

                            if (!file_exists($fullPath)) {
                                mkdir($fullPath, 0755, true);
                            }

                            $file = $request->file('DOCUMENTO_CENTRO');

                            if ($file->getClientOriginalExtension() !== 'pdf') {
                                return response()->json(['code' => 0, 'error' => 'El archivo debe ser PDF']);
                            }

                            if ($file->getSize() > 10485760) {
                                return response()->json(['code' => 0, 'error' => 'El archivo no debe exceder los 10MB']);
                            }

                            $fileName = uniqid() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                            $file->move($fullPath, $fileName);

                            $documentosArray[] = [
                                'nombre' => $file->getClientOriginalName(),
                                'ruta' => $directory . '/' . $fileName, // Ruta relativa sin 'app/'
                                'archivo_original' => $file->getClientOriginalName(),
                                'fecha_subida' => now()->toDateTimeString()
                            ];
                        }

                        // Guardar como JSON
                        if (!empty($documentosArray)) {
                            $CentrosCapacitacion->update([
                                'DOC_CENTRO' => json_encode($documentosArray, JSON_UNESCAPED_UNICODE),
                            ]);
                        }

                        $response['code'] = 1;
                        $response['centro'] = $CentrosCapacitacion;
                        return response()->json($response);
                    } else {
                        // ACTUALIZACIÓN
                        $CentrosCapacitacion = CentrosCapacitacion::find($request->ID_CATALOGO_CENTRO);

                        $documentosArray = json_decode($CentrosCapacitacion->DOC_CENTRO, true) ?? [];

                        if ($request->hasFile('DOCUMENTO_CENTRO')) {
                            $directory = 'admin/catalogs/centros/' . $CentrosCapacitacion->ID_CATALOGO_CENTRO;
                            $fullPath = storage_path('app/' . $directory);

                            if (!file_exists($fullPath)) {
                                mkdir($fullPath, 0755, true);
                            }

                            $file = $request->file('DOCUMENTO_CENTRO');

                            if ($file->getClientOriginalExtension() !== 'pdf') {
                                return response()->json(['code' => 0, 'error' => 'El archivo debe ser PDF']);
                            }

                            if ($file->getSize() > 10485760) {
                                return response()->json(['code' => 0, 'error' => 'El archivo no debe exceder los 10MB']);
                            }

                            $fileName = uniqid() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                            $file->move($fullPath, $fileName);

                            $documentosArray[] = [
                                'nombre' => $file->getClientOriginalName(),
                                'ruta' => $directory . '/' . $fileName,
                                'archivo_original' => $file->getClientOriginalName(),
                                'fecha_subida' => now()->toDateTimeString()
                            ];
                        }

                        $data['DOC_CENTRO'] = !empty($documentosArray) ? json_encode($documentosArray, JSON_UNESCAPED_UNICODE) : null;
                        $CentrosCapacitacion->update($data);

                        $response['code'] = 1;
                        $response['centro'] = 'Actualizado';
                        return response()->json($response);
                    }
                    break;

                case 12:
                    if ($request->ID_CATALOGO_CLIENTE == 0) {
                        // NUEVO REGISTRO
                        DB::statement('ALTER TABLE costumers AUTO_INCREMENT=1;');

                        $data = $request->all();

                        // PROCESAR DATOS DINÁMICOS PARA NUEVO REGISTRO
                        $razonesSocialesJSON = $request->razonesSocialesJSON;
                        $contactosJSON = $request->contactosClienteJSON;

                        // Procesar razones sociales
                        if ($razonesSocialesJSON) {
                            $razonesArray = json_decode($razonesSocialesJSON, true);
                            if (json_last_error() === JSON_ERROR_NONE && !empty($razonesArray)) {
                                $data['RAZON_SOCIAL_CLIENTE'] = $razonesArray[0]['RAZON_SOCIAL'] ?? '';
                            }
                            $data['RAZONES_SOCIALES'] = $razonesSocialesJSON;
                        }

                        // Procesar contactos - GUARDAR COMO JSON EN CONTACTO_CLIENTE
                        if ($contactosJSON) {
                            $data['CONTACTO_CLIENTE'] = $contactosJSON;
                        }

                        // ACTIVO_CLIENTE = 1 por defecto
                        $data['ACTIVO_CLIENTE'] = 1;

                        $cliente = Clientes::create($data);
                    } else {
                        // EDICIÓN O ACTIVAR/DESACTIVAR
                        if (isset($request->ACTIVAR)) {
                            // ESTRUCTURA IDÉNTICA PARA ACTIVAR/DESACTIVAR
                            if ($request->ACTIVAR == 1) {
                                $cliente = Clientes::where('ID_CATALOGO_CLIENTE', $request['ID_CATALOGO_CLIENTE'])->update(['ACTIVO_CLIENTE' => 0]);
                                $response['code'] = 1;
                                $response['cliente'] = 'Desactivado';
                            } else {
                                $cliente = Clientes::where('ID_CATALOGO_CLIENTE', $request['ID_CATALOGO_CLIENTE'])->update(['ACTIVO_CLIENTE' => 1]);
                                $response['code'] = 1;
                                $response['cliente'] = 'Activado';
                            }
                        } else {
                            // EDICIÓN NORMAL - ADAPTADA PARA PROCESAR JSON
                            $data = $request->all();

                            // PROCESAR DATOS DINÁMICOS PARA EDICIÓN
                            $razonesSocialesJSON = $request->razonesSocialesJSON;
                            $contactosJSON = $request->contactosClienteJSON;

                            // Procesar razones sociales
                            if ($razonesSocialesJSON) {
                                $razonesArray = json_decode($razonesSocialesJSON, true);
                                if (json_last_error() === JSON_ERROR_NONE && !empty($razonesArray)) {
                                    $data['RAZON_SOCIAL_CLIENTE'] = $razonesArray[0]['RAZON_SOCIAL'] ?? '';
                                }
                                $data['RAZONES_SOCIALES'] = $razonesSocialesJSON;
                            }

                            // Procesar contactos - GUARDAR COMO JSON EN CONTACTO_CLIENTE
                            if ($contactosJSON) {
                                $data['CONTACTO_CLIENTE'] = $contactosJSON;
                            }

                            $cliente = Clientes::find($request->ID_CATALOGO_CLIENTE);
                            $cliente->update($data);
                            $response['code'] = 1;
                            $response['cliente'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['cliente']  = $cliente;
                    return response()->json($response);
                    break;
                case 13:
                    if ($request->ID_CATALOGO_UBICACION == 0) {
                        DB::statement('ALTER TABLE locations AUTO_INCREMENT=1;');
                        $data = $request->all();
                        $data['ACTIVO_UBICACION'] = 1;

                        $ubicaciones = Ubicaciones::create($data);
                    } else {
                        if (isset($request->ACTIVAR)) {
                            if ($request->ACTIVAR == 1) {
                                $ubicaciones = Ubicaciones::where('ID_CATALOGO_UBICACION', $request['ID_CATALOGO_UBICACION'])->update(['ACTIVO_UBICACION' => 0]);
                                $response['code'] = 1;
                                $response['ubicacion'] = 'Desactivado';
                            } else {
                                $ubicaciones = Ubicaciones::where('ID_CATALOGO_UBICACION', $request['ID_CATALOGO_UBICACION'])->update(['ACTIVO_UBICACION' => 1]);
                                $response['code'] = 1;
                                $response['ubicacion'] = 'Activado';
                            }
                        } else {
                            $ubicaciones = Ubicaciones::find($request->ID_CATALOGO_UBICACION);
                            $ubicaciones->update($request->all());
                            $response['code'] = 1;
                            $response['ubicacion'] = 'Actualizado';
                        }
                        return response()->json($response);
                    }
                    $response['code']  = 1;
                    $response['ubicacion']  = $ubicaciones;
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
}
