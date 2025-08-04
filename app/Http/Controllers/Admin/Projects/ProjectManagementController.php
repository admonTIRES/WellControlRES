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
                                                class="btn btn-sm btn-icon btn-action1"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Ver proyecto"
                                                onclick="window.location.href=\'/projectsAdmin/details/' . $value->ID_PROJECT . '\'">
                                            <span class="btn-inner">
                                               <i class="ri-eye-line" style="font-size: 1.4rem; line-height: 1;"></i> Ver
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-icon btn-action1 EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
                                           <span class="btn-inner">
                                               <i class="ri-file-edit-line" style="font-size: 1.4rem; line-height: 1;"></i> Editar
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
        $proyecto = Proyect::findOrFail($ID_PROJECT);
        $COURSE_NAME_ES_PROJECT = $proyecto->COURSE_NAME_ES_PROJECT;

        return view('Admin.content.Admin.projects.details', compact('COURSE_NAME_ES_PROJECT', 'ID_PROJECT'));
    }

   public function projectStudentDatatable(Request $request)
    {
        $id = $request->input('ID_PROJECT');

        try {
            $proyecto = Proyect::where('ID_PROJECT', $id)->first();

            if (!$proyecto) {
                return response()->json([
                    'msj' => 'Proyecto no encontrado',
                    'data' => []
                ]);
            }

            // Asegúrate que el campo esté decodificado desde JSON
            // $empresas = json_decode($proyecto->COMPANIES_PROJECT, true);
            $empresas = $proyecto->COMPANIES_PROJECT;


            $estudiantes = [];

            foreach ($empresas as $empresa) {
                foreach ($empresa['STUDENTS_PROJECT'] as $estudiante) {
                    $estudiantes[] = [
                        'NOMBRE_COMPLETO' => $estudiante['FIRST_NAME_PROJECT'] . ' ' . $estudiante['MIDDLE_NAME_PROJECT'] . ' ' . $estudiante['LAST_NAME_PROJECT'],
                        'EMPRESA' => $estudiante['COMPANY_PROJECT'],
                        'EMAIL' => $estudiante['EMAIL_PROJECT'],
                        'ID_NUMBER' => $estudiante['ID_NUMBER_PROJECT'],
                        'POSICION' => $estudiante['POSITION_PROJECT'],
                        'BTN_EDITAR' => '<button type="button"
                                            class="btn btn-sm btn-icon btn-action1 SENDCORREO"
                                            title="Enviar correo"
                                            onclick="enviarCredencialesCorreo(' . htmlspecialchars(json_encode([
                                                'nombre' => $estudiante['FIRST_NAME_PROJECT'] . ' ' . $estudiante['MIDDLE_NAME_PROJECT'] . ' ' . $estudiante['LAST_NAME_PROJECT'],
                                                'email' => $estudiante['EMAIL_PROJECT'],
                                                'password' => $estudiante['PASSWORD_PROJECT'],
                                            ]), ENT_QUOTES, 'UTF-8') . ')">
                                            <i class="ri-mail-send-line" style="font-size: 1.2rem;"></i> Enviar credenciales
                                        </button>'
                    ];
                }
            }

            return response()->json([
                'data' => $estudiantes,
                'msj' => 'Estudiantes cargados correctamente'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'msj' => 'Error: ' . $e->getMessage(),
                'data' => []
            ]);
        }
    }


}
