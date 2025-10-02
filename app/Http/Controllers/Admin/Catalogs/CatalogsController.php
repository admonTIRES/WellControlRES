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
            foreach ($tabla as $value) {
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
            // Nombre completo
            $value->NOMBRE_INSTRUCTOR = trim("{$value->FNAME_INSTRUCTOR} {$value->MDNAME_INSTRUCTOR} {$value->LSNAME_INSTRUCTOR}");

            // Vigencia
            $value->VIGENCIA = $value->EXPIRACION_INSTRUCTOR ?? '';

            // Certificaciones (si guardas como string de IDs, aquí puedes mapearlo)
            if (!empty($value->ACREDITACION_INSTRUCTOR)) {
                $ids = explode(',', $value->ACREDITACION_INSTRUCTOR);
                // Aquí deberías traer los nombres desde la tabla acreditaciones
                $certificaciones = EnteAcreditador::whereIn('ID_CATALOGO_ENTE', $ids)
    ->pluck('NOMBRE_ENTE')
    ->toArray();
                $value->CERTIFICACIONES_INSTRUCTOR = implode(', ', $certificaciones);
            } else {
                $value->CERTIFICACIONES_INSTRUCTOR = '';
            }

            // Botón activo/desactivo con ID correcto
            $checked = $value->ACTIVO_INSTRUCTOR == 1 ? 'checked' : '';
            $value->BTN_ACTIVO = '
                <div class="form-check form-switch">
                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_CATALOGO_INSTRUCTOR . '" ' . $checked . '>
                </div>
            ';

            // Botones editar y acceso
            $value->BTN_EDITAR = '
                <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" 
                        data-id="' . $value->ID_CATALOGO_INSTRUCTOR . '" 
                        data-toggle="tooltip" title="Editar" 
                        data-bs-toggle="modal" data-bs-target="#operacionModal">
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
                        data-bs-toggle="modal" data-bs-target="#operacionModal">
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
                    $certificaciones = $request->has('CERTIFICACION_TEMA') ? (array)$request->input('CERTIFICACION_TEMA'): [];

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
                    $certificaciones = $request->has('CERTIFICACION_SUBTEMA') ? (array)$request->input('CERTIFICACION_SUBTEMA'): [];

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
                    //INSTRUCTORESD
          case 9:
    // Tomamos todos los datos excepto el archivo
    $data = $request->except('DOC_INSTRUCTOR');

    // Convertir ACREDITACION_INSTRUCTOR[] a string separado por comas
    if ($request->has('ACREDITACION_INSTRUCTOR')) {
        $data['ACREDITACION_INSTRUCTOR'] = implode(',', $request->ACREDITACION_INSTRUCTOR);
    }

    // Forzar que todo nuevo instructor se cree como activo
    $data['ACTIVO_INSTRUCTOR'] = 1;

    if ($request->ID_CATALOGO_INSTRUCTOR == 0) {
        DB::statement('ALTER TABLE instructors AUTO_INCREMENT=1;');

        // Crear primero el registro SIN archivo
        $Instructor = Instructor::create($data);

        // Si se subió archivo, guardarlo con el ID real
        if ($request->hasFile('DOC_INSTRUCTOR')) {
            $file = $request->file('DOC_INSTRUCTOR');

            // Validar PDF
            if ($file->getClientOriginalExtension() !== 'pdf') {
                return response()->json(['code' => 0, 'error' => 'El archivo debe ser un PDF']);
            }
            if ($file->getSize() > 10485760) {
                return response()->json(['code' => 0, 'error' => 'El archivo no debe exceder los 10MB']);
            }

            // Crear directorio si no existe
            $directory = 'app/admin/catalogs/instructor';
            $fullPath = storage_path($directory);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0755, true);
            }

            // Guardar archivo con el ID del instructor
            $fileName = $Instructor->ID_CATALOGO_INSTRUCTOR . '.pdf';
            $file->move($fullPath, $fileName);

            // Actualizar la ruta del PDF en BD
            $Instructor->update([
                'DOC_INSTRUCTOR' => $directory . '/' . $fileName
            ]);
        }

        $response['code'] = 1;
        $response['instructor'] = $Instructor;
        return response()->json($response);

    } else {
        if (isset($request->ACTIVAR)) {
            if ($request->ACTIVAR == 1) {
                Instructor::where('ID_CATALOGO_INSTRUCTOR', $request['ID_CATALOGO_INSTRUCTOR'])
                    ->update(['ACTIVO_INSTRUCTOR' => 0]);
                $response['code'] = 1;
                $response['instructor'] = 'Desactivado';
            } else {
                Instructor::where('ID_CATALOGO_INSTRUCTOR', $request['ID_CATALOGO_INSTRUCTOR'])
                    ->update(['ACTIVO_INSTRUCTOR' => 1]);
                $response['code'] = 1;
                $response['instructor'] = 'Activado';
            }
        } else {
            // Si sube nuevo archivo, eliminar el anterior
            if ($request->hasFile('DOC_INSTRUCTOR')) {
                $instructorExistente = Instructor::find($request->ID_CATALOGO_INSTRUCTOR);
                if ($instructorExistente && $instructorExistente->DOC_INSTRUCTOR) {
                    $oldFilePath = storage_path($instructorExistente->DOC_INSTRUCTOR);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file = $request->file('DOC_INSTRUCTOR');
                $directory = 'app/admin/catalogs/instructor';
                $fullPath = storage_path($directory);
                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0755, true);
                }
                $fileName = $request->ID_CATALOGO_INSTRUCTOR . '.pdf';
                $file->move($fullPath, $fileName);
                $data['DOC_INSTRUCTOR'] = $directory . '/' . $fileName;
            }

            $Instructor = Instructor::find($request->ID_CATALOGO_INSTRUCTOR);
            $Instructor->update($data);

            $response['code'] = 1;
            $response['instructor'] = 'Actualizado';
        }
        return response()->json($response);
    }
    break;



                    //NOMBRES
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
