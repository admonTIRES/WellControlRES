<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;

use App\Models\Admin\Project\Proyect;

class ProjectManagementController extends Controller
{

     // DATATABLE - CATALOGOS
    public function proyectoDatatable()
    {
        try {
            $tabla = Proyect::get();
            foreach ($tabla as $value) {
                    $value->BTN_EDITAR = '<button type="button"
                                                class="btn btn-sm btn-icon btn-warning"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Ver proyecto"
                                                onclick="window.location.href=\'/projectsAdmin/details/' . $value->ID_PROJECT . '\'">
                                            <span class="btn-inner">
                                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
                                            <span class="btn-inner">
                                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
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
                case 1:
                    $data = $request->all();
                    if ($request->has('COMPANIES_PROJECT') && is_string($request->COMPANIES_PROJECT)) {
                        $data['COMPANIES_PROJECT'] = json_decode($request->COMPANIES_PROJECT, true);
                        
                        // Validar que el JSON sea válido
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            throw new \Exception('Formato inválido para COMPANIES_PROJECT');
                        }
                    }
                    if ($request->ID_PROJECT == 0) {
                        DB::statement('ALTER TABLE proyect AUTO_INCREMENT=1;');
                        $project = Proyect::create($data);
                    } else { 
                        $project = Proyect::find($request->ID_PROJECT);
                        $project->update($data);
                        $response['code'] = 1;
                        $response['proyecto'] = 'Actualizado';
                        return response()->json($response);
                    }
                $response['code']  = 1;
                $response['proyecto']  = $project;
                return response()->json($response);
                break;

                default:
                    $response['code'] = 1;
                    $response['msj'] = 'Api no encontrada';
                    return response()->json($response);
            }
        } catch (Exception $e) {
           \Log::error('Error en ProyectController@store: ' . $e->getMessage());
            \Log::error('Datos recibidos: ' . json_encode($request->all()));
            return response()->json('Error al guardar la información');
           
        }
    }

    // DETAILS
    
     /**
     * @return \Illuminate\View\View
     */
    public function detailsProject($ID_PROJECT){
        return view('Admin.content.Admin.projects.details');
    }
}
