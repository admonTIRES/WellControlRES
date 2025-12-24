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
use App\Models\Admin\catalogs\NombreProyecto;
use App\Models\Admin\catalogs\CentrosCapacitacion;
use App\Models\Admin\catalogs\Operacion;
use App\Models\Admin\catalogs\Programas;

use App\Models\Admin\Project\candidate;
use App\Models\Admin\Project\Course;
use App\Models\Admin\catalogs\Instructor;

use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Illuminate\Support\Facades\Storage;

class ProjectManagementController extends Controller
{

    public function proyectoDatatable()
    {
        try {
            $tabla = Proyect::with(['candidates' => function ($query) {
                $query->select('*');
            }])
                ->orderBy('COURSE_START_DATE_PROJECT', 'asc')
                ->get();

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
                // if (is_array($value->COMPANIES_PROJECT)) {
                //     foreach ($value->COMPANIES_PROJECT as $empresa) {
                //         if (!empty($empresa['NAME_PROJECT'])) {
                //             $companies[] = $empresa['NAME_PROJECT'];
                //         }
                //     }
                // }
                $value->COMPANIES = $companies;

                $nombreProyectoModel = NombreProyecto::find($value->COURSE_NAME_ES_PROJECT);
                $value->nombreProyecto = $nombreProyectoModel ? $nombreProyectoModel->NOMBRE_PROYECTO : '—';

                if ($value->candidates) {
                    $value->CANDIDATES_DATA = $value->candidates->map(function ($candidate) {
                        $candidateArray = $candidate->toArray();
                        unset($candidateArray['user']);
                        return $candidateArray;
                    });
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
    // STORE - CATALOGOS
    public function store(Request $request)
    {
        try {
            switch (intval($request->api)) {
                case 1:
                    $data = $request->all();
                    $candidatesCreated = 0;
                    $candidatesUpdated = 0;
                    if ($request->has('COMPANIES[]') && is_string($request->get('COMPANIES[]'))) {
                        $tagifyData = json_decode($request->get('COMPANIES[]'), true);

                        $simpleCompanies = [];
                        foreach ($tagifyData as $empresa) {
                            $razonesSociales = [];
                            if (isset($empresa['razonSocial'])) {
                                try {
                                    $razonesSociales = json_decode($empresa['razonSocial'], true);
                                } catch (\Exception $e) {
                                    $razonesSociales = $empresa['razonSocial'];
                                }
                            }

                            $simpleCompanies[] = [
                                'ID' => $empresa['name'] ?? null,
                                'NAME' => $empresa['value'] ?? '',
                                'RAZONES_SOCIALES' => $razonesSociales
                            ];
                        }

                        $data['COMPANIES_PROJECT'] = json_encode($simpleCompanies);
                    } else {
                        $data['COMPANIES_PROJECT'] = null;
                    }
                    if ($request->ID_PROJECT == 0) {
                        DB::statement('ALTER TABLE proyect AUTO_INCREMENT=1;');
                        $project = Proyect::create($data);
                    } else {
                        $project = Proyect::find($request->ID_PROJECT);
                        $project->update($data);
                    }

                    $projectId = $project->ID_PROJECT;

                    if ($request->has('COMPANIES_PROJECT') && is_string($request->COMPANIES_PROJECT)) {
                        $companiesData = json_decode($request->COMPANIES_PROJECT, true);

                        if (json_last_error() !== JSON_ERROR_NONE) {
                            throw new \Exception('Formato inválido para COMPANIES_PROJECT');
                        }

                        foreach ($companiesData as $empresa) {
                            if (!isset($empresa['STUDENTS_PROJECT'])) continue;

                            foreach ($empresa['STUDENTS_PROJECT'] as $estudiante) {
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

                                $existingUser = DB::table('users')->where('email', $email)->first();
                                $userId = null;

                                if ($existingUser) {
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
                                    } else {
                                        $userId = $existingUser->id;
                                    }
                                } else {
                                    $userId = DB::table('users')->insertGetId([
                                        'username'   => $username,
                                        'email'      => $email,
                                        'password'   => Hash::make($password),
                                        'rol'        => 1, // estudiante
                                        'created_at' => now(),
                                        'updated_at' => now()
                                    ]);
                                }

                                $existingCandidate = DB::table('candidate')
                                    ->where('EMAIL_PROJECT', $email)
                                    ->where('ID_PROJECT', $projectId)
                                    ->first();

                                if ($existingCandidate) {
                                    DB::table('candidate')
                                        ->where('ID_CANDIDATE', $existingCandidate->ID_CANDIDATE)
                                        ->update([
                                            'ID_PROJECT'        => $projectId,
                                            'COMPANY_PROJECT'   => $estudiante['RAZON_SOCIAL_PROJECT'] ?? '', // ✅ Razón social como COMPANY_PROJECT
                                            'COMPANY_ID_PROJECT' => $estudiante['COMPANY_ID'] ?? 0, // ✅ ID de empresa como COMPANY_ID_PROJECT
                                            'CR_PROJECT'        => $estudiante['CR_PROJECT'] ?? '',
                                            'LAST_NAME_PROJECT' => $lastName,
                                            'FIRST_NAME_PROJECT' => $firstName,
                                            'MIDDLE_NAME_PROJECT' => $middleName,
                                            'DOB_PROJECT'       => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
                                            'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
                                            'EMAIL_PROJECT'     => $email,
                                            'PASSWORD_PROJECT'  => $password,
                                            'POSITION_PROJECT'  => $estudiante['POSITION_PROJECT'] ?? '',
                                            'MEMBERSHIP_PROJECT' => $estudiante['MEMBERSHIP_PROJECT'] ?? '',
                                            'ACTIVO'            => 1,
                                            'updated_at'        => now()
                                        ]);
                                    $candidatesUpdated++;
                                } else {
                                    $candidateId = DB::table('candidate')->insertGetId([
                                        'ID_PROJECT'        => $projectId,
                                        'COMPANY_PROJECT'   => $estudiante['RAZON_SOCIAL_PROJECT'] ?? '', // ✅ Razón social como COMPANY_PROJECT
                                        'COMPANY_ID_PROJECT' => $estudiante['COMPANY_ID'] ?? null, // ✅ ID de empresa como COMPANY_ID_PROJECT
                                        'CR_PROJECT'        => $estudiante['CR_PROJECT'] ?? '',
                                        'LAST_NAME_PROJECT' => $lastName,
                                        'FIRST_NAME_PROJECT' => $firstName,
                                        'MIDDLE_NAME_PROJECT' => $middleName,
                                        'DOB_PROJECT'       => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
                                        'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
                                        'EMAIL_PROJECT'     => $email,
                                        'PASSWORD_PROJECT'  => $password,
                                        'POSITION_PROJECT'  => $estudiante['POSITION_PROJECT'] ?? '',
                                        'MEMBERSHIP_PROJECT' => $estudiante['MEMBERSHIP_PROJECT'] ?? '',
                                        'STATUS_MAIL_PROJECT' => 0,
                                        'ACTIVO'            => 1,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]);

                                    $candidatesCreated++;
                                }
                            }
                        }
                    }

                    $projectData = Proyect::find($projectId);
                    $candidatesData = DB::table('candidate')
                        ->where('ID_PROJECT', $projectId)
                        ->get();

                    $response['code'] = 1;
                    $response['message'] = "Proyecto guardado exitosamente";
                    $response['proyecto'] = [
                        'ID_PROJECT' => $projectData->ID_PROJECT,
                        'COMPANIES_PROJECT' => $projectData->COMPANIES_PROJECT,
                        'created_at' => $projectData->created_at,
                        'updated_at' => $projectData->updated_at
                    ];
                    $response['candidates'] = [
                        'total' => $candidatesData->count(),
                        'created' => $candidatesCreated,
                        'updated' => $candidatesUpdated,
                        'data' => $candidatesData->map(function ($candidate) {
                            return [
                                'ID_CANDIDATE' => $candidate->ID_CANDIDATE,
                                'COMPANY_PROJECT' => $candidate->COMPANY_PROJECT, 
                                'COMPANY_ID_PROJECT' => $candidate->COMPANY_ID_PROJECT, 
                                'EMAIL_PROJECT' => $candidate->EMAIL_PROJECT,
                                'FIRST_NAME_PROJECT' => $candidate->FIRST_NAME_PROJECT,
                                'LAST_NAME_PROJECT' => $candidate->LAST_NAME_PROJECT
                            ];
                        })
                    ];
                    return response()->json($response);
                    break;
                case 2:
                    DB::beginTransaction();
                    try {
                        $coursesInput = $request->input('courses');
                        $idProject = $request->input('ID_PROJECT');

                        if (!$coursesInput) {
                            return response()->json(['code' => 0, 'msj' => 'No se recibieron datos para guardar.']);
                        }

                        $project = Proyect::find($idProject);
                        $programDef = [];
                        if ($project && $project->PROGRAM_PROJECT) {
                            $programa = Programas::find($project->PROGRAM_PROJECT);
                            if ($programa && !empty($programa->COMPLEMENTS_PROGRAM)) {
                                $programDef = json_decode($programa->COMPLEMENTS_PROGRAM, true) ?? [];
                            }
                        }

                        foreach ($coursesInput as $candidateId => $data) {

                            $course = Course::firstOrNew([
                                'ID_CANDIDATE' => $candidateId,
                                'ID_PROJECT' => $idProject
                            ]);

                            $complementsToSave = [];
                            $masterSwitch = isset($data['CO']) ? (int)$data['CO'] : 0;
                            $course->CO = $masterSwitch;

                            foreach ($programDef as $index => $def) {
                                $complementsToSave[] = [
                                    'nombre' => $def['nombre'],
                                    'score' => $data["COMPLEMENTO_{$index}"] ?? null,
                                    'status' => $data["COMPLEMENTO_{$index}_STATUS"] ?? null,
                                    'enabled' => isset($data["COMP_{$index}_ENABLED"]) ? (int)$data["COMP_{$index}_ENABLED"] : 0
                                ];
                            }

                            $course->COMPLEMENTS_JSON = json_encode([
                                'has_complements' => $masterSwitch,
                                'items' => $complementsToSave
                            ]);

                            $fields = [
                                'PRACTICAL',
                                'PRACTICAL_PASS',
                                'EQUIPAMENT',
                                'EQUIPAMENT_PASS',
                                'PYP',
                                'PYP_PASS',
                                'STATUS',
                                'RESIT',
                                'INTENTOS',
                                'RESIT_MODULE',
                                'RESIT_INMEDIATO',
                                'RESIT_INMEDIATO_DATE',
                                'RESIT_INMEDIATO_SCORE',
                                'RESIT_INMEDIATO_STATUS',
                                'REFRESH',
                                'REFRESH_DATE',
                                'FINAL_STATUS',
                                'HAVE_CERTIFIED',
                                'CERTIFICATE_NUMBER',
                                'EXPIRATION',
                                'ENABLE_NOTIFICATIONS',
                                'EMAILS_SENT',
                                'LEVEL'
                            ];

                            foreach ($fields as $field) {
                                $course->$field = $data[$field] ?? null;
                            }

                            for ($i = 1; $i <= 3; $i++) {
                                $course->{"RESIT_$i"} = isset($data["RESIT_$i"]) ? (int)$data["RESIT_$i"] : 0;
                                $course->{"RESIT_{$i}_DATE"} = $data["RESIT_{$i}_DATE"] ?? null;
                                $course->{"RESIT_{$i}_SCORE"} = $data["RESIT_{$i}_SCORE"] ?? null;
                                $course->{"RESIT_{$i}_STATUS"} = $data["RESIT_{$i}_STATUS"] ?? null;
                                $course->{"RESIT_{$i}_ENTRENAMIENTO"} = $data["RESIT_{$i}_ENTRENAMIENTO"] ?? null;
                                $course->{"RESIT_{$i}_FOLIO_PROYECTO"} = $data["RESIT_{$i}_FOLIO_PROYECTO"] ?? null;
                            }

                            $baseDir = 'app/admin/projects/' . $idProject . '/candidates/' . $candidateId;
                            $fullPath = storage_path($baseDir);

                            if (!file_exists($fullPath)) {
                                mkdir($fullPath, 0755, true);
                            }

                            if ($request->hasFile("courses.$candidateId.CERTIFICATE_PDF")) {
                                $file = $request->file("courses.$candidateId.CERTIFICATE_PDF");

                                if ($file->getClientOriginalExtension() !== 'pdf') {
                                    DB::rollBack();
                                    return response()->json(['code' => 0, 'msj' => "El certificado del candidato ID $candidateId debe ser PDF"]);
                                }
                                if ($file->getSize() > 10485760) { // 10MB
                                    DB::rollBack();
                                    return response()->json(['code' => 0, 'msj' => "El certificado del candidato ID $candidateId excede 10MB"]);
                                }

                                if ($course->CERTIFIED && file_exists(storage_path($course->CERTIFIED))) {
                                    @unlink(storage_path($course->CERTIFIED));
                                }

                                $fileName = uniqid() . '_cert_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                                $file->move($fullPath, $fileName);

                                $course->CERTIFIED = $baseDir . '/' . $fileName;
                                $course->HAVE_CERTIFIED = 1;
                            }

                            if ($request->hasFile("courses.$candidateId.REFRESH_EVIDENCE")) {
                                $fileRefresh = $request->file("courses.$candidateId.REFRESH_EVIDENCE");

                                if ($fileRefresh->getClientOriginalExtension() !== 'pdf') {
                                    DB::rollBack();
                                    return response()->json(['code' => 0, 'msj' => "La evidencia refresh del candidato ID $candidateId debe ser PDF"]);
                                }
                                if ($fileRefresh->getSize() > 10485760) {
                                    DB::rollBack();
                                    return response()->json(['code' => 0, 'msj' => "La evidencia refresh del candidato ID $candidateId excede 10MB"]);
                                }

                                if ($course->REFRESH_EVIDENCE && file_exists(storage_path($course->REFRESH_EVIDENCE))) {
                                    @unlink(storage_path($course->REFRESH_EVIDENCE));
                                }

                                $fileNameRefresh = uniqid() . '_ref_' . preg_replace('/\s+/', '_', $fileRefresh->getClientOriginalName());
                                $fileRefresh->move($fullPath, $fileNameRefresh);

                                $course->REFRESH_EVIDENCE = $baseDir . '/' . $fileNameRefresh;
                            }

                            $course->save();
                        }

                        DB::commit();
                        $response['code'] = 1;
                        $response['msj'] = 'Datos y documentos actualizados correctamente';
                        return response()->json($response);
                    } catch (\Exception $e) {
                        DB::rollBack();
                        return response()->json(['code' => 0, 'msj' => 'Error: ' . $e->getMessage()]);
                    }
                    break;
                case 3:
                    $data = $request->all();
                    foreach ($data['courses'] as $candidateId => $courseData) {
                        $courseData['ID_PROJECT'] = $data['ID_PROJECT'];
                        if (!isset($courseData['ACTIVO'])) {
                            $courseData['ACTIVO'] = 0;
                        }
                        $course = candidate::where('EMAIL_PROJECT', $courseData['EMAIL_PROJECT'])
                            ->where('ID_PROJECT', $data['ID_PROJECT'])
                            ->first();
                        if ($course) {
                            $course->update($courseData);
                        } else {
                            candidate::create($courseData);
                        }
                    }
                    $response['code'] = 1;
                    return response()->json($response);
                    break;
                case 4:
                    $id = $request->ID_CANDIDATE;
                    $candidate = candidate::find($id);
                    if ($candidate) {
                        $candidate->delete();
                        return response()->json(['code' => 1, 'message' => 'Candidato eliminado']);
                    } else {
                        return response()->json(['code' => 0, 'message' => 'Candidato no encontrado']);
                    }
                    break;
                case 5:
                    try {
                        $response = ['code' => 0, 'message' => ''];

                        if (!$request->hasFile('excel_file')) {
                            throw new \Exception('No se encontró archivo Excel');
                        }

                        $file = $request->file('excel_file');

                        $extension = $file->getClientOriginalExtension();
                        if (!in_array($extension, ['xlsx', 'xls'])) {
                            throw new \Exception('El archivo debe ser un Excel (.xlsx o .xls)');
                        }

                        $spreadsheet = IOFactory::load($file->getPathname());

                        $projectSheet = $spreadsheet->getSheet(0);
                        $projectRows = $projectSheet->toArray();

                        $studentSheet = $spreadsheet->getSheet(1);
                        $studentRows = $studentSheet->toArray();

                        $projectData = $this->processFormData($projectRows);


                        $studentsData = $this->processStudentsTable($studentRows);

                        if (empty($studentsData)) {
                            throw new \Exception('No se encontraron estudiantes en la segunda hoja. Verifique que haya datos después de la fila de ejemplos.');
                        }

                        $companies = $this->extractCompaniesFromStudents($studentsData);

                        if (empty($companies)) {
                            throw new \Exception('No se encontraron empresas en los datos de estudiantes. Verifique que la columna "Empresa" esté completada.');
                        }

                        $projectData['COMPANIES'] = $companies;

                        $companiesData = $this->organizeStudentsByCompany($projectData['COMPANIES'], $studentsData);

                        $projectData['COMPANIES_PROJECT'] = $companiesData;

                        $project = $this->saveProject($projectData, 0);

                        $projectData = $this->processStudentsAndUsers($projectData, $project->ID_PROJECT);

                        $project->update([
                            'COMPANIES_PROJECT' => $projectData['COMPANIES_PROJECT']
                        ]);

                        $response['code'] = 1;
                        $response['project'] = $project;
                        $response['message'] = count($studentsData) . ' estudiantes procesados correctamente de ' . count($companies) . ' empresas.';
                    } catch (\Exception $e) {
                        $response['message'] = 'Error: ' . $e->getMessage();
                    }

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

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('INFORMACIÓN DEL PROYECTO');


        $sheet->setCellValue('A1', 'PLANTILLA PARA CARGAR NUEVO PROYECTO');
        $sheet->mergeCells('A1:C1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(
            \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
        );
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

        $formData = [
            ['INFORMACIÓN GENERAL DEL PROYECTO', '', ''],
            ['CAMPO', 'VALOR', 'INSTRUCCIONES'],
            ['Tipo de curso= *', '1', '1=Abierto, 2=Cerrado'],
            ['Nombre del curso= *', '', '3="IWCF nivel 3 y 4", 4="IADC WellSharp nivel perforador"'],
            ['Folio= *', '', 'Ej: STE-TR24-001'],
            ['Centro de certificación= *', 'Smith Mason & Co', 'Nombre del centro certificador registrado'],
            ['Idioma= *', '2', '1=English, 2=Español, 3=Árabe, 4=Portuguese (Brazil)'],
            ['Ente acreditador= *', '', '1=IADC, 2=IWCF'],
            ['Tipo de operación= *', '1', '1=Drilling, 2=Completion, 3=Drilling & workover'],
            ['Niveles de acreditación= *', '1,2,3,4,5', 'IDs separados por coma (ej: 1,2,3,4,5).'],
            ['Tipos BOP= *', '1,2', 'IDs separados por coma (ej: 1,2). 1=Surface Only, 2=Surface and Subsea'],
            ['Número de centro= *', 'MX.1345', 'Número asignado al centro'],
            ['Nombre del contacto= *', 'Leonardo Cuellar Chala', 'Persona de contacto'],
            ['Teléfono de contacto= *', '9993578332', 'Número telefónico'],
            ['Ubicación= *', 'Salón Results', 'Dirección o lugar'],
            ['Ciudad= *', 'Villahermosa', 'Ciudad donde se imparte'],
            ['', '', ''],
            ['FECHAS Y HORARIOS', '', ''],
            ['CAMPO', 'VALOR', 'INSTRUCCIONES'],
            ['Fecha inicio curso= *', '2024-01-15', 'Formato: YYYY-MM-DD (ej: 2024-01-15)'],
            ['Fecha fin curso= *', '2024-01-15', 'Formato: YYYY-MM-DD (ej: 2024-01-20)'],
            ['Fecha examen práctico= *', '2024-01-15', 'Formato: YYYY-MM-DD (ej: 2024-01-18)'],
            ['Hora examen práctico= *', '14:00', 'Formato: HH:MM (ej: 14:30)'],
            ['Fecha examen teórico= *', '2024-01-15', 'Formato: YYYY-MM-DD (ej: 2024-01-19)'],
            ['Hora examen teórico= *', '13:00', 'Formato: HH:MM (ej: 10:00)'],
            ['Inicio membresía= *', '2024-01-15 00:00', 'Formato: YYYY-MM-DD HH:MM (ej: 2024-01-15 08:00)'],
            ['Fin membresía= *', '2024-01-15 11:59', 'Formato: YYYY-MM-DD HH:MM (ej: 2024-12-15 18:00)'],
            ['', '', ''],
            ['INFORMACIÓN DEL INSTRUCTOR', '', ''],
            ['CAMPO', 'VALOR', 'INSTRUCCIONES'],
            ['ID del instructor= *', '2', 'ID del instructor (consultar catálogo). 2="Rafael Suarez Loaiza"'],
            ['Email del instructor= *', 'rafael.suarez@rs-training-services.com', 'Correo electrónico del instructor'],
        ];

        $sheet->fromArray($formData, null, 'A2');

        $sheet->getStyle('A2:C2')->getFont()->setBold(true);
        $sheet->getStyle('A3:C3')->getFont()->setBold(true);
        $sheet->getStyle('A19:C19')->getFont()->setBold(true);
        $sheet->getStyle('A20:C20')->getFont()->setBold(true);
        $sheet->getStyle('A30:C30')->getFont()->setBold(true);
        $sheet->getStyle('A31:C31')->getFont()->setBold(true);

        $lastRow = count($formData) + 1;
        $sheet->getStyle('B3:B' . $lastRow)
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);



        $sheet->getStyle('A2:C17')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFE6F3FF');
        $sheet->getStyle('A19:C28')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('DAEEF3');
        $sheet->getStyle('A30:C33')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('B7DEE8');

        $sheet->getStyle('A2:C17')->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A19:C28')->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A30:C33')->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $sheet->mergeCells('A2:C2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(
            \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
        );
        $sheet->mergeCells('A19:C19');
        $sheet->getStyle('A19')->getAlignment()->setHorizontal(
            \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
        );
        $sheet->mergeCells('A30:C30');
        $sheet->getStyle('A30')->getAlignment()->setHorizontal(
            \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
        );

        foreach (range('A', 'C') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $sheet->getStyle('B:B')->getAlignment()->setHorizontal(
            \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT
        );

        $spreadsheet->createSheet();
        $studentSheet = $spreadsheet->getSheet(1);
        $studentSheet->setTitle('ESTUDIANTES');

        $studentHeaders = [
            ['ESTUDIANTES PARTICIPANTES', '', '', '', '', '', '', '', '', '', ''],
            ['* Campos obligatorios', '', '', '', '', '', '', '', '', '', ''],
            ['Empresa *', 'CR', 'Nombre *', 'Segundo Nombre', 'Apellidos *', 'Fecha Nacimiento', 'Número ID', 'Puesto', 'Email *'],
            ['Ej: Empresa ABC', 'Ej: CR001', 'Ej: Juan', 'Ej: Carlos', 'Ej: Pérez', 'YYYY-MM-DD', 'Ej: ABC123', 'Ej: Operador', 'ejemplo@email.com'],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
            ['', '', '', '', '', '', '', '', '', '', ''],
        ];
        $studentHeaderRow = 1;
        $studentSheet->fromArray($studentHeaders, null, 'A' . $studentHeaderRow);

        $studentSheet->getStyle('A' . $studentHeaderRow . ':A' . $studentHeaderRow)->getFont()->setBold(true)->setSize(14);
        $studentSheet->getStyle('A' . ($studentHeaderRow + 2) . ':I' . ($studentHeaderRow + 2))->getFont()->setBold(true);
        $studentSheet->getStyle('A' . ($studentHeaderRow + 3) . ':I' . ($studentHeaderRow + 3))->getFont()->setItalic(true);

        $studentSheet->getStyle('I3:I20')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $studentSheet->getStyle('F3:F20')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $studentSheet->getStyle('A' . ($studentHeaderRow + 2) . ':I' . ($studentHeaderRow + 2))->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFF0F8E6');


        foreach (range('A', 'I') as $column) {
            $studentSheet->getColumnDimension($column)->setAutoSize(true);
        }

        $spreadsheet->setActiveSheetIndex(0);
        $fileName = 'plantilla_proyecto.xlsx';
        $writer = new Xlsx($spreadsheet);
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function detailsProject($ID_PROJECT)
    {
        try {
            $proyect = Proyect::findOrFail($ID_PROJECT);

            $idiomaProject = null;
            if ($proyect->LANGUAGE_PROJECT) {
                $idiomaProject = IdiomasExamenes::find($proyect->LANGUAGE_PROJECT);
            }

            $NOMBRE_PROYECTO = __('N/A');
            if ($proyect->COURSE_NAME_ES_PROJECT) {
                $nombreCurso = NombreProyecto::find($proyect->COURSE_NAME_ES_PROJECT);
                $NOMBRE_PROYECTO = $nombreCurso->NOMBRE_PROYECTO ?? __('N/A');
            }

            $NOMBRE_INSTRUCTOR = __('N/A');
            $instructores = $proyect->INSTRUCTOR_ID_PROJECT; 

            if (!empty($instructores) && is_array($instructores)) {
                $nombres = [];

                foreach ($instructores as $idInstructor) {
                    $instructor = Instructor::find($idInstructor);

                    if ($instructor) {
                        $nombreCompleto = trim(
                            ($instructor->FNAME_INSTRUCTOR ?? '') . ' ' .
                                ($instructor->MDNAME_INSTRUCTOR ?? '') . ' ' .
                                ($instructor->LSNAME_INSTRUCTOR ?? '')
                        );

                        if (!empty($nombreCompleto)) {
                            $nombres[] = $nombreCompleto;
                        }
                    }
                }

                if (!empty($nombres)) {
                    $NOMBRE_INSTRUCTOR = implode(', ', $nombres);
                }
            }

            $nombreEnte = __('N/A');
            $idEnte = $proyect->ACCREDITING_ENTITY_PROJECT;
            if ($idEnte) {
                $enteAcreditador = EnteAcreditador::find($idEnte);
                $nombreEnte = $enteAcreditador->NOMBRE_ENTE ?? __('N/A');
            }

            $centroCertificacion = null;
            if ($proyect->CERTIFICATION_CENTER_PROJECT) {
                $centroCertificacion = CentrosCapacitacion::find($proyect->CERTIFICATION_CENTER_PROJECT);
            }

            $tipoOperacion = null;
            if ($proyect->OPERATION_TYPE_PROJECT) {
                $tipoOperacion = Operacion::find($proyect->OPERATION_TYPE_PROJECT);
            }

            $nivelesAcreditacion = collect();
            $idsNiveles = $proyect->ACCREDITATION_LEVELS_PROJECT ?? [];

            if (!empty($idsNiveles) && is_array($idsNiveles)) {
                $niveles = NivelAcreditacion::whereIn('ID_CATALOGO_NIVELACREDITACION', $idsNiveles)->get();

                $nivelesAcreditacion = $niveles->map(function ($nivel) use ($idEnte) {
                    if ($idEnte == 1) {
                        return $nivel->NOMBRE_NIVEL ?? 'N/A';
                    } elseif ($idEnte == 2) {
                        return $nivel->NOMBRE_NIVEL ?? 'N/A';
                    } else {
                        return $nivel->NOMBRE_NIVEL ?? $nivel->NOMBRE_NIVEL ?? 'N/A';
                    }
                });
            }

            $tiposBop = collect();
            $idsBops = $proyect->BOP_TYPES_PROJECT ?? [];

            if (!empty($idsBops) && is_array($idsBops)) {
                $tiposBop = TipoBOP::whereIn('ID_CATALOGO_TIPOBOP', $idsBops)
                    ->pluck('DESCRIPCION_TIPOBOP');
            }

            $cursosStats = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->select(
                    'co.FINAL_STATUS',
                    'co.STATUS',
                    'co.HAVE_CERTIFIED',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('co.FINAL_STATUS', 'co.STATUS', 'co.HAVE_CERTIFIED')
                ->get();

            $totalEstudiantes = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->count();

            $estudiantesAprobados = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('co.FINAL_STATUS', 'Pass')
                ->count();

            $estudiantesReprobados = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('co.FINAL_STATUS', 'Unpass')
                ->count();

            $estudiantesPendientes = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('c.ASISTENCIA', '=', '0')
                ->count();

            $certificadosEmitidos = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('co.HAVE_CERTIFIED', '1')
                ->count();

            $certificadosPendientes = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('co.FINAL_STATUS', 'Pass')
                ->where(function ($query) {
                    $query->where('co.HAVE_CERTIFIED', '!=', '1')
                        ->orWhereNull('co.HAVE_CERTIFIED');
                })
                ->count();

            $promediosPorModulo = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->select(
                    DB::raw('AVG(CAST(co.PRACTICAL as DECIMAL(5,2))) as promedio_practico'),
                    DB::raw('AVG(CAST(co.EQUIPAMENT as DECIMAL(5,2))) as promedio_equipos'),
                    DB::raw('AVG(CAST(co.PYP as DECIMAL(5,2))) as promedio_pyp')
                )
                ->first();

            $estudiantesConResit = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('co.RESIT', '1')
                ->count();

            $resitInmediatos = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('co.RESIT_INMEDIATO', '1')
                ->count();

            $resitProgramados = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->where('co.RESIT_PROGRAMADO', '1')
                ->count();


            $centroCertificacion = null;
            $centroPrimario = null;

            if ($proyect->CERTIFICATION_CENTER_PROJECT) {

                $centro = CentrosCapacitacion::find($proyect->CERTIFICATION_CENTER_PROJECT);

                if ($centro) {
                    if ($centro->TIPO_CENTRO == 1 && $centro->ASOCIADO_CENTRO) {
                        $centroCertificacion = $centro;
                        $centroPrimario = CentrosCapacitacion::find($centro->ASOCIADO_CENTRO);
                    } else {

                        $centroPrimario = $centro;
                        $centroCertificacion = null;
                    }
                }
            }


            return view('Admin.content.Admin.projects.details', compact(
                'proyect',
                'ID_PROJECT',
                'idiomaProject',
                'NOMBRE_PROYECTO',
                'NOMBRE_INSTRUCTOR',
                'nombreEnte',
                'centroCertificacion',
                'centroPrimario',
                'tipoOperacion',
                'nivelesAcreditacion',
                'tiposBop',
                'totalEstudiantes',
                'estudiantesAprobados',
                'estudiantesReprobados',
                'estudiantesPendientes',
                'certificadosEmitidos',
                'certificadosPendientes',
                'promediosPorModulo',
                'estudiantesConResit',
                'resitInmediatos',
                'resitProgramados'
            ));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar los detalles del proyecto: ' . $e->getMessage());
        }
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

            $candidatos = DB::table('candidate as c')
                ->leftJoin('courses as co', function ($join) use ($id) {
                    $join->on('c.ID_CANDIDATE', '=', 'co.ID_CANDIDATE')
                        ->where('co.ID_PROJECT', '=', $id);
                })
                ->select(
                    'c.ID_CANDIDATE',
                    'c.FIRST_NAME_PROJECT',
                    'c.MIDDLE_NAME_PROJECT',
                    'c.LAST_NAME_PROJECT',
                    'c.EMAIL_PROJECT',
                    'c.PASSWORD_PROJECT',
                    'c.COMPANY_PROJECT',
                    'c.ASISTENCIA',
                    'c.LEVEL',
                    'co.ID_COURSE',
                    'co.PRACTICAL',
                    'co.PRACTICAL_PASS',
                    'co.EQUIPAMENT',
                    'co.EQUIPAMENT_PASS',
                    'co.PYP',
                    'co.PYP_PASS',
                    'co.STATUS',
                    'co.RESIT',
                    'co.INTENTOS',
                    'co.RESIT_MODULE',
                    'co.RESIT_INMEDIATO',
                    'co.RESIT_INMEDIATO_DATE',
                    'co.RESIT_INMEDIATO_SCORE',
                    'co.RESIT_INMEDIATO_STATUS',
                    'co.RESIT_PROGRAMADO',
                    'co.RESIT_ENTRENAMIENTO',
                    'co.RESIT_FOLIO_PROYECTO',
                    'co.RESIT_PROGRAMADO_DATE',
                    'co.RESIT_PROGRAMADO_SCORE',
                    'co.RESIT_PROGRAMADO_STATUS',
                    'co.FINAL_STATUS',
                    'co.HAVE_CERTIFIED',
                    'co.EXPIRATION'
                )
                ->where('c.ID_PROJECT', $id)
                ->orderBy('c.LAST_NAME_PROJECT', 'asc')
                ->get();

            $estudiantes = [];

            foreach ($candidatos as $candidato) {
                $practicalDisplay = '';
                if ($candidato->PRACTICAL !== null) {
                    $practicalStatus = $candidato->PRACTICAL_PASS === 'Pass' ? 'Aprobado' : ($candidato->PRACTICAL_PASS === 'Unpass' ? 'No Aprobado' : '');
                    $practicalDisplay = $candidato->PRACTICAL . '% ' . $practicalStatus;
                }

                $equipamentDisplay = '';
                if ($candidato->EQUIPAMENT !== null) {
                    $equipamentStatus = $candidato->EQUIPAMENT_PASS === 'Pass' ? 'Aprobado' : ($candidato->EQUIPAMENT_PASS === 'Unpass' ? 'No Aprobado' : '');
                    $equipamentDisplay = $candidato->EQUIPAMENT . '% ' . $equipamentStatus;
                }

                $pypDisplay = '';
                if ($candidato->PYP !== null) {
                    $pypStatus = $candidato->PYP_PASS === 'Pass' ? 'Aprobado' : ($candidato->PYP_PASS === 'Unpass' ? 'No Aprobado' : '');
                    $pypDisplay = $candidato->PYP . '% ' . $pypStatus;
                }

                $statusDisplay = '';
                if ($candidato->STATUS) {
                    switch ($candidato->STATUS) {
                        case 'Pending':
                            $statusDisplay = 'Pendiente';
                            break;
                        case 'In Progress':
                            $statusDisplay = 'En Progreso';
                            break;
                        case 'Completed':
                            $statusDisplay = 'Completado';
                            break;
                        case 'Failed':
                            $statusDisplay = 'Fallido';
                            break;
                        default:
                            $statusDisplay = $candidato->STATUS;
                    }
                }

                $resitDisplay = '';
                if ($candidato->RESIT !== null) {
                    $resitDisplay = ($candidato->RESIT == 1 || $candidato->RESIT === 'Yes') ? 'Sí' : 'No';
                }

                $resitInmediatoDisplay = '';
                if ($candidato->RESIT_INMEDIATO_SCORE !== null) {
                    $resitInmediatoStatus = $candidato->RESIT_INMEDIATO_STATUS === 'Pass' ? 'Aprobado' : ($candidato->RESIT_INMEDIATO_STATUS === 'Unpass' ? 'No Aprobado' : '');
                    $resitInmediatoDisplay = $candidato->RESIT_INMEDIATO_SCORE . '% ' . $resitInmediatoStatus;
                }

                $resitProgramadoDisplay = '';
                if ($candidato->RESIT_PROGRAMADO_SCORE !== null) {
                    $resitProgramadoStatus = $candidato->RESIT_PROGRAMADO_STATUS === 'Pass' ? 'Aprobado' : ($candidato->RESIT_PROGRAMADO_STATUS === 'Unpass' ? 'No Aprobado' : '');
                    $resitProgramadoDisplay = $candidato->RESIT_PROGRAMADO_SCORE . '% ' . $resitProgramadoStatus;
                }

                $finalStatusDisplay = '';
                if ($candidato->FINAL_STATUS) {
                    $finalStatusDisplay = $candidato->FINAL_STATUS === 'Pass' ? 'Aprobado' : ($candidato->FINAL_STATUS === 'Unpass' ? 'No Aprobado' : $candidato->FINAL_STATUS);
                }

                $certifiedDisplay = '';
                if ($candidato->HAVE_CERTIFIED !== null) {
                    $certifiedDisplay = ($candidato->HAVE_CERTIFIED == 1 || $candidato->HAVE_CERTIFIED === 'Yes') ? 'Sí' : 'No';
                }

                $expirationDisplay = $candidato->EXPIRATION ? date('d/m/Y', strtotime($candidato->EXPIRATION)) : '';
                $resitInmediatoDateDisplay = $candidato->RESIT_INMEDIATO_DATE ? date('d/m/Y', strtotime($candidato->RESIT_INMEDIATO_DATE)) : '';
                $resitProgramadoDateDisplay = $candidato->RESIT_PROGRAMADO_DATE ? date('d/m/Y', strtotime($candidato->RESIT_PROGRAMADO_DATE)) : '';

                $estudiantes[] = [
                    'ID_CANDIDATE' => $candidato->ID_CANDIDATE,
                    'ID_COURSE' => $candidato->ID_COURSE,
                    'ASISTENCIA' => $candidato->ASISTENCIA,
                    'LEVEL' => $candidato->LEVEL,
                    'NOMBRE_COMPLETO' => trim($candidato->FIRST_NAME_PROJECT . ' ' . $candidato->MIDDLE_NAME_PROJECT . ' ' . $candidato->LAST_NAME_PROJECT),
                    'NIVEL' => $niveles,
                    'BOP'   => $bops,
                    'UNITS' => '',
                    'LANG'  => $lang,
                    'PRACTICAL' => $practicalDisplay,
                    'EQUIPAMENT' => $equipamentDisplay,
                    'P&P' => $pypDisplay,
                    'STATUS' => $statusDisplay,
                    'RESIT' => $resitDisplay,
                    'INTENTOS' => $candidato->INTENTOS ?? '',
                    'RESIT_MODULE' => $candidato->RESIT_MODULE ?? '',
                    'RESIT_INMEDIATO' => ($candidato->RESIT_INMEDIATO == 1 || $candidato->RESIT_INMEDIATO === 'Yes') ? 'Sí' : ($candidato->RESIT_INMEDIATO === 0 || $candidato->RESIT_INMEDIATO === 'No' ? 'No' : ''),
                    'RESIT_INMEDIATO_DATE' => $resitInmediatoDateDisplay,
                    'RESIT_INMEDIATO_SCORE' => $resitInmediatoDisplay,
                    'RESIT_PROGRAMADO' => ($candidato->RESIT_PROGRAMADO == 1 || $candidato->RESIT_PROGRAMADO === 'Yes') ? 'Sí' : ($candidato->RESIT_PROGRAMADO === 0 || $candidato->RESIT_PROGRAMADO === 'No' ? 'No' : ''),
                    'RESIT_ENTRENAMIENTO' => $candidato->RESIT_ENTRENAMIENTO == 1 ? 'Sí' : ($candidato->RESIT_ENTRENAMIENTO === 0 ? 'No' : ''),
                    'RESIT_FOLIO_PROYECTO' => $candidato->RESIT_FOLIO_PROYECTO ?? '',
                    'RESIT_PROGRAMADO_DATE' => $resitProgramadoDateDisplay,
                    'RESIT_PROGRAMADO_SCORE' => $resitProgramadoDisplay,
                    'FINAL_STATUS' => $finalStatusDisplay,
                    'HAVE_CERTIFIED' => $certifiedDisplay,
                    'EXPIRATION' => $expirationDisplay,
                    'CORREO' => $candidato->EMAIL_PROJECT,
                    'BTN_ENVIAR' => '<button type="button"
                                    class="btn btn-sm btn-icon btn-action1 SENDCORREO"
                                    title="Enviar correo"
                                    onclick="enviarCredencialesCorreo(' . htmlspecialchars(json_encode([
                        'nombre' => trim($candidato->FIRST_NAME_PROJECT . ' ' . $candidato->MIDDLE_NAME_PROJECT . ' ' . $candidato->LAST_NAME_PROJECT),
                        'email' => $candidato->EMAIL_PROJECT,
                        'password' => $candidato->PASSWORD_PROJECT,
                        'fechaInicio' => $proyecto->MEMBERSHIP_START_PROJECT,
                        'fechaFin' => $proyecto->MEMBERSHIP_END_PROJECT,
                    ]), ENT_QUOTES, 'UTF-8') . ')">
                                    <i class="ri-mail-send-line" style="font-size: 1.2rem;"></i> Enviar acceso
                                </button>',
                    'BTN_EDITAR' => '<button type="button"
                                    class="btn btn-sm btn-icon btn-action1 SENDCORREO"
                                    title="Editar"
                                    onclick="editarEstudiante(' . htmlspecialchars(json_encode([
                        'id' => $candidato->ID_CANDIDATE,
                        'nombre' => trim($candidato->FIRST_NAME_PROJECT . ' ' . $candidato->MIDDLE_NAME_PROJECT . ' ' . $candidato->LAST_NAME_PROJECT),
                        'email' => $candidato->EMAIL_PROJECT,
                        'empresa' => $candidato->COMPANY_PROJECT,
                    ]), ENT_QUOTES, 'UTF-8') . ')">
                                    Editar
                                </button>'
                ];
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
            $proyecto = Proyect::find($id);

            if (!$proyecto) {
                return response()->json([
                    'msj' => 'Proyecto no encontrado',
                    'data' => []
                ]);
            }

            $fechaFinMembresia = $proyecto->MEMBERSHIP_END_PROJECT;
            $membresiaVigente = false;

            if ($fechaFinMembresia) {
                $membresiaVigente = Carbon::parse($fechaFinMembresia)->isFuture();
            }

            $candidatos = candidate::where('ID_PROJECT', $id)->get();

            $estudiantes = [];

            foreach ($candidatos as $candidato) {
                $estudiantes[] = [
                    'EMPRESA' => $candidato->COMPANY_PROJECT,
                    'CR' => $candidato->CR_PROJECT,
                    'LASTNAME' => $candidato->LAST_NAME_PROJECT,
                    'FIRSTNAME' => $candidato->FIRST_NAME_PROJECT,
                    'MIDDLENAME' => $candidato->MIDDLE_NAME_PROJECT,
                    'DOB' => $candidato->DOB_PROJECT,
                    'ID_NUMBER' => $candidato->ID_NUMBER_PROJECT,
                    'CARGO' => $candidato->POSITION_PROJECT,
                    'EMAIL' => $candidato->EMAIL_PROJECT,
                    'PASSWORD' => $candidato->PASSWORD_PROJECT,
                    'ACTIVO' => $membresiaVigente ? 1 : 0,
                    'BTN_EDITAR' => '<button type="button"
                                        class="btn btn-sm btn-icon btn-action1 SENDCORREO"
                                        title="Enviar correo"
                                        onclick="enviarCredencialesCorreo(' . htmlspecialchars(json_encode([
                        'nombre' => $candidato->FIRST_NAME_PROJECT . ' ' . $candidato->MIDDLE_NAME_PROJECT . ' ' . $candidato->LAST_NAME_PROJECT,
                        'email' => $candidato->EMAIL_PROJECT,
                        'password' => $candidato->PASSWORD_PROJECT,
                        'fechaInicio' => $proyecto->MEMBERSHIP_START_PROJECT,
                        'fechaFin' => $proyecto->MEMBERSHIP_END_PROJECT,
                    ]), ENT_QUOTES, 'UTF-8') . ')">
                                        <i class="ri-mail-send-line" style="font-size: 1.2rem;"></i> Enviar acceso
                                    </button>'
                ];
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
        $proyecto = Proyect::find($ID_PROJECT);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
        $fechaFinMembresia = $proyecto->MEMBERSHIP_END_PROJECT;
        $membresiaVigente = false;

        if ($fechaFinMembresia) {
            $membresiaVigente = Carbon::parse($fechaFinMembresia)->isFuture();
        }
        $candidatos = candidate::where('ID_PROJECT', $ID_PROJECT)->get();
        $candidatos->transform(function ($candidato) use ($membresiaVigente) {
            $candidato->ACTIVO = $membresiaVigente ? 1 : 0;
            return $candidato;
        });
        return response()->json($candidatos);
    }



    public function editarTablaCurso($ID_PROJECT)
    {
        try {
            $proyecto = Proyect::find($ID_PROJECT);

            if (!$proyecto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }


            $estudiantes = DB::table('candidate as c')
                ->leftJoin('course as co', function ($join) use ($ID_PROJECT) {
                    $join->on('c.ID_CANDIDATE', '=', 'co.ID_CANDIDATE')
                        ->where('co.ID_PROJECT', '=', $ID_PROJECT);
                })
                ->select(
                    // --- CANDIDATO ---
                    'c.ID_CANDIDATE',
                    'c.ID_PROJECT',
                    'c.LAST_NAME_PROJECT',
                    'c.FIRST_NAME_PROJECT',
                    'c.MIDDLE_NAME_PROJECT',
                    'c.EMAIL_PROJECT',
                    'c.ASISTENCIA', // Global
                    'c.ACTIVO',

                    // --- CURSO GENERAL ---
                    'co.ID_COURSE as curso_id',
                    'co.PRACTICAL',
                    'co.PRACTICAL_PASS',
                    'co.EQUIPAMENT',
                    'co.EQUIPAMENT_PASS',
                    'co.PYP',
                    'co.PYP_PASS',
                    'co.STATUS',

                    // --- COMPLEMENTOS (Nuevos) ---
                    'co.CO',
                    'co.WORKOVER',
                    'co.WO_STATUS',
                    'co.SUBSEA',
                    'co.SUBSEA_STATUS',
                    'co.D1',
                    'co.D1_STATUS',
                    'co.D2',
                    'co.D2_STATUS',
                    'co.D3',
                    'co.D3_STATUS',

                    // --- RESIT GENERAL ---
                    'co.RESIT',
                    'co.INTENTOS',
                    'co.RESIT_MODULE',

                    // --- RESIT INMEDIATO ---
                    'co.RESIT_INMEDIATO',
                    'co.RESIT_INMEDIATO_DATE',
                    'co.RESIT_INMEDIATO_SCORE',
                    'co.RESIT_INMEDIATO_STATUS',

                    // --- RESIT PROGRAMADO (Original/Singular) ---
                    'co.RESIT_PROGRAMADO',
                    'co.RESIT_ENTRENAMIENTO',
                    'co.RESIT_FOLIO_PROYECTO',
                    'co.RESIT_PROGRAMADO_DATE',
                    'co.RESIT_PROGRAMADO_SCORE',
                    'co.RESIT_PROGRAMADO_STATUS',

                    // --- RESIT 1 (Nuevos) ---
                    'co.RESIT_1',
                    'co.RESIT_1_ENTRENAMIENTO',
                    'co.RESIT_1_FOLIO_PROYECTO',
                    'co.RESIT_1_DATE',
                    'co.RESIT_1_SCORE',
                    'co.RESIT_1_STATUS',

                    // --- RESIT 2 (Nuevos) ---
                    'co.RESIT_2',
                    'co.RESIT_2_ENTRENAMIENTO',
                    'co.RESIT_2_FOLIO_PROYECTO',
                    'co.RESIT_2_DATE',
                    'co.RESIT_2_SCORE',
                    'co.RESIT_2_STATUS',

                    // --- RESIT 3 (Nuevos) ---
                    'co.RESIT_3',
                    'co.RESIT_3_ENTRENAMIENTO',
                    'co.RESIT_3_FOLIO_PROYECTO',
                    'co.RESIT_3_DATE',
                    'co.RESIT_3_SCORE',
                    'co.RESIT_3_STATUS',

                    // --- REFRESH (Nuevos) ---
                    'co.REFRESH',
                    'co.REFRESH_DATE',
                    'co.REFRESH_EVIDENCE',

                    // --- CERTIFICACIÓN ---
                    'co.FINAL_STATUS',
                    'co.HAVE_CERTIFIED',
                    'co.CERTIFIED',
                    'co.CERTIFICATE_NUMBER', // Nuevo
                    'co.EXPIRATION',
                    'co.LEVEL',

                    // --- EXTRAS ---
                    'co.ENABLE_NOTIFICATIONS', // Nuevo
                    'co.EMAILS_SENT',         // Nuevo
                )
                ->where('c.ID_PROJECT', $ID_PROJECT)
                ->orderBy('c.LAST_NAME_PROJECT', 'asc')
                ->get();

            $estudiantesFormateados = [];
            $existenCursos = false;

            foreach ($estudiantes as $estudiante) {
                if ($estudiante->curso_id !== null) {
                    $existenCursos = true;
                }

                $estudiantesFormateados[] = [
                    'curso_id' => $estudiante->curso_id,
                    'candidato' => [
                        'ID_CANDIDATE' => $estudiante->ID_CANDIDATE,
                        'LAST_NAME_PROJECT' => $estudiante->LAST_NAME_PROJECT,
                        'FIRST_NAME_PROJECT' => $estudiante->FIRST_NAME_PROJECT,
                        'MIDDLE_NAME_PROJECT' => $estudiante->MIDDLE_NAME_PROJECT,
                        'EMAIL_PROJECT' => $estudiante->EMAIL_PROJECT,
                        'ACTIVO' => $estudiante->ACTIVO,
                        'LEVEL' => $estudiante->LEVEL,
                        'ASISTENCIA' => $estudiante->ASISTENCIA // Global del candidato
                    ],
                    'datos_curso' => [
                        // --- CALIFICACIONES PRINCIPALES ---
                        'PRACTICAL' => $estudiante->PRACTICAL,
                        'PRACTICAL_PASS' => $estudiante->PRACTICAL_PASS,
                        'EQUIPAMENT' => $estudiante->EQUIPAMENT,
                        'EQUIPAMENT_PASS' => $estudiante->EQUIPAMENT_PASS,
                        'PYP' => $estudiante->PYP,
                        'PYP_PASS' => $estudiante->PYP_PASS,
                        'STATUS' => $estudiante->STATUS,

                        // --- COMPLEMENTOS ---
                        'CO' => $estudiante->CO,
                        'WORKOVER' => $estudiante->WORKOVER,
                        'WO_STATUS' => $estudiante->WO_STATUS,
                        'SUBSEA' => $estudiante->SUBSEA,
                        'SUBSEA_STATUS' => $estudiante->SUBSEA_STATUS,
                        'D1' => $estudiante->D1,
                        'D1_STATUS' => $estudiante->D1_STATUS,
                        'D2' => $estudiante->D2,
                        'D2_STATUS' => $estudiante->D2_STATUS,
                        'D3' => $estudiante->D3,
                        'D3_STATUS' => $estudiante->D3_STATUS,

                        // --- RESIT GENERAL ---
                        'RESIT' => $estudiante->RESIT,
                        'INTENTOS' => $estudiante->INTENTOS,
                        'RESIT_MODULE' => $estudiante->RESIT_MODULE,

                        // --- RESIT INMEDIATO ---
                        'RESIT_INMEDIATO' => $estudiante->RESIT_INMEDIATO,
                        'RESIT_INMEDIATO_DATE' => $estudiante->RESIT_INMEDIATO_DATE,
                        'RESIT_INMEDIATO_SCORE' => $estudiante->RESIT_INMEDIATO_SCORE,
                        'RESIT_INMEDIATO_STATUS' => $estudiante->RESIT_INMEDIATO_STATUS,

                        // --- RESIT PROGRAMADO (Original) ---
                        'RESIT_PROGRAMADO' => $estudiante->RESIT_PROGRAMADO,
                        'RESIT_ENTRENAMIENTO' => $estudiante->RESIT_ENTRENAMIENTO,
                        'RESIT_FOLIO_PROYECTO' => $estudiante->RESIT_FOLIO_PROYECTO,
                        'RESIT_PROGRAMADO_DATE' => $estudiante->RESIT_PROGRAMADO_DATE,
                        'RESIT_PROGRAMADO_SCORE' => $estudiante->RESIT_PROGRAMADO_SCORE,
                        'RESIT_PROGRAMADO_STATUS' => $estudiante->RESIT_PROGRAMADO_STATUS,

                        // --- RESIT 1 ---
                        'RESIT_1' => $estudiante->RESIT_1,
                        'RESIT_1_ENTRENAMIENTO' => $estudiante->RESIT_1_ENTRENAMIENTO,
                        'RESIT_1_FOLIO_PROYECTO' => $estudiante->RESIT_1_FOLIO_PROYECTO,
                        'RESIT_1_DATE' => $estudiante->RESIT_1_DATE,
                        'RESIT_1_SCORE' => $estudiante->RESIT_1_SCORE,
                        'RESIT_1_STATUS' => $estudiante->RESIT_1_STATUS,

                        // --- RESIT 2 ---
                        'RESIT_2' => $estudiante->RESIT_2,
                        'RESIT_2_ENTRENAMIENTO' => $estudiante->RESIT_2_ENTRENAMIENTO,
                        'RESIT_2_FOLIO_PROYECTO' => $estudiante->RESIT_2_FOLIO_PROYECTO,
                        'RESIT_2_DATE' => $estudiante->RESIT_2_DATE,
                        'RESIT_2_SCORE' => $estudiante->RESIT_2_SCORE,
                        'RESIT_2_STATUS' => $estudiante->RESIT_2_STATUS,

                        // --- RESIT 3 ---
                        'RESIT_3' => $estudiante->RESIT_3,
                        'RESIT_3_ENTRENAMIENTO' => $estudiante->RESIT_3_ENTRENAMIENTO,
                        'RESIT_3_FOLIO_PROYECTO' => $estudiante->RESIT_3_FOLIO_PROYECTO,
                        'RESIT_3_DATE' => $estudiante->RESIT_3_DATE,
                        'RESIT_3_SCORE' => $estudiante->RESIT_3_SCORE,
                        'RESIT_3_STATUS' => $estudiante->RESIT_3_STATUS,

                        // --- FINAL Y CERTIFICACIÓN ---
                        'FINAL_STATUS' => $estudiante->FINAL_STATUS,
                        'HAVE_CERTIFIED' => $estudiante->HAVE_CERTIFIED,
                        'CERTIFIED' => $estudiante->CERTIFIED,
                        'CERTIFICATE_NUMBER' => $estudiante->CERTIFICATE_NUMBER,
                        'EXPIRATION' => $estudiante->EXPIRATION,

                        // --- REFRESH ---
                        'REFRESH' => $estudiante->REFRESH,
                        'REFRESH_DATE' => $estudiante->REFRESH_DATE,
                        'REFRESH_EVIDENCE' => $estudiante->REFRESH_EVIDENCE,

                        // --- EXTRAS ---
                        'ENABLE_NOTIFICATIONS' => $estudiante->ENABLE_NOTIFICATIONS,
                        'EMAILS_SENT' => $estudiante->EMAILS_SENT,
                    ]
                ];
            }
            $startDate = Carbon::parse($proyecto->COURSE_END_DATE_PROJECT);

            $daysRest = 0;

            if ($proyecto->ACCREDITING_ENTITY_PROJECT === "1") { //IADC
                $daysRest = 45;
            } else if ($proyecto->ACCREDITING_ENTITY_PROJECT === "2") { //IWCF
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
            $ID_CATALOGO_PROGRAMA = $proyecto->PROGRAM_PROJECT ?? 0;

            $programa = null;
            $complementos = null;
            $resitInmediato = null;
            $resitPermitidas = null;
            $refreshVal = null;
            $periodoResit = null;
            if ($ID_CATALOGO_PROGRAMA != 0) {
                $programa = Programas::find($ID_CATALOGO_PROGRAMA);
                $complementos = $programa->COMPLEMENTS_PROGRAM;
                $resitInmediato = $programa->OPCION_RESIT;
                $resitPermitidas = $programa->OPCION_RESIT_PERMITIDAS;
                $refreshVal = $programa->OPCION_REFRESH;
                $periodoResit = $programa->PERIODO_RESIT;
            }

            $proyectoData = [
                'LANGUAGE_PROJECT' => $this->getLanguajes($proyecto->LANGUAGE_PROJECT),
                'ACCREDITING_ENTITY_PROJECT' => $proyecto->ACCREDITING_ENTITY_PROJECT,
                'ACCREDITATION_LEVELS_PROJECT' => $this->getNivelesAcreditacion($proyecto->ACCREDITATION_LEVELS_PROJECT),
                'BOP_TYPES_PROJECT' => $this->getTiposBOP($proyecto->BOP_TYPES_PROJECT),
                'COURSE_END_DATE_90' => $formattedEndDate,
                'EXAM_DATE_PROJECT' => $proyecto->EXAM_DATE_PROJECT,
                'DAYS_REST' => $daysRest . ' días',
                'PROGRAMA' => $programa,
                'RESIT_INMEDIATO' => $resitInmediato,
                'RESIT_PERMITIDAS' => $resitPermitidas,
                'REFRESH' => $refreshVal,
                'PERIODO_RESIT' => $periodoResit,
                'COMPLEMENTOS' => $complementos,
                'PROGRAM_PROJECT' => $proyecto->PROGRAM_PROJECT,
                'DAYS_REMAINING' => $remainingDays
            ];

            return response()->json([
                'success' => true,
                'proyecto' => $proyectoData,
                'estudiantes' => $estudiantesFormateados,
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

        $sheet->setCellValue('A1', 'COURSE/CURSO TITLE');
        $sheet->mergeCells('A1:R1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFD9D9D9');
        $sheet->setCellValue('A2', 'Registered Certification Centre Name:');
        $sheet->setCellValue('B2', 'smith mason and co');
        $sheet->mergeCells('B2:F2');
        $sheet->setCellValue('G2', 'Center Number:');
        $sheet->setCellValue('H2', '2321312');
        $sheet->setCellValue('I2', 'Tipo curso:');
        $sheet->setCellValue('J2', 'abierto');
        $sheet->setCellValue('K2', 'Folio:');
        $sheet->setCellValue('L2', 'STE-TR-013');
        $sheet->setCellValue('A3', 'Test venue address:');
        $sheet->setCellValue('B3', 'Calle Carmen Cadena de Buendia No. 128 Col. Nueva Villahermosa, CP 86070, Villahermosa');
        $sheet->mergeCells('B3:R3');
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
        $sheet->setCellValue('A6', 'Contact:');
        $sheet->setCellValue('B6', 'Leonardo Cuellar Chala');
        $sheet->mergeCells('B6:F6');
        $sheet->setCellValue('G6', 'Tel:');
        $sheet->setCellValue('H6', '+52 99299292');
        $sheet->mergeCells('H6:R6');

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

        $sheet->mergeCells('B8:B9');  // Family o last name
        $sheet->mergeCells('C8:C9');  // First name
        $sheet->mergeCells('D8:D9');  // md name
        $sheet->mergeCells('E8:E9');  // Level/Nivel
        $sheet->mergeCells('F8:F9');  // BOP
        $sheet->mergeCells('G8:G9');  // Units
        $sheet->mergeCells('H8:H9');  // Language
        $sheet->mergeCells('R8:R9');  // Correo

        $sheet->setCellValue('A9', 'Candidate/Candidato');


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

            $rowNumber++;
            $sheet->setCellValue('I' . $rowNumber, $estudiante['modulo_equipo']);
            $sheet->setCellValue('J' . $rowNumber, $estudiante['score_equipo'] . '%');
            $sheet->setCellValue('K' . $rowNumber, $estudiante['status_equipo']);
            $sheet->setCellValue('M' . $rowNumber, 'P&P');

            $rowNumber++;
            $sheet->setCellValue('I' . $rowNumber, $estudiante['modulo_p2p']);
            $sheet->setCellValue('J' . $rowNumber, $estudiante['score_p2p'] . '%');
            $sheet->setCellValue('K' . $rowNumber, $estudiante['status_p2p']);

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

            $colorFondo = 'FFFFFFFF';

            $allPassed = ($estudiante['status_practico'] === 'Pass' &&
                $estudiante['status_equipo'] === 'Pass' &&
                $estudiante['status_p2p'] === 'Pass');
            $anyUnpass = ($estudiante['status_practico'] === 'Unpass' ||
                $estudiante['status_equipo'] === 'Unpass' ||
                $estudiante['status_p2p'] === 'Unpass');

            if ($allPassed) {
                $colorFondo = 'FFC6EFCE';
            } elseif ($anyUnpass) {
                $colorFondo = 'FFFFC7CE';
            }

            $sheet->getStyle('A' . $startRow . ':R' . $endRow)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB($colorFondo);

            $sheet->getStyle('A' . $startRow . ':R' . $endRow)->getBorders()
                ->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('A' . $startRow . ':R' . $endRow)->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $rowNumber++;
        }

        $sheet->getStyle('A2:R6')->getBorders()
            ->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $labelCells = ['A2', 'G2', 'I2', 'K2', 'A3', 'A5', 'D5', 'F5', 'J5', 'A6', 'G6'];
        foreach ($labelCells as $cell) {
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }

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
    private function processFormData($projectRows)
    {
        $projectData = [];

        $fieldMap = [
            'Tipo de curso= *' => 'COURSE_TYPE_PROJECT',
            'Nombre del curso= *' => 'COURSE_NAME_ES_PROJECT',
            'Folio= *' => 'FOLIO_PROJECT',
            'Centro de certificación= *' => 'CERTIFICATION_CENTER_PROJECT',
            'Idioma= *' => 'LANGUAGE_PROJECT',
            'Ente acreditador= *' => 'ACCREDITING_ENTITY_PROJECT',
            'Tipo de operación= *' => 'OPERATION_TYPE_PROJECT',
            'Niveles de acreditación= *' => 'ACCREDITATION_LEVELS_PROJECT',
            'Tipos BOP= *' => 'BOP_TYPES_PROJECT',
            'Número de centro= *' => 'CENTER_NUMBER_PROJECT',
            'Nombre del contacto= *' => 'CONTACT_NAME_PROJEC',
            'Teléfono de contacto= *' => 'CONTACT_PHONE_PROJECT',
            'Ubicación= *' => 'LOCATION_PROJECT',
            'Ciudad= *' => 'CITY_PROJECT',
            'Fecha inicio curso= *' => 'COURSE_START_DATE_PROJECT',
            'Fecha fin curso= *' => 'COURSE_END_DATE_PROJECT',
            'Fecha examen práctico= *' => 'PRACTICAL_EXAM_DATE_PROJECT',
            'Hora examen práctico= *' => 'PRACTICAL_EXAM_TIME_PROJECT',
            'Fecha examen teórico= *' => 'EXAM_DATE_PROJECT',
            'Hora examen teórico= *' => 'EXAM_TIME_PROJECT',
            'Inicio membresía= *' => 'MEMBERSHIP_START_PROJECT',
            'Fin membresía= *' => 'MEMBERSHIP_END_PROJECT',
            'ID del instructor= *' => 'INSTRUCTOR_ID_PROJECT',
            'Email del instructor= *' => 'INSTRUCTOR_EMAIL_PROJECT'
        ];

        foreach ($projectRows as $row) {
            $fieldName = trim($row[0] ?? '');
            $value = trim($row[1] ?? '');

            if (isset($fieldMap[$fieldName]) && !empty($value)) {
                error_log("Campo encontrado: {$fieldName} => {$value}");
            }

            if (isset($fieldMap[$fieldName]) && !empty($value)) {
                $dbField = $fieldMap[$fieldName];

                if (in_array($dbField, ['ACCREDITATION_LEVELS_PROJECT', 'BOP_TYPES_PROJECT'])) {
                    $projectData[$dbField] = array_map('trim', explode(',', $value));
                } else {
                    $projectData[$dbField] = $value;
                }
            }
        }

        return $projectData;
    }
    private function formatDate($dateString)
    {
        if (empty($dateString)) {
            return null;
        }

        try {
            if (is_numeric($dateString)) {
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dateString);
                return $date->format('Y-m-d');
            }

            $formats = ['Y-m-d', 'd/m/Y', 'm/d/Y', 'd-m-Y', 'm-d-Y'];

            foreach ($formats as $format) {
                $date = \DateTime::createFromFormat($format, $dateString);
                if ($date !== false) {
                    return $date->format('Y-m-d');
                }
            }

            return $dateString;
        } catch (\Exception $e) {
            return $dateString;
        }
    }
    private function processStudentsTable($studentRows)
    {
        $students = [];
        $headersFound = false;
        $startProcessing = false;

        foreach ($studentRows as $index => $row) {
            $firstCell = trim($row[0] ?? '');

            if ($firstCell === 'Empresa *') {
                $headersFound = true;
                continue;
            }


            if ($headersFound) {

                if (isset($row[0]) && strpos(trim($row[0]), 'Ej:') === 0) {
                    continue;
                }

                $empresa = $row[0] ?? '';
                $cr = $row[1] ?? '';
                $firstName = $row[2] ?? '';
                $middleName = $row[3] ?? '';
                $lastName = $row[4] ?? '';
                $birthDate = $row[5] ?? '';
                $idNumber = $row[6] ?? '';
                $position = $row[7] ?? '';
                $email = $row[8] ?? '';

                if (
                    !empty(trim($empresa)) &&
                    !empty(trim($firstName)) &&
                    !empty(trim($lastName)) &&
                    !empty(trim($email))
                ) {

                    $password = $this->generateRandomPassword(8);

                    $students[] = [
                        'COMPANY' => trim($empresa),
                        'CR_PROJECT' => trim($cr),
                        'FIRST_NAME_PROJECT' => trim($firstName),
                        'MIDDLE_NAME_PROJECT' => trim($middleName),
                        'LAST_NAME_PROJECT' => trim($lastName),
                        'BIRTH_DATE_PROJECT' => $this->formatDate(trim($birthDate)),
                        'ID_NUMBER_PROJECT' => trim($idNumber),
                        'POSITION_PROJECT' => trim($position),
                        'EMAIL_PROJECT' => trim($email),
                        'PASSWORD_PROJECT' => $password,
                        'MEMBERSHIP_PROJECT' => 1
                    ];
                }
            }
        }

        return $students;
    }
    private function extractCompaniesFromStudents($studentsData)
    {
        $companies = [];

        foreach ($studentsData as $student) {
            $companyName = $student['COMPANY'] ?? '';
            if (!empty($companyName) && !in_array($companyName, $companies)) {
                $companies[] = $companyName;
            }
        }

        return $companies;
    }
    private function organizeStudentsByCompany($companies, $students)
    {
        $companiesData = [];

        foreach ($companies as $companyName) {
            $companiesData[] = [
                'NAME_PROJECT' => trim($companyName),
                'EMAIL_PROJECT' => '',
                'STUDENT_COUNT_PROJECT' => 0,
                'STUDENTS_PROJECT' => []
            ];
        }

        foreach ($students as $student) {
            $companyName = $student['COMPANY'];

            foreach ($companiesData as &$company) {
                if ($company['NAME_PROJECT'] === $companyName) {

                    unset($student['COMPANY']);

                    $student['ID_PROJECT'] = 0;
                    $student['COMPANY_PROJECT'] = $companyName;

                    $company['STUDENTS_PROJECT'][] = $student;
                    $company['STUDENT_COUNT_PROJECT'] = count($company['STUDENTS_PROJECT']);
                    break;
                }
            }
        }

        return $companiesData;
    }
    private function processStudentsAndUsers($projectData, $projectId = null)
    {
        if (!isset($projectData['COMPANIES_PROJECT'])) {
            return $projectData;
        }

        foreach ($projectData['COMPANIES_PROJECT'] as &$empresa) {
            if (!isset($empresa['STUDENTS_PROJECT'])) continue;

            foreach ($empresa['STUDENTS_PROJECT'] as &$estudiante) {
                $email = $estudiante['EMAIL_PROJECT'] ?? null;
                $password = $estudiante['PASSWORD_PROJECT'] ?? null;

                if (!$email || !$password) continue;

                $username = $this->generateUsername(
                    $estudiante['FIRST_NAME_PROJECT'] ?? '',
                    $estudiante['MIDDLE_NAME_PROJECT'] ?? '',
                    $estudiante['LAST_NAME_PROJECT'] ?? ''
                );

                $userId = $this->createOrUpdateUser($email, $password, $username, $estudiante);
                $estudiante['USER_ID_PROJECT'] = $userId;

                $candidateId = $this->createOrUpdateCandidate($estudiante, $empresa, $projectId);
                $estudiante['CANDIDATE_ID_PROJECT'] = $candidateId;

                $estudiante['ID_PROJECT'] = $projectId;
                $estudiante['COMPANY_PROJECT'] = $empresa['NAME_PROJECT'];
            }

            $empresa['STUDENT_COUNT_PROJECT'] = count($empresa['STUDENTS_PROJECT']);
        }

        return $projectData;
    }
    private function generateUsername($firstName, $middleName, $lastName)
    {
        $initials = Str::lower(Str::substr($firstName, 0, 1)) .
            ($middleName && $middleName != 'N/A' ? Str::lower(Str::substr($middleName, 0, 1)) : '');

        $lastWord = Str::lower(Str::slug(Str::afterLast($lastName, ' ')));
        return $initials . $lastWord . rand(100, 999);
    }
    private function createOrUpdateUser($email, $password, $username, $estudiante)
    {
        $existingUser = DB::table('users')->where('email', $email)->first();

        if ($existingUser) {
            DB::table('users')
                ->where('id', $existingUser->id)
                ->update([
                    'username' => $username,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'updated_at' => now()
                ]);
            return $existingUser->id;
        } else {
            return DB::table('users')->insertGetId([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'rol' => 1, // estudiante
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
    private function generateRandomPassword($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $password;
    }
    private function createOrUpdateCandidate($estudiante, $empresa, $projectId = null)
    {
        $existingCandidate = DB::table('candidate')->where('EMAIL_PROJECT', $estudiante['EMAIL_PROJECT'])->first();

        $candidateData = [
            'ID_PROJECT' => $projectId,
            'COMPANY_PROJECT' => $empresa['NAME_PROJECT'] ?? '',
            'COMPANY_ID_PROJECT' => $projectId,
            'CR_PROJECT' => $estudiante['CR_PROJECT'] ?? '',
            'LAST_NAME_PROJECT' => $estudiante['LAST_NAME_PROJECT'] ?? '',
            'FIRST_NAME_PROJECT' => $estudiante['FIRST_NAME_PROJECT'] ?? '',
            'MIDDLE_NAME_PROJECT' => $estudiante['MIDDLE_NAME_PROJECT'] ?? '',
            'DOB_PROJECT' => $estudiante['BIRTH_DATE_PROJECT'] ?? '',
            'ID_NUMBER_PROJECT' => $estudiante['ID_NUMBER_PROJECT'] ?? '',
            'EMAIL_PROJECT' => $estudiante['EMAIL_PROJECT'] ?? '',
            'PASSWORD_PROJECT' => $estudiante['PASSWORD_PROJECT'] ?? '',
            'POSITION_PROJECT' => $estudiante['POSITION_PROJECT'] ?? '',
            'MEMBERSHIP_PROJECT' => $estudiante['MEMBERSHIP_PROJECT'] ?? 1,
            'ACTIVO' => 1,
            'updated_at' => now()
        ];

        if ($existingCandidate) {
            DB::table('candidate')
                ->where('EMAIL_PROJECT', $estudiante['EMAIL_PROJECT'])
                ->update($candidateData);
            return $existingCandidate->ID_CANDIDATE;
        } else {
            $candidateData['STATUS_MAIL_PROJECT'] = 0;
            $candidateData['created_at'] = now();

            return DB::table('candidate')->insertGetId($candidateData);
        }
    }
    private function saveProject($data, $projectId)
    {

        $fillableFields = [
            'CONTACT_NAME_PROJEC',
            'CONTACT_PHONE_PROJECT',
            'COURSE_TYPE_PROJECT',
            'COURSE_NAME_ES_PROJECT',
            'COURSE_NAME_EN_PROJECT',
            'FOLIO_PROJECT',
            'LOCATION_PROJECT',
            'CITY_PROJECT',
            'CENTER_NUMBER_PROJECT',
            'CERTIFICATION_CENTER_PROJECT',
            'LANGUAGE_PROJECT',
            'ACCREDITING_ENTITY_PROJECT',
            'OPERATION_TYPE_PROJECT',
            'ACCREDITATION_LEVELS_PROJECT',
            'BOP_TYPES_PROJECT',
            'COMPANIES_PROJECT',
            'COURSE_START_DATE_PROJECT',
            'COURSE_END_DATE_PROJECT',
            'MEMBERSHIP_START_PROJECT',
            'MEMBERSHIP_END_PROJECT',
            'EXAM_DATE_PROJECT',
            'EXAM_TIME_PROJECT',
            'PRACTICAL_EXAM_DATE_PROJECT',
            'PRACTICAL_EXAM_TIME_PROJECT',
            'INSTRUCTOR_ID_PROJECT',
            'INSTRUCTOR_EMAIL_PROJECT'
        ];

        $projectData = [];
        foreach ($fillableFields as $field) {
            if (isset($data[$field])) {
                $projectData[$field] = $data[$field];
            } else {
                $projectData[$field] = null;
            }
        }

        if ($projectId == 0) {
            DB::statement('ALTER TABLE proyect AUTO_INCREMENT=1;');
            return Proyect::create($projectData);
        } else {
            $project = Proyect::find($projectId);
            $project->update($projectData);
            return $project;
        }
    }



    public function tablaEstudiantesGeneral()
    {
        try {
            $hoy = Carbon::now()->startOfDay();
            $estudiantes = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->leftJoin('proyect as p', 'c.ID_PROJECT', '=', 'p.ID_PROJECT')
                ->leftJoin('costumers as cust', 'c.COMPANY_ID_PROJECT', '=', 'cust.ID_CATALOGO_CLIENTE')
                ->leftJoin('programs as prog', 'p.PROGRAM_PROJECT', '=', 'prog.ID_CATALOGO_PROGRAMA')
                ->leftJoin('name_project as np', 'p.COURSE_NAME_ES_PROJECT', '=', 'np.ID_CATALOGO_NPROYECTOS')
                ->leftJoin('centro_capacitacion as cc', 'p.CERTIFICATION_CENTER_PROJECT', '=', 'cc.ID_CATALOGO_CENTRO')
                ->leftJoin('entes_acreditadores as ea', 'p.ACCREDITING_ENTITY_PROJECT', '=', 'ea.ID_CATALOGO_ENTE')
                ->leftJoin('tipo_operacion as to', 'p.OPERATION_TYPE_PROJECT', '=', 'to.ID_CATALOGO_OPERACION')
                ->leftJoin('idioma_examen as ie', 'p.LANGUAGE_PROJECT', '=', 'ie.ID_CATALOGO_IDIOMAEXAMEN')
                ->select(
                    'c.ID_CANDIDATE',
                    'c.LAST_NAME_PROJECT',
                    'c.FIRST_NAME_PROJECT',
                    'c.MIDDLE_NAME_PROJECT',
                    'c.EMAIL_PROJECT',
                    'c.ACTIVO',
                    'c.ID_PROJECT',
                    'c.ASISTENCIAS',
                    'c.COMPANY_PROJECT',
                    'c.COMPANY_ID_PROJECT',
                    'cust.NOMBRE_COMERCIAL_CLIENTE as COMPANY_NAME_PROJECT',

                    'p.ID_PROJECT as proyecto_id',
                    'p.FOLIO_PROJECT',
                    'p.ACCREDITATION_LEVELS_PROJECT',
                    'p.ACCREDITING_ENTITY_PROJECT',
                    'p.EXAM_DATE_PROJECT',
                    'p.BOP_TYPES_PROJECT',
                    'p.CONTACT_NAME_PROJEC',
                    'p.CONTACT_PHONE_PROJECT',
                    'p.LOCATION_PROJECT',
                    'p.CITY_PROJECT',

                    'np.NOMBRE_PROYECTO as nombre_curso',
                    'cc.NOMBRE_COMERCIAL_CENTRO as centro_capacitacion',
                    'ea.NOMBRE_ENTE as ente_acreditador',
                    'to.NOMBRE_OPERACION as tipo_operacion',
                    'ie.NOMBRE_IDIOMA as idioma',
                    'ie.ID_CATALOGO_IDIOMAEXAMEN as idioma_id',

                    'prog.PERIODO_RESIT',
                    'prog.MIN_PORCENTAJE_APROB',

                    'co.ID_COURSE as curso_id',
                    'co.PRACTICAL',
                    'co.PRACTICAL_PASS',
                    'co.EQUIPAMENT',
                    'co.EQUIPAMENT_PASS',
                    'co.PYP',
                    'co.LEVEL',
                    'co.PYP_PASS',
                    'co.STATUS',
                    'co.RESIT',
                    'co.INTENTOS',
                    'co.RESIT_MODULE',
                    'co.RESIT_INMEDIATO',
                    'co.RESIT_INMEDIATO_DATE',
                    'co.RESIT_INMEDIATO_SCORE',
                    'co.RESIT_INMEDIATO_STATUS',
                    'co.RESIT_PROGRAMADO',
                    'co.RESIT_1',
                    'co.RESIT_1_DATE',
                    'co.RESIT_1_SCORE',
                    'co.RESIT_1_STATUS',
                    'co.RESIT_2',
                    'co.RESIT_2_DATE',
                    'co.RESIT_2_STATUS',
                    'co.RESIT_2_SCORE',
                    'co.RESIT_3',
                    'co.RESIT_3_DATE',
                    'co.RESIT_3_STATUS',
                    'co.RESIT_3_SCORE',
                    'co.RESIT_ENTRENAMIENTO',
                    'co.RESIT_FOLIO_PROYECTO',
                    'co.RESIT_PROGRAMADO_DATE',
                    'co.RESIT_PROGRAMADO_SCORE',
                    'co.RESIT_PROGRAMADO_STATUS',
                    'co.FINAL_STATUS',
                    'co.HAVE_CERTIFIED',
                    'co.CERTIFICATE_NUMBER',
                    'co.CERTIFIED',
                    'co.EXPIRATION'
                )
                ->orderBy('c.LAST_NAME_PROJECT', 'asc')
                ->get();

            $allNivelIds = [];
            $allBopIds = [];
            $projectToNiveles = [];
            $projectToBops = [];

            foreach ($estudiantes as $e) {

                if (!empty($e->LEVEL)) {
                    $allNivelIds[] = $e->LEVEL;
                }
                if (!empty($e->ACCREDITATION_LEVELS_PROJECT)) {
                    $niveles = is_string($e->ACCREDITATION_LEVELS_PROJECT)
                        ? json_decode($e->ACCREDITATION_LEVELS_PROJECT, true)
                        : $e->ACCREDITATION_LEVELS_PROJECT;

                    if (is_array($niveles) && !empty($niveles)) {
                        $projectToNiveles[$e->proyecto_id] = $niveles;
                        $allNivelIds = array_merge($allNivelIds, $niveles);
                    }
                }

                if (!empty($e->BOP_TYPES_PROJECT)) {
                    $bops = is_string($e->BOP_TYPES_PROJECT)
                        ? json_decode($e->BOP_TYPES_PROJECT, true)
                        : $e->BOP_TYPES_PROJECT;

                    if (is_array($bops) && !empty($bops)) {
                        $projectToBops[$e->proyecto_id] = $bops;
                        $allBopIds = array_merge($allBopIds, $bops);
                    }
                }
            }

            $allNivelIds = array_unique($allNivelIds);
            $nivelesData = DB::table('nivel_acreditacion')
                ->whereIn('ID_CATALOGO_NIVELACREDITACION', array_unique($allNivelIds))
                ->get()->keyBy('ID_CATALOGO_NIVELACREDITACION');
            $allBopIds = array_unique($allBopIds);

            $nivelesData = [];
            if (!empty($allNivelIds)) {
                $nivelesData = DB::table('nivel_acreditacion')
                    ->whereIn('ID_CATALOGO_NIVELACREDITACION', $allNivelIds)
                    ->get()
                    ->keyBy('ID_CATALOGO_NIVELACREDITACION');
            }

            $bopsData = [];
            if (!empty($allBopIds)) {
                $bopsData = DB::table('tipo_bop')
                    ->whereIn('ID_CATALOGO_TIPOBOP', $allBopIds)
                    ->get()
                    ->keyBy('ID_CATALOGO_TIPOBOP');
            }

            $nivelesMap = [];
            foreach ($projectToNiveles as $projectId => $nivelIds) {
                $nivelesMap[$projectId] = [];
                foreach ($nivelIds as $nivelId) {
                    if (isset($nivelesData[$nivelId])) {
                        $nivelesMap[$projectId][] = [
                            'id' => $nivelesData[$nivelId]->ID_CATALOGO_NIVELACREDITACION,
                            'nombre' => $nivelesData[$nivelId]->NOMBRE_NIVEL
                        ];
                    }
                }
            }

            $bopMap = [];
            foreach ($projectToBops as $projectId => $bopIds) {
                $bopMap[$projectId] = [];
                foreach ($bopIds as $bopId) {
                    if (isset($bopsData[$bopId])) {
                        $bopMap[$projectId][] = [
                            'id' => $bopsData[$bopId]->ID_CATALOGO_TIPOBOP,
                            'abreviatura' => $bopsData[$bopId]->ABREVIATURA,
                            'nombre' => $bopsData[$bopId]->DESCRIPCION_TIPOBOP ?? ''
                        ];
                    }
                }
            }


            $estudiantesFormateados = [];

            foreach ($estudiantes as $e) {
                $nivelesAcreditacion = $nivelesMap[$e->proyecto_id] ?? [];
                $tiposBOP = $bopMap[$e->proyecto_id] ?? [];

                $asistenciasJson = $e->ASISTENCIAS;
                $totalDias = 0;
                $diasAsistidos = 0;
                $textoAsistencia = 'No Asistió';

                if (!empty($asistenciasJson)) {
                    $decodedAsistencias = json_decode($asistenciasJson, true);
                    if (is_string($decodedAsistencias)) {
                        $decodedAsistencias = json_decode($decodedAsistencias, true);
                    }
                    if (is_array($decodedAsistencias) && count($decodedAsistencias) > 0) {
                        $totalDias = count($decodedAsistencias);
                        foreach ($decodedAsistencias as $fecha => $asistio) {
                            if ($asistio == 1 || $asistio === true || $asistio === '1') {
                                $diasAsistidos++;
                            }
                        }
                        if ($diasAsistidos === $totalDias) {
                            $textoAsistencia = 'Asistió';
                        } elseif ($diasAsistidos > 0) {
                            $textoAsistencia = 'Desertó';
                        } else {
                            $textoAsistencia = 'No Asistió';
                        }
                    }
                }
                $yaAprobadoPorCertificado = (!empty($e->EXPIRATION) || !empty($e->CERTIFIED) || $e->HAVE_CERTIFIED == 1);

                $pasoResit = ($e->RESIT_PROGRAMADO_STATUS === 'Pass' || $e->RESIT_INMEDIATO_STATUS === 'Pass');

                $resitVencido = false;
                if (!empty($e->EXAM_DATE_PROJECT) && !is_null($e->PERIODO_RESIT)) {
                    $fechaVencimiento = Carbon::parse($e->EXAM_DATE_PROJECT)->addDays((int)$e->PERIODO_RESIT);
                    if ($hoy->greaterThan($fechaVencimiento)) {
                        $resitVencido = true;
                    }
                }

                $currentStatus = $e->STATUS;
                $currentFinalStatus = $e->FINAL_STATUS;
                $califPractico = $e->PRACTICAL;
                $califEQ = $e->EQUIPAMENT;
                $califPYP    = $e->PYP;
                $califResitInmediato  = $e->RESIT_INMEDIATO_SCORE;
                $ente = $e->ACCREDITING_ENTITY_PROJECT;
                $califMinAprob = $e->MIN_PORCENTAJE_APROB ?? 100;
                $practicoAprob = $califPractico >= $califMinAprob ? 'Pass' : 'Unpass';
                $eqAprob = $califEQ >= $califMinAprob ? 'Pass' : 'Unpass';
                $pypAprob = $califPYP >= $califMinAprob ? 'Pass' : 'Unpass';
                $resitAprob = $califResitInmediato >= $califMinAprob ? 'Pass' : 'Unpass';
                $currentStatus = 'Pendiente';
                $currentFinalStatus = 'Pendiente';

                switch ($ente) {
                    case 1: //iadc
                        if ($califPractico >= $califMinAprob && $califEQ >= $califMinAprob) {
                            $currentStatus = 'Completed';
                            $currentFinalStatus = 'Completed';
                        } else {
                            $currentStatus = 'Failed';
                            if ($yaAprobadoPorCertificado || $pasoResit) {
                                $currentFinalStatus = 'Completed';
                            } else {
                                $currentFinalStatus = 'Failed';
                            }
                        }
                        break;
                    case 2: //iwcf
                        if ($califPractico >= $califMinAprob && $califEQ >= $califMinAprob && $califPYP >= $califMinAprob) {
                            $currentStatus = 'Completed';
                            $currentFinalStatus = 'Completed';
                        } else {
                            $currentStatus = 'Failed';
                            if ($yaAprobadoPorCertificado || $pasoResit) {
                                $currentFinalStatus = 'Completed';
                            } else {
                                $currentFinalStatus = 'Failed';
                            }
                        }
                        break;
                    default:
                        break;
                }

                $misNiveles = [];

                if (!empty($e->LEVEL) && isset($nivelesData[$e->LEVEL])) {
                    $misNiveles[] = [
                        'id' => $nivelesData[$e->LEVEL]->ID_CATALOGO_NIVELACREDITACION,
                        'nombre' => $nivelesData[$e->LEVEL]->NOMBRE_NIVEL
                    ];
                } else {
                    $projNivelesIds = is_string($e->ACCREDITATION_LEVELS_PROJECT)
                        ? json_decode($e->ACCREDITATION_LEVELS_PROJECT, true)
                        : $e->ACCREDITATION_LEVELS_PROJECT;

                    if (is_array($projNivelesIds)) {
                        foreach ($projNivelesIds as $idN) {
                            if (isset($nivelesData[$idN])) {
                                $misNiveles[] = [
                                    'id' => $nivelesData[$idN]->ID_CATALOGO_NIVELACREDITACION,
                                    'nombre' => $nivelesData[$idN]->NOMBRE_NIVEL
                                ];
                            }
                        }
                    }
                }
                $resitProgramados = [];
                $califMinAprob = $e->MIN_PORCENTAJE_APROB ?? 100;

                if (!empty($e->RESIT_PROGRAMADO_SCORE) || $e->RESIT_PROGRAMADO_SCORE === "0" || $e->RESIT_PROGRAMADO_SCORE === 0) {
                    $scoreP = (float)$e->RESIT_PROGRAMADO_SCORE;
                    $resitProgramados[] = [
                        'score'  => $scoreP,
                        'status' => $scoreP >= $califMinAprob ? 'Aprobado' : 'Reprobado',
                        'date'   => !empty($e->RESIT_PROGRAMADO_DATE) ? \Carbon\Carbon::parse($e->RESIT_PROGRAMADO_DATE)->format('d/m/Y') : null
                    ];
                }

                for ($i = 1; $i <= 3; $i++) {
                    $campoScore = "RESIT_{$i}_SCORE";
                    $campoDate  = "RESIT_{$i}_DATE";

                    if (!empty($e->$campoScore) || $e->$campoScore === "0" || $e->$campoScore === 0) {
                        $scoreR = (float)$e->$campoScore;
                        $resitProgramados[] = [
                            'score'  => $scoreR,
                            'status' => $scoreR >= $califMinAprob ? 'Aprobado' : 'Reprobado',
                            'date'   => !empty($e->$campoDate) ? \Carbon\Carbon::parse($e->$campoDate)->format('d/m/Y') : null
                        ];
                    }
                }

                if ($textoAsistencia === 'Desertó') {
                    $currentStatus = 'Desertó';
                    $currentFinalStatus = 'Desertó';
                } elseif ($textoAsistencia === 'No Asistió') {
                    $currentStatus = 'No Asistió';
                    $currentFinalStatus = 'No Asistió';
                }


                $estudiantesFormateados[] = [
                    'curso_id' => $e->curso_id,
                    'candidato' => [
                        'ID_CANDIDATE' => $e->ID_CANDIDATE,
                        'LAST_NAME_PROJECT' => $e->LAST_NAME_PROJECT,
                        'FIRST_NAME_PROJECT' => $e->FIRST_NAME_PROJECT,
                        'MIDDLE_NAME_PROJECT' => $e->MIDDLE_NAME_PROJECT,
                        'EMAIL_PROJECT' => $e->EMAIL_PROJECT,
                        'ACTIVO' => $e->ACTIVO,
                        'ID_PROJECT' => $e->ID_PROJECT,
                        'ASISTENCIAS' => $e->ASISTENCIAS,
                        'ASISTENCIA' => $textoAsistencia,
                        'ASISTENCIAS_DETALLE' => $diasAsistidos . '/' . $totalDias,
                        'COMPANY_PROJECT' => $e->COMPANY_PROJECT,
                        'COMPANY_NAME_PROJECT' => $e->COMPANY_NAME_PROJECT ?? 'N/A'
                    ],
                    'proyecto' => [
                        'ID_PROJECT' => $e->proyecto_id,
                        'FOLIO_PROJECT' => $e->FOLIO_PROJECT,
                        'NOMBRE_CURSO' => $e->nombre_curso,
                        'CENTRO_CAPACITACION' => $e->centro_capacitacion,
                        'ENTE_ACREDITADOR' => $e->ente_acreditador,
                        'TIPO_OPERACION' => $e->tipo_operacion,
                        'IDIOMA' => $e->idioma,
                        'NIVELES_ACREDITACION' => $misNiveles,
                        'TIPOS_BOP' => $tiposBOP,
                        'CONTACT_NAME_PROJEC' => $e->CONTACT_NAME_PROJEC,
                        'CONTACT_PHONE_PROJECT' => $e->CONTACT_PHONE_PROJECT,
                        'LOCATION_PROJECT' => $e->LOCATION_PROJECT,
                        'CITY_PROJECT' => $e->CITY_PROJECT
                    ],
                    'datos_curso' => [
                        'PRACTICAL' => $e->PRACTICAL,
                        'PRACTICAL_PASS' => $practicoAprob,
                        'EQUIPAMENT' => $e->EQUIPAMENT,
                        'EQUIPAMENT_PASS' => $eqAprob,
                        'PYP' => $e->PYP,
                        'PYP_PASS' => $pypAprob,
                        'STATUS' => $currentStatus,
                        'RESIT' => $e->RESIT,
                        'INTENTOS' => $e->INTENTOS,
                        'RESIT_MODULE' => $e->RESIT_MODULE,
                        'RESIT_INMEDIATO' => $e->RESIT_INMEDIATO,
                        'RESIT_INMEDIATO_DATE' => $e->RESIT_INMEDIATO_DATE,
                        'RESIT_INMEDIATO_SCORE' => $e->RESIT_INMEDIATO_SCORE,
                        'RESIT_INMEDIATO_STATUS' => $resitAprob,
                        'RESIT_PROGRAMADO' => $e->RESIT_PROGRAMADO,
                        'RESIT_ENTRENAMIENTO' => $e->RESIT_ENTRENAMIENTO,
                        'RESIT_FOLIO_PROYECTO' => $e->RESIT_FOLIO_PROYECTO,
                        'RESIT_PROGRAMADO_DATE' => $e->RESIT_PROGRAMADO_DATE,
                        'RESIT_PROGRAMADO_SCORE' => $e->RESIT_PROGRAMADO_SCORE,
                        'RESIT_PROGRAMADO_STATUS' => $e->RESIT_PROGRAMADO_STATUS,
                        'FINAL_STATUS' => $currentFinalStatus,
                        'HAVE_CERTIFIED' => $e->HAVE_CERTIFIED,
                        'CERTIFIED' => $e->CERTIFIED,
                        'CERTIFICATE_NUMBER' => $e->CERTIFICATE_NUMBER,
                        'EXPIRATION' => $e->EXPIRATION,
                        'HISTORIAL_PROGRAMADOS' => $resitProgramados
                    ]
                ];
            }

            return response()->json([
                'success' => true,
                'estudiantes' => $estudiantesFormateados
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getProjectDates($ID_PROJECT)
    {
        try {
            $proyecto = Proyect::find($ID_PROJECT);

            if (!$proyecto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'COURSE_START_DATE_PROJECT' => $proyecto->COURSE_START_DATE_PROJECT,
                'COURSE_END_DATE_PROJECT' => $proyecto->COURSE_END_DATE_PROJECT
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener fechas',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function getProgramRules($programId)
    {
        try {
            $programa = Programas::find($programId);

            if (!$programa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Programa no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'programa' => [
                    'ID_CATALOGO_PROGRAMA' => $programa->ID_CATALOGO_PROGRAMA,
                    'NOMBRE_PROGRAMA' => $programa->NOMBRE_PROGRAMA,
                    'MIN_PORCENTAJE_APROB' => $programa->MIN_PORCENTAJE_APROB,
                    'MAX_PORCENTAJE_APROB' => $programa->MAX_PORCENTAJE_APROB,
                    'OPCION_RESIT' => $programa->OPCION_RESIT,
                    'MIN_PORCENTAJE_REPROB_RE' => $programa->MIN_PORCENTAJE_REPROB_RE,
                    'MAX_PORCENTAJE_REPROB_RE' => $programa->MAX_PORCENTAJE_REPROB_RE,
                    'MIN_PORCENTAJE_REPROB' => $programa->MIN_PORCENTAJE_REPROB,
                    'MAX_PORCENTAJE_REPROB' => $programa->MAX_PORCENTAJE_REPROB,
                    'OPCION_RESIT_PERMITIDAS' => $programa->OPCION_RESIT_PERMITIDAS,
                    'PERIODO_RESIT' => $programa->PERIODO_RESIT
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener reglas del programa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function uploadCertificate(Request $request)
    {
        try {
            $request->validate([
                'certificate' => 'required|file|mimes:pdf|max:10240',
                'ID_COURSE' => 'required|integer'
            ]);

            $course = Course::find($request->ID_COURSE);

            if (!$course) {
                return response()->json([
                    'success' => false,
                    'message' => 'Curso no encontrado'
                ], 404);
            }

            if ($request->hasFile('certificate')) {
                $file = $request->file('certificate');
                $filename = 'certificate_' . $request->ID_COURSE . '_' . time() . '.pdf';
                $path = $file->storeAs('certificates', $filename, 'public');

                $course->CERTIFIED = $path;
                $course->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Certificado cargado exitosamente',
                    'path' => $path
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No se recibió el archivo'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar certificado',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getNivelData($nivelId)
    {
        try {
            $nivel = NivelAcreditacion::find($nivelId);
            if (!$nivel) {
                return response()->json(['success' => false, 'message' => 'Nivel no encontrado'], 404);
            }
            return response()->json([
                'success' => true,
                'nivel' => [
                    'ID_CATALOGO_NIVELACREDITACION' => $nivel->ID_CATALOGO_NIVELACREDITACION,
                    'NOMBRE_NIVEL' => $nivel->NOMBRE_NIVEL,
                    'DESCRIPCION_NIVEL' => $nivel->DESCRIPCION_NIVEL
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
