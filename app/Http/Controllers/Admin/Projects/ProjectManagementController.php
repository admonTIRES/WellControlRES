<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin\Project\Proyect;
use App\Models\Admin\catalogs\EnteAcreditador;
use App\Models\Admin\catalogs\IdiomasExamenes;
use App\Models\Admin\catalogs\NivelAcreditacion;
use App\Models\Admin\catalogs\TipoBOP;
use App\Models\Admin\Project\candidate;
use App\Models\Admin\Project\Course;
use App\Models\Admin\catalogs\NombreProyecto;





use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

                $value->GESTIONAR = '';
                $companies = [];

                if (is_array($value->COMPANIES_PROJECT)) {
                    foreach ($value->COMPANIES_PROJECT as $empresa) {
                        if (!empty($empresa['NAME_PROJECT'])) {
                            $companies[] = $empresa['NAME_PROJECT'];
                        }
                    }
                }

                $value->COMPANIES = $companies;
                $nombreProyectoModel = NombreProyecto::find($value->COURSE_NAME_ES_PROJECT);
                $value->nombreProyecto = $nombreProyectoModel ? $nombreProyectoModel->NOMBRE_PROYECTO : '—';


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

                                // $existingUser = DB::table('users')->where('email', $email)->first();

                                // if ($existingUser && (empty($estudiante['USER_ID_PROJECT']) || $existingUser->id != $estudiante['USER_ID_PROJECT'])) {
                                   
                                // }

                                // $existingCandidate = DB::table('candidate')
                                //     ->where('EMAIL_PROJECT', $email)
                                //     ->first();
                                // // SI YA EXISTE EL USUARIO, ACTUALIZA
                                // if (!empty($estudiante['USER_ID_PROJECT'])) {
                                //     DB::table('users')
                                //         ->where('id', $estudiante['USER_ID_PROJECT'])
                                //         ->update([
                                //             'username'   => $username,
                                //             'email'      => $email,
                                //             'password'   => Hash::make($password),
                                //             'updated_at' => now()
                                //         ]);

                                //     if ($existingCandidate) {
                                //         // ACTUALIZAR candidato existente
                                //         DB::table('candidate')
                                //             ->where('EMAIL_PROJECT', $email)
                                //             ->update([
                                //                 'ID_PROJECT' => $request->input('ID_PROJECT', null),
                                //                 'COMPANY_PROJECT' => $empresa['NAME_PROJECT'] ?? '',
                                //                 'COMPANY_ID_PROJECT' => $request->input('ID_PROJECT', null),
                                //                 'CR_PROJECT' => $estudiante['CR_PROJECT'] ?? '',
                                //                 'LAST_NAME_PROJECT' => $lastName,
                                //                 'FIRST_NAME_PROJECT' => $firstName,
                                //                 'MIDDLE_NAME_PROJECT' => $middleName,
                                //                 'DOB_PROJECT' => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
                                //                 'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
                                //                 'EMAIL_PROJECT' => $email,
                                //                 'PASSWORD_PROJECT' => $password,
                                //                 'POSITION_PROJECT' => $estudiante['POSITION_PROJECT'] ?? '',
                                //                 'MEMBERSHIP_PROJECT' => $estudiante['MEMBERSHIP_PROJECT'] ?? '',
                                //                 'ACTIVO' => 1,
                                //                 'updated_at' => now()
                                //             ]);
                                //     } else {
                                //         $candidateId = DB::table('candidate')->insertGetId([
                                //             'ID_PROJECT' => $request->input('ID_PROJECT', null),
                                //             'COMPANY_PROJECT' => $empresa['NAME_PROJECT'] ?? '',
                                //             'COMPANY_ID_PROJECT' => $request->input('ID_PROJECT', null),
                                //             'CR_PROJECT' => $estudiante['CR_PROJECT'] ?? '',
                                //             'LAST_NAME_PROJECT' => $lastName,
                                //             'FIRST_NAME_PROJECT' => $firstName,
                                //             'MIDDLE_NAME_PROJECT' => $middleName,
                                //             'DOB_PROJECT' => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
                                //             'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
                                //             'EMAIL_PROJECT' => $email,
                                //             'PASSWORD_PROJECT' => $password,
                                //             'POSITION_PROJECT' => $estudiante['POSITION_PROJECT'] ?? '',
                                //             'MEMBERSHIP_PROJECT' => $estudiante['MEMBERSHIP_PROJECT'] ?? '',
                                //             'STATUS_MAIL_PROJECT' => 0,
                                //             'ACTIVO' => 1,
                                //             'created_at' => now(),
                                //             'updated_at' => now()
                                //         ]);
                                //         $estudiante['CANDIDATE_ID_PROJECT'] = $candidateId;
                                //     }
                                // } else {
                                //     $userId = DB::table('users')->insertGetId([
                                //         'username'   => $username,
                                //         'email'      => $email,
                                //         'password'   => Hash::make($password),
                                //         'rol'        => 1, // estudiante
                                //         'created_at' => now(),
                                //         'updated_at' => now()
                                //     ]);

                                //     $estudiante['USER_ID_PROJECT'] = $userId;

                                //     $candidateId = DB::table('candidate')->insertGetId([
                                //         'ID_PROJECT' => $estudiante['ID_PROJECT'] ?? null,
                                //         'COMPANY_PROJECT' => $empresa['NAME_PROJECT'] ?? '',
                                //         'COMPANY_ID_PROJECT' => $empresa['ID_PROJECT'] ?? null,
                                //         'CR_PROJECT' => $estudiante['CR_PROJECT'] ?? '',
                                //         'LAST_NAME_PROJECT' => $lastName,
                                //         'FIRST_NAME_PROJECT' => $firstName,
                                //         'MIDDLE_NAME_PROJECT' => $middleName,
                                //         'DOB_PROJECT' => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
                                //         'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
                                //         'EMAIL_PROJECT' => $email,
                                //         'PASSWORD_PROJECT' => $password,
                                //         'POSITION_PROJECT' => $estudiante['POSITION_PROJECT'] ?? '',
                                //         'MEMBERSHIP_PROJECT' => $estudiante['MEMBERSHIP_PROJECT'] ?? '',
                                //         'STATUS_MAIL_PROJECT' => 0,
                                //         'ACTIVO' => 1,
                                //         'created_at' => now(),
                                //         'updated_at' => now()
                                //     ]);

                                //     $estudiante['CANDIDATE_ID_PROJECT'] = $candidateId;
                                // }

                                $existingUser = DB::table('users')->where('email', $email)->first();
                                $userId = null;
                                if ($existingUser) {
                                    // Caso 1: USER_ID_PROJECT apunta al usuario correcto → actualiza datos
                                    if (!empty($estudiante['USER_ID_PROJECT']) && $existingUser->id == $estudiante['USER_ID_PROJECT']) {
                                        DB::table('users')
                                            ->where('id', $existingUser->id)
                                            ->update([
                                                'username'   => $username,
                                                'email'      => $email,
                                                'password'   => Hash::make($password),
                                                'updated_at' => now()
                                            ]);
                                        $userId = $existingUser->id;
                                    }
                                    // Caso 2: USER_ID_PROJECT apunta a otro → corrige referencia al existente
                                    else if (!empty($estudiante['USER_ID_PROJECT']) && $existingUser->id != $estudiante['USER_ID_PROJECT']) {
                                        DB::table('users')
                                            ->where('id', $existingUser->id)
                                            ->update([
                                                'username'   => $username,
                                                'email'      => $email,
                                                'password'   => Hash::make($password),
                                                'updated_at' => now()
                                            ]);
                                        $userId = $existingUser->id;
                                    }
                                    // Caso 3: USER_ID_PROJECT vacío, nulo o 0 → asigna user existente
                                    else {
                                        $userId = $existingUser->id;
                                    }
                                } else {
                                    // Caso 4: no existe usuario → crea uno nuevo
                                    $userId = DB::table('users')->insertGetId([
                                        'username'   => $username,
                                        'email'      => $email,
                                        'password'   => Hash::make($password),
                                        'rol'        => 1, // estudiante
                                        'created_at' => now(),
                                        'updated_at' => now()
                                    ]);
                                }

                                // asignar siempre el USER_ID_PROJECT correcto
                                $estudiante['USER_ID_PROJECT'] = $userId;

                                // buscar candidato
                                $existingCandidate = DB::table('candidate')->where('EMAIL_PROJECT', $email)->first();

                                if ($existingCandidate) {
                                    DB::table('candidate')
                                        ->where('EMAIL_PROJECT', $email)
                                        ->update([
                                            'ID_PROJECT'        => $request->input('ID_PROJECT', null),
                                            'COMPANY_PROJECT'   => $empresa['NAME_PROJECT'] ?? '',
                                            'COMPANY_ID_PROJECT'=> $request->input('ID_PROJECT', null),
                                            'CR_PROJECT'        => $estudiante['CR_PROJECT'] ?? '',
                                            'LAST_NAME_PROJECT' => $lastName,
                                            'FIRST_NAME_PROJECT'=> $firstName,
                                            'MIDDLE_NAME_PROJECT'=> $middleName,
                                            'DOB_PROJECT'       => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
                                            'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
                                            'EMAIL_PROJECT'     => $email,
                                            'PASSWORD_PROJECT'  => $password,
                                            'POSITION_PROJECT'  => $estudiante['POSITION_PROJECT'] ?? '',
                                            'MEMBERSHIP_PROJECT'=> $estudiante['MEMBERSHIP_PROJECT'] ?? '',
                                            'ACTIVO'            => 1,
                                            'updated_at'        => now()
                                        ]);
                                } else {
                                    $candidateId = DB::table('candidate')->insertGetId([
                                        'ID_PROJECT'        => $request->input('ID_PROJECT', null),
                                        'COMPANY_PROJECT'   => $empresa['NAME_PROJECT'] ?? '',
                                        'COMPANY_ID_PROJECT'=> $request->input('ID_PROJECT', null),
                                        'CR_PROJECT'        => $estudiante['CR_PROJECT'] ?? '',
                                        'LAST_NAME_PROJECT' => $lastName,
                                        'FIRST_NAME_PROJECT'=> $firstName,
                                        'MIDDLE_NAME_PROJECT'=> $middleName,
                                        'DOB_PROJECT'       => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
                                        'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
                                        'EMAIL_PROJECT'     => $email,
                                        'PASSWORD_PROJECT'  => $password,
                                        'POSITION_PROJECT'  => $estudiante['POSITION_PROJECT'] ?? '',
                                        'MEMBERSHIP_PROJECT'=> $estudiante['MEMBERSHIP_PROJECT'] ?? '',
                                        'STATUS_MAIL_PROJECT'=> 0,
                                        'ACTIVO'            => 1,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]);

                                    
                                    $estudiante['CANDIDATE_ID_PROJECT'] = $candidateId;
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
                    }
                    $response['code']  = 1;
                    $response['proyecto']  = $project;
                    return response()->json($response);
                break;
                    // tabla de curso
                case 2: 
                  $data = $request->all(); // si envías JSON, Laravel lo parsea automáticamente
                foreach ($data['courses'] as $candidateId => $courseData) {
                    $course = Course::where('ID_CANDIDATE', $candidateId)->first();
                    if ($course) {
                        $course->update($courseData);
                    } else {
                        Course::create($courseData);
                    }
                }
                $response['code'] = 1;
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
    public function detailsProject($ID_PROJECT)
    {
        $proyect = Proyect::findOrFail($ID_PROJECT);
        // $idInstructor = $proyect->INSTRUCTOR_ID_PROJECT;
        // $instructor = Instructor::findOrFail($idInstructor);
        // $idsNiveles = $proyect->ACCREDITATION_LEVELS_PROJECT; //array
        // $instructor = NivelAcreditacion::findOrFail($idsNiveles);
        // $idsBops = $proyect->BOP_TYPES_PROJECT; //array
        // $instructor = Instructor::findOrFail($idInstructor);
        // $idEnte = $proyect->ACCREDITING_ENTITY_PROJECT;
        // $instructor = Instructor::findOrFail($idInstructor);
        $idIdioma = $proyect->LANGUAGE_PROJECT;
        $idiomaProject = IdiomasExamenes::findOrFail($idIdioma);


        // --- ENTE ACREDITADOR ---
    $idEnte = $proyect->ACCREDITING_ENTITY_PROJECT;
    $enteAcreditador = EnteAcreditador::find($idEnte);
    $nombreEnte = $enteAcreditador->NOMBRE_ENTE ?? __('N/A');

    // --- NIVELES DE ACREDITACIÓN ---
    $idsNiveles = $proyect->ACCREDITATION_LEVELS_PROJECT ?? [];
    $nivelesAcreditacion = collect();

    if (!empty($idsNiveles)) {
        // Consultar los niveles que correspondan
        $niveles = NivelAcreditacion::whereIn('ID_CATALOGO_NIVELACREDITACION', $idsNiveles)->get();

        // Si el ente es 1 → usar DESCRIPCION_NIVEL
        // Si el ente es 2 → usar NOMBRE_NIVEL
        // En otro caso → N/A
        $nivelesAcreditacion = $niveles->map(function ($nivel) use ($idEnte) {
            if ($idEnte == 1) {
                return $nivel->DESCRIPCION_NIVEL ?? 'N/A';
            } elseif ($idEnte == 2) {
                return $nivel->NOMBRE_NIVEL ?? 'N/A';
            } else {
                return 'N/A';
            }
        });
    }

    // --- TIPOS DE BOP ---
    $idsBops = $proyect->BOP_TYPES_PROJECT ?? [];
    $tiposBop = collect();

    if (!empty($idsBops)) {
        $tiposBop = TipoBOP::whereIn('ID_CATALOGO_TIPOBOP', $idsBops)
            ->pluck('DESCRIPCION_TIPOBOP');
    }


        $visitas = 2;
        $membresiasActivas = 5;
        $membresiasEmpresas = 5;
        $membresiasIndividuales = 5;
        $historialMembresias = [58, 80, 85, 80, 70, 75, 85, 80, 79, 90, 89, 75];
        $proyectosActivos = 5;
        $proyectosProximos = 5;
        $proyectosFinalizados = 5;
        $accesos = 5;
        $historialEmpresas = [0, 0, 0, 0, 73, 76, 0, 0, 0, 0, 0, 60];

        return view('Admin.content.Admin.projects.details', compact(
            'proyect',
            'ID_PROJECT',
            'visitas',
            'membresiasActivas',
            'membresiasEmpresas',
            'membresiasIndividuales',
            'historialMembresias',
            'proyectosActivos',
            'proyectosProximos',
            'proyectosFinalizados',
            'accesos',
            'idiomaProject',
            'historialEmpresas',
            'nombreEnte',
            'nivelesAcreditacion',
            'tiposBop'
        ));
    }

    public function projectCourseDatatable(Request $request)
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

            $nivelesIDs = $proyecto->ACCREDITATION_LEVELS_PROJECT ?? [];
            $bopsIDs    = $proyecto->BOP_TYPES_PROJECT ?? [];
            $langID     = $proyecto->LANGUAGE_PROJECT;

            $niveles = NivelAcreditacion::whereIn('ID_CATALOGO_NIVELACREDITACION', $nivelesIDs)
                ->pluck('DESCRIPCION_NIVEL')
                ->toArray();

            $bops = TipoBOP::whereIn('ID_CATALOGO_TIPOBOP', $bopsIDs)
                ->pluck('ABREVIATURA')
                ->toArray();

            $lang = IdiomasExamenes::where('ID_CATALOGO_IDIOMAEXAMEN', $langID)
                ->value('NOMBRE_IDIOMA');
            $estudiantes = [];

            foreach ($empresas as $empresa) {
                foreach ($empresa['STUDENTS_PROJECT'] as $estudiante) {
                    $estudiantes[] = [
                        'NOMBRE_COMPLETO' => $estudiante['FIRST_NAME_PROJECT'] . ' ' . $estudiante['MIDDLE_NAME_PROJECT'] . ' ' . $estudiante['LAST_NAME_PROJECT'],
                        'NIVEL' => $niveles,
                        'BOP'   => $bops,
                        'UNITS' => '',
                        'LANG'  => $lang,
                        'PRACTICAL' => '',
                        'EQUIPAMENT' => '',
                        'P&P' => '',
                        'STATUS' => '',
                        'RESIT' => '',
                        'EQ' => '',
                        'FECHA' => '',
                        'SCORE' => '',
                        'FINALTEST' => '',
                        'VENCIMIENTO' => '',
                        'CORREO' => $estudiante['EMAIL_PROJECT'],
                        'BTN_ENVIAR' => '<button type="button"
                                            class="btn btn-sm btn-icon btn-action1 SENDCORREO"
                                            title="Enviar correo"
                                            onclick="enviarCredencialesCorreo(' . htmlspecialchars(json_encode([
                            'nombre' => $estudiante['FIRST_NAME_PROJECT'] . ' ' . $estudiante['MIDDLE_NAME_PROJECT'] . ' ' . $estudiante['LAST_NAME_PROJECT'],
                            'nivel' => $estudiante['EMAIL_PROJECT'],
                            'bop' => $estudiante['PASSWORD_PROJECT'],
                            'units' =>  $proyecto->MEMBERSHIP_START_PROJECT,
                            'lang' =>  $proyecto->MEMBERSHIP_END_PROJECT,
                        ]), ENT_QUOTES, 'UTF-8') . ')">
                                            <i class="ri-mail-send-line" style="font-size: 1.2rem;"></i> Enviar acceso
                                        </button>',
                        'BTN_EDITAR' => '<button type="button"
                                            class="btn btn-sm btn-icon btn-action1 SENDCORREO"
                                            title="Enviar correo"
                                            onclick="enviarCredencialesCorreo(' . htmlspecialchars(json_encode([
                            'nombre' => $estudiante['FIRST_NAME_PROJECT'] . ' ' . $estudiante['MIDDLE_NAME_PROJECT'] . ' ' . $estudiante['LAST_NAME_PROJECT'],
                            'nivel' => $estudiante['EMAIL_PROJECT'],
                            'bop' => $estudiante['PASSWORD_PROJECT'],
                            'units' =>  $proyecto->MEMBERSHIP_START_PROJECT,
                            'lang' =>  $proyecto->MEMBERSHIP_END_PROJECT,
                        ]), ENT_QUOTES, 'UTF-8') . ')">
                                             Editar
                                        </button>'
                    ];
                }
            }

            return response()->json([
                'data' => $estudiantes,
                'msj' => 'Curso cargado correctamente'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'msj' => 'Error: ' . $e->getMessage(),
                'data' => []
            ]);
        }
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
                        'EMPRESA' => $estudiante['COMPANY_PROJECT'],
                        'CR' => $estudiante['CR_PROJECT'],
                        'LASTNAME' => $estudiante['LAST_NAME_PROJECT'],
                        'FIRSTNAME' =>  $estudiante['FIRST_NAME_PROJECT'],
                        'MIDDLENAME' =>  $estudiante['MIDDLE_NAME_PROJECT'],
                        'DOB' => $estudiante['BIRTH_DATE_PROJECT'],
                        'ID_NUMBER' => $estudiante['ID_NUMBER_PROJECT'],
                        'CARGO' => $estudiante['POSITION_PROJECT'],
                        'EMAIL' => $estudiante['EMAIL_PROJECT'],
                        'PASSWORD' => $estudiante['PASSWORD_PROJECT'],
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
                                            <i class="ri-mail-send-line" style="font-size: 1.2rem;"></i> Enviar acceso
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
    public function editarTablaCandidato($ID_PROJECT)
    {
        $candidatos = candidate::where('ID_PROJECT', $ID_PROJECT)->get();
        return response()->json($candidatos);
    }

    public function editarTablaCurso($ID_PROJECT)
    {
        try {
            // Obtener el proyecto con los datos necesarios
            $proyecto = Proyect::find($ID_PROJECT);

            if (!$proyecto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            // Verificar si existen cursos para este proyecto
            $existenCursos = Course::where('ID_PROJECT', $ID_PROJECT)->exists();

            if ($existenCursos) {
                // Caso 1: Ya existen cursos - obtener datos completos
                $cursos = Course::where('ID_PROJECT', $ID_PROJECT)
                    ->with(['candidate' => function ($query) {
                        $query->where('ACTIVO', 1)
                            ->select(
                                'ID_CANDIDATE',
                                'ID_PROJECT',
                                'LAST_NAME_PROJECT',
                                'FIRST_NAME_PROJECT',
                                'MIDDLE_NAME_PROJECT',
                                'EMAIL_PROJECT',
                                'ACTIVO'
                            );
                    }])
                    ->get();

                $estudiantes = [];
                foreach ($cursos as $curso) {
                    if ($curso->candidate) {
                        $estudiantes[] = [
                            'curso_id' => $curso->ID_COURSE,
                            'candidato' => [
                                'ID_CANDIDATE' => $curso->candidate->ID_CANDIDATE,
                                'LAST_NAME_PROJECT' => $curso->candidate->LAST_NAME_PROJECT,
                                'FIRST_NAME_PROJECT' => $curso->candidate->FIRST_NAME_PROJECT,
                                'MIDDLE_NAME_PROJECT' => $curso->candidate->MIDDLE_NAME_PROJECT,
                                'EMAIL_PROJECT' => $curso->candidate->EMAIL_PROJECT,
                                'ACTIVO' => $curso->candidate->ACTIVO
                            ],
                            'datos_curso' => [
                                'PRACTICAL' => $curso->PRACTICAL,
                                'PRACTICAL_PASS' => $curso->PRACTICAL_PASS,
                                'EQUIPAMENT' => $curso->EQUIPAMENT,
                                'EQUIPAMENT_PASS' => $curso->EQUIPAMENT_PASS,
                                'PYP' => $curso->PYP,
                                'PYP_PASS' => $curso->PYP_PASS,
                                'STATUS' => $curso->STATUS,
                                'RESIT' => $curso->RESIT,
                                'INTENTOS' => $curso->INTENTOS,
                                'RESIT_MODULE' => $curso->RESIT_MODULE,
                                'RESIT_INMEDIATO' => $curso->RESIT_INMEDIATO,
                                'RESIT_INMEDIATO_DATE' => $curso->RESIT_INMEDIATO_DATE,
                                'RESIT_INMEDIATO_SCORE' => $curso->RESIT_INMEDIATO_SCORE,
                                'RESIT_INMEDIATO_STATUS' => $curso->RESIT_INMEDIATO_STATUS,
                                'RESIT_PROGRAMADO' => $curso->RESIT_PROGRAMADO,
                                'RESIT_ENTRENAMIENTO' => $curso->RESIT_ENTRENAMIENTO,
                                'RESIT_FOLIO_PROYECTO' => $curso->RESIT_FOLIO_PROYECTO,
                                'RESIT_PROGRAMADO_DATE' => $curso->RESIT_PROGRAMADO_DATE,
                                'RESIT_PROGRAMADO_SCORE' => $curso->RESIT_PROGRAMADO_SCORE,
                                'RESIT_PROGRAMADO_STATUS' => $curso->RESIT_PROGRAMADO_STATUS,
                                'FINAL_STATUS' => $curso->FINAL_STATUS,
                                'HAVE_CERTIFIED' => $curso->HAVE_CERTIFIED,
                                'CERTIFIED' => $curso->CERTIFIED,
                                'EXPIRATION' => $curso->EXPIRATION
                            ]
                        ];
                    }
                }
            } else {
                // Caso 2: No existen cursos - obtener solo datos básicos de candidatos
                $candidatos = Candidate::where('ID_PROJECT', $ID_PROJECT)
                    ->where('ACTIVO', 1)
                    ->select(
                        'ID_CANDIDATE',
                        'ID_PROJECT',
                        'LAST_NAME_PROJECT',
                        'FIRST_NAME_PROJECT',
                        'MIDDLE_NAME_PROJECT',
                        'EMAIL_PROJECT',
                        'ACTIVO'
                    )
                    ->get();

                $estudiantes = [];
                foreach ($candidatos as $candidato) {
                    $estudiantes[] = [
                        'curso_id' => null,
                        'candidato' => [
                            'ID_CANDIDATE' => $candidato->ID_CANDIDATE,
                            'LAST_NAME_PROJECT' => $candidato->LAST_NAME_PROJECT,
                            'FIRST_NAME_PROJECT' => $candidato->FIRST_NAME_PROJECT,
                            'MIDDLE_NAME_PROJECT' => $candidato->MIDDLE_NAME_PROJECT,
                            'EMAIL_PROJECT' => $candidato->EMAIL_PROJECT,
                            'ACTIVO' => $candidato->ACTIVO
                        ],
                        'datos_curso' => [
                            'UNITS' => null,
                            'PRACTICAL' => null,
                            'PRACTICAL_PASS' => null,
                            'EQUIPAMENT' => null,
                            'EQUIPAMENT_PASS' => null,
                            'PYP' => null,
                            'PYP_PASS' => null,
                            'RESUME' => null,
                            'STATUS' => null,
                            'RESIT' => null,
                            'MODULE_RESIT' => null,
                            'RESIT_DATE' => null,
                            'RESIT_SCORE' => null,
                            'RESIT_PASS' => null,
                            'FINAL_SCORE' => null,
                            'FINAL_STATUS' => null,
                            'HAVE_CERTIFIED' => null,
                            'CERTIFIED' => null,
                            'EXPIRATION' => null
                        ]
                    ];
                }
            }

            $startDate = Carbon::parse($proyecto->COURSE_END_DATE_PROJECT);

            $daysRest = 0;

            if($proyecto->ACCREDITING_ENTITY_PROJECT === "1"){ //IADC
                  $daysRest = 45;
            } else if($proyecto->ACCREDITING_ENTITY_PROJECT === "2"){ //IWCF
                    $daysRest = 90;
            }
            $endDate = $startDate->copy()->addDays($daysRest);

            $diff = Carbon::today()->diffInDays($endDate, false);

            if ($diff > 1) {
                $remainingDays = $diff . ' días restantes';
            } elseif ($diff === 1) {
                $remainingDays = '1 día restante';
            } else {
                $remainingDays = 'Expirado';
            }
            
            $formattedEndDate = $endDate->locale('es')->isoFormat('DD MMM YYYY');

            // Procesar los datos del proyecto
            $proyectoData = [
                'LANGUAGE_PROJECT' => $this->getLanguajes($proyecto->LANGUAGE_PROJECT),
                'ACCREDITING_ENTITY_PROJECT' => $proyecto->ACCREDITING_ENTITY_PROJECT,
                'ACCREDITATION_LEVELS_PROJECT' => $this->getNivelesAcreditacion($proyecto->ACCREDITATION_LEVELS_PROJECT),
                'BOP_TYPES_PROJECT' => $this->getTiposBOP($proyecto->BOP_TYPES_PROJECT),
                'COURSE_END_DATE_90' => $formattedEndDate,
                'DAYS_REST' => $daysRest . ' días',
                'DAYS_REMAINING' => $remainingDays
            ];

            return response()->json([
                'success' => true,
                'proyecto' => $proyectoData,
                'estudiantes' => $estudiantes,
                'tiene_cursos' => $existenCursos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function exportProjectExcel($id)
    {
        $proyecto = Proyect::where('ID_PROJECT', $id)->first();

        if (!$proyecto) {
            return redirect()->back()->with('error', 'Proyecto no encontrado');
        }

        $empresas = $proyecto->COMPANIES_PROJECT;
        $niveles = NivelAcreditacion::whereIn('ID_CATALOGO_NIVELACREDITACION', $proyecto->ACCREDITATION_LEVELS_PROJECT ?? [])
            ->pluck('DESCRIPCION_NIVEL')->toArray();
        $bops = TipoBOP::whereIn('ID_CATALOGO_TIPOBOP', $proyecto->BOP_TYPES_PROJECT ?? [])
            ->pluck('ABREVIATURA')->toArray();
        $lang = IdiomasExamenes::where('ID_CATALOGO_IDIOMAEXAMEN', $proyecto->LANGUAGE_PROJECT)
            ->value('NOMBRE_IDIOMA');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Curso');

        // Configurar título principal
        $sheet->setCellValue('A1', 'COURSE/CURSO TITLE');
        $sheet->mergeCells('A1:R1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFD9D9D9');

        // Información del centro de certificación
        $sheet->setCellValue('A2', 'Registered Certification Centre Name:');
        $sheet->setCellValue('B2', 'smith mason and co');
        $sheet->mergeCells('B2:F2');
        $sheet->setCellValue('G2', 'Center Number:');
        $sheet->setCellValue('H2', '2321312');
        $sheet->setCellValue('I2', 'Tipo curso:');
        $sheet->setCellValue('J2', 'abierto');
        $sheet->setCellValue('K2', 'Folio:');
        $sheet->setCellValue('L2', 'STE-TR-013');

        // Dirección del lugar de prueba
        $sheet->setCellValue('A3', 'Test venue address:');
        $sheet->setCellValue('B3', 'Calle Carmen Cadena de Buendia No. 128 Col. Nueva Villahermosa, CP 86070, Villahermosa');
        $sheet->mergeCells('B3:R3');

        // Fecha y hora de prueba
        $sheet->setCellValue('A5', 'Test date:');
        $sheet->setCellValue('B5', '22/01/2025');
        $sheet->mergeCells('B5:C5');
        $sheet->setCellValue('D5', 'Test time:');
        $sheet->setCellValue('E5', '3hours');
        $sheet->setCellValue('F5', 'Practical date(s)');
        $sheet->setCellValue('G5', '21/03/2025');
        $sheet->mergeCells('G5:I5');
        $sheet->setCellValue('J5', 'Practical time(s):');
        $sheet->setCellValue('K5', '3hours');

        // Contacto
        $sheet->setCellValue('A6', 'Contact:');
        $sheet->setCellValue('B6', 'Leonardo Cuellar Chala');
        $sheet->mergeCells('B6:F6');
        $sheet->setCellValue('G6', 'Tel:');
        $sheet->setCellValue('H6', '+52 99299292');
        $sheet->mergeCells('H6:R6');

        // Encabezados de la tabla
        $headers = [
            'A8' => 'Number',
            'B8' => 'Family o last name',
            'C8' => 'First name',
            'D8' => 'md name',
            'E8' => 'Level/Nivel',
            'F8' => 'BOP',
            'G8' => 'Units',
            'H8' => 'Language',
            'I8' => 'Module',
            'J8' => 'Score',
            'K8' => 'Status',
            'L8' => 'Resit',
            'M8' => 'Module',
            'N8' => 'Fecha',
            'O8' => 'Score',
            'P8' => 'Final Test',
            'Q8' => 'Vencimiento certificacion',
            'R8' => 'Correo'
        ];

        foreach ($headers as $cell => $value) {
            $sheet->setCellValue($cell, $value);
        }

        // Combinar celdas de encabezados
        $sheet->mergeCells('B8:B9');  // Family o last name
        $sheet->mergeCells('C8:C9');  // First name
        $sheet->mergeCells('D8:D9');  // md name
        $sheet->mergeCells('E8:E9');  // Level/Nivel
        $sheet->mergeCells('F8:F9');  // BOP
        $sheet->mergeCells('G8:G9');  // Units
        $sheet->mergeCells('H8:H9');  // Language
        $sheet->mergeCells('R8:R9');  // Correo

        // Subencabezados para candidatos
        $sheet->setCellValue('A9', 'Candidate/Candidato');

        // Estilo de encabezados
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FF000000']
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFD9D9D9']
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000']
                ]
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];

        $sheet->getStyle('A8:R9')->applyFromArray($headerStyle);

        // Datos de ejemplo (reemplaza con tus datos reales)
        $estudiantes = [
            [
                'numero' => 1,
                'apellido' => 'perez',
                'nombre' => 'juan',
                'segundo_nombre' => 'manuel',
                'nivel' => 'Level 4',
                'bop' => 'Surface Only',
                'unidades' => 4,
                'idioma' => 'Español',
                'modulo_practico' => 'Practical',
                'score_practico' => 78,
                'status_practico' => 'Pass',
                'modulo_equipo' => 'Equipment',
                'score_equipo' => 80,
                'status_equipo' => 'Pass',
                'modulo_p2p' => 'P&P',
                'score_p2p' => 81,
                'status_p2p' => 'Unpass',
                'resit' => 'yes',
                'modulo_resit' => 'EQ',
                'fecha_resit' => '22/08/2025',
                'score_resit' => 90,
                'final_test' => 80,
                'vencimiento' => '10/10/2026',
                'correo' => 'correo@gmail.com'
            ],
            [
                'numero' => 2,
                'apellido' => 'martinez',
                'nombre' => 'jose',
                'segundo_nombre' => '',
                'nivel' => 'Level 4',
                'bop' => 'Surface Only',
                'unidades' => 4,
                'idioma' => 'Español',
                'modulo_practico' => 'Practical',
                'score_practico' => 78,
                'status_practico' => 'Pass',
                'modulo_equipo' => 'Equipment',
                'score_equipo' => 80,
                'status_equipo' => 'Pass',
                'modulo_p2p' => 'P&P',
                'score_p2p' => 90,
                'status_p2p' => 'Pass',
                'resit' => 'No',
                'modulo_resit' => 'EQ',
                'fecha_resit' => '',
                'score_resit' => '',
                'final_test' => 90,
                'vencimiento' => '10/10/2026',
                'correo' => 'correo@gmail.com'
            ],
            [
                'numero' => 3,
                'apellido' => 'martinez',
                'nombre' => 'jose',
                'segundo_nombre' => '',
                'nivel' => 'Level 4',
                'bop' => 'Surface Only',
                'unidades' => 4,
                'idioma' => 'Español',
                'modulo_practico' => 'Practical',
                'score_practico' => 78,
                'status_practico' => 'Unpass',
                'modulo_equipo' => 'Equipment',
                'score_equipo' => 80,
                'status_equipo' => 'Unpass',
                'modulo_p2p' => 'P&P',
                'score_p2p' => 90,
                'status_p2p' => 'Unpass',
                'resit' => 'yes',
                'modulo_resit' => 'EQ',
                'fecha_resit' => '22/08/2025',
                'score_resit' => 60,
                'final_test' => 60,
                'vencimiento' => '',
                'correo' => 'correo@gmail.com'
            ]
        ];

        $rowNumber = 10;
        foreach ($estudiantes as $estudiante) {
            // Fila principal
            $sheet->setCellValue('A' . $rowNumber, $estudiante['numero']);
            $sheet->setCellValue('B' . $rowNumber, $estudiante['apellido']);
            $sheet->setCellValue('C' . $rowNumber, $estudiante['nombre']);
            $sheet->setCellValue('D' . $rowNumber, $estudiante['segundo_nombre']);
            $sheet->setCellValue('E' . $rowNumber, $estudiante['nivel']);
            $sheet->setCellValue('F' . $rowNumber, $estudiante['bop']);
            $sheet->setCellValue('G' . $rowNumber, $estudiante['unidades']);
            $sheet->setCellValue('H' . $rowNumber, $estudiante['idioma']);
            $sheet->setCellValue('I' . $rowNumber, $estudiante['modulo_practico']);
            $sheet->setCellValue('J' . $rowNumber, $estudiante['score_practico'] . '%');
            $sheet->setCellValue('K' . $rowNumber, $estudiante['status_practico']);
            $sheet->setCellValue('L' . $rowNumber, $estudiante['resit']);
            $sheet->setCellValue('M' . $rowNumber, $estudiante['modulo_resit']);
            $sheet->setCellValue('N' . $rowNumber, $estudiante['fecha_resit']);
            $sheet->setCellValue('O' . $rowNumber, $estudiante['score_resit'] ? $estudiante['score_resit'] . '%' : '');
            $sheet->setCellValue('P' . $rowNumber, $estudiante['final_test'] ? $estudiante['final_test'] . '%' : '');
            $sheet->setCellValue('Q' . $rowNumber, $estudiante['vencimiento']);
            $sheet->setCellValue('R' . $rowNumber, $estudiante['correo']);

            // Segunda fila (Equipment)
            $rowNumber++;
            $sheet->setCellValue('I' . $rowNumber, $estudiante['modulo_equipo']);
            $sheet->setCellValue('J' . $rowNumber, $estudiante['score_equipo'] . '%');
            $sheet->setCellValue('K' . $rowNumber, $estudiante['status_equipo']);
            $sheet->setCellValue('M' . $rowNumber, 'P&P');

            // Tercera fila (P&P)
            $rowNumber++;
            $sheet->setCellValue('I' . $rowNumber, $estudiante['modulo_p2p']);
            $sheet->setCellValue('J' . $rowNumber, $estudiante['score_p2p'] . '%');
            $sheet->setCellValue('K' . $rowNumber, $estudiante['status_p2p']);

            // Combinar celdas para cada estudiante
            $startRow = $rowNumber - 2;
            $endRow = $rowNumber;

            $sheet->mergeCells('A' . $startRow . ':A' . $endRow);
            $sheet->mergeCells('B' . $startRow . ':B' . $endRow);
            $sheet->mergeCells('C' . $startRow . ':C' . $endRow);
            $sheet->mergeCells('D' . $startRow . ':D' . $endRow);
            $sheet->mergeCells('E' . $startRow . ':E' . $endRow);
            $sheet->mergeCells('F' . $startRow . ':F' . $endRow);
            $sheet->mergeCells('G' . $startRow . ':G' . $endRow);
            $sheet->mergeCells('H' . $startRow . ':H' . $endRow);
            $sheet->mergeCells('L' . $startRow . ':L' . $endRow);
            $sheet->mergeCells('N' . $startRow . ':N' . $endRow);
            $sheet->mergeCells('O' . $startRow . ':O' . $endRow);
            $sheet->mergeCells('P' . $startRow . ':P' . $endRow);
            $sheet->mergeCells('Q' . $startRow . ':Q' . $endRow);
            $sheet->mergeCells('R' . $startRow . ':R' . $endRow);

            // Aplicar colores según el estado
            $colorFondo = 'FFFFFFFF'; // Blanco por defecto

            // Determinar color según el rendimiento general
            $allPassed = ($estudiante['status_practico'] === 'Pass' &&
                $estudiante['status_equipo'] === 'Pass' &&
                $estudiante['status_p2p'] === 'Pass');
            $anyUnpass = ($estudiante['status_practico'] === 'Unpass' ||
                $estudiante['status_equipo'] === 'Unpass' ||
                $estudiante['status_p2p'] === 'Unpass');

            if ($allPassed) {
                $colorFondo = 'FFC6EFCE'; // Verde claro
            } elseif ($anyUnpass) {
                $colorFondo = 'FFFFC7CE'; // Rosa claro
            }

            // Aplicar color de fondo a toda la fila del estudiante
            $sheet->getStyle('A' . $startRow . ':R' . $endRow)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB($colorFondo);

            // Aplicar bordes
            $sheet->getStyle('A' . $startRow . ':R' . $endRow)->getBorders()
                ->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            // Centrar contenido
            $sheet->getStyle('A' . $startRow . ':R' . $endRow)->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $rowNumber++;
        }

        // Aplicar bordes a la información del encabezado
        $sheet->getStyle('A2:R6')->getBorders()
            ->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Aplicar negrita a las etiquetas
        $labelCells = ['A2', 'G2', 'I2', 'K2', 'A3', 'A5', 'D5', 'F5', 'J5', 'A6', 'G6'];
        foreach ($labelCells as $cell) {
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }

        // Ajustar ancho de columnas
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(12);
        $sheet->getColumnDimension('C')->setWidth(12);
        $sheet->getColumnDimension('D')->setWidth(10);
        $sheet->getColumnDimension('E')->setWidth(10);
        $sheet->getColumnDimension('F')->setWidth(12);
        $sheet->getColumnDimension('G')->setWidth(8);
        $sheet->getColumnDimension('H')->setWidth(10);
        $sheet->getColumnDimension('I')->setWidth(12);
        $sheet->getColumnDimension('J')->setWidth(8);
        $sheet->getColumnDimension('K')->setWidth(10);
        $sheet->getColumnDimension('L')->setWidth(8);
        $sheet->getColumnDimension('M')->setWidth(10);
        $sheet->getColumnDimension('N')->setWidth(12);
        $sheet->getColumnDimension('O')->setWidth(8);
        $sheet->getColumnDimension('P')->setWidth(10);
        $sheet->getColumnDimension('Q')->setWidth(15);
        $sheet->getColumnDimension('R')->setWidth(20);

        $filename = 'Curso_' . $id . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Enviar archivo al navegador
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    private function getNivelesAcreditacion($nivelesIds)
    {
        if (!is_array($nivelesIds)) {
            return [];
        }

        $niveles = NivelAcreditacion::whereIn('ID_CATALOGO_NIVELACREDITACION', $nivelesIds)
            ->get()
            ->map(function ($nivel) {
                return [
                    'id' => $nivel->ID_CATALOGO_NIVELACREDITACION,
                    'nombre' => $nivel->NOMBRE_NIVEL,
                    'descripcion' => $nivel->DESCRIPCION_NIVEL
                ];
            });

        return $niveles;
    }
    private function getLanguajes($languaje)
    {
        $languajes = IdiomasExamenes::where('ID_CATALOGO_IDIOMAEXAMEN', $languaje)
            ->get()
            ->map(function ($idioma) {
                return [
                    'ID_CATALOGO_IDIOMAEXAMEN' => $idioma->ID_CATALOGO_IDIOMAEXAMEN,
                    'NOMBRE_IDIOMA' => $idioma->NOMBRE_IDIOMA,
                    'DESCRIPCION_IDIOMAS' => $idioma->DESCRIPCION_IDIOMAS
                ];
            });

        return $languajes;
    }



    // Función para obtener los tipos BOP
    private function getTiposBOP($bopIds)
    {
        if (!is_array($bopIds)) {
            return [];
        }

        $tiposBOP = TipoBOP::whereIn('ID_CATALOGO_TIPOBOP', $bopIds)
            ->get()
            ->map(function ($bop) {
                return [
                    'id' => $bop->ID_CATALOGO_TIPOBOP,
                    'abreviatura' => $bop->ABREVIATURA,
                    'descripcion' => $bop->DESCRIPCION_TIPOBOP
                ];
            });

        return $tiposBOP;
    }
}
