<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

                 $companies = [];

                if (is_array($value->COMPANIES_PROJECT)) {
                    foreach ($value->COMPANIES_PROJECT as $empresa) {
                        if (!empty($empresa['NAME_PROJECT'])) {
                            $companies[] = $empresa['NAME_PROJECT'];
                        }
                    }
                }

                $value->COMPANIES = $companies;
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

                        if (json_last_error() !== JSON_ERROR_NONE) {
                            throw new \Exception('Formato inválido para COMPANIES_PROJECT');
                        }

                        // Recorremos cada empresa
                        foreach ($data['COMPANIES_PROJECT'] as &$empresa) {
                            if (!isset($empresa['STUDENTS_PROJECT'])) continue;

                            foreach ($empresa['STUDENTS_PROJECT'] as &$estudiante) {
                                $email = $estudiante['EMAIL_PROJECT'] ?? null;
                                $password = $estudiante['PASSWORD_PROJECT'] ?? null;

                                if (!$email || !$password) continue;

                                $firstName = $estudiante['FIRST_NAME_PROJECT'] ?? '';
                                $middleName = $estudiante['MIDDLE_NAME_PROJECT'] ?? '';
                                $lastName = $estudiante['LAST_NAME_PROJECT'] ?? '';

                                $initials = Str::lower(Str::substr($firstName, 0, 1)) .
                                            ($middleName && $middleName != 'N/A' ? Str::lower(Str::substr($middleName, 0, 1)) : '');

                                $lastWord = Str::lower(Str::slug(Str::afterLast($lastName, ' ')));
                                $username = $initials . $lastWord . rand(100, 999);

                                // SI YA EXISTE EL USUARIO, ACTUALIZA
                                if (!empty($estudiante['USER_ID_PROJECT'])) {
                                    DB::table('users')
                                        ->where('id', $estudiante['USER_ID_PROJECT'])
                                        ->update([
                                            'username'   => $username,
                                            'email'      => $email,
                                            'password'   => Hash::make($password),
                                            'updated_at' => now()
                                        ]);
                                } else {
                                    $existingUser = DB::table('users')->where('email', $email)->first();
                                    if ($existingUser) {
                                        return response()->json([
                                            'error' => true,
                                            'message' => "Ya existe un usuario con el correo: $email",
                                            'email' => $email
                                        ], 422); 
                                    }

                                    $userId = DB::table('users')->insertGetId([
                                        'username'   => $username,
                                        'email'      => $email,
                                        'password'   => Hash::make($password),
                                        'rol'        => 1, // estudiante
                                        'created_at' => now(),
                                        'updated_at' => now()
                                    ]);

                                    $estudiante['USER_ID_PROJECT'] = $userId;
                                }
                            }
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
           return response()->json([
                'error' => true,
                'message' => 'Error interno: ' . $e->getMessage()
            ], 500);
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
                                                'fechaInicio' =>  $proyecto->MEMBERSHIP_START_PROJECT,
                                                'fechaFin' =>  $proyecto->MEMBERSHIP_END_PROJECT, 
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
