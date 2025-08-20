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
use App\Models\Admin\catalogs\IdiomasExamenes;
use App\Models\Admin\catalogs\NivelAcreditacion;
use App\Models\Admin\catalogs\TipoBOP;

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


                                $existingUser = DB::table('users')->where('email', $email)->first();
                                if ($existingUser && (!empty($estudiante['USER_ID_PROJECT']) && $existingUser->id != $estudiante['USER_ID_PROJECT'])) {
                                    return response()->json([
                                        'error' => true,
                                        'message' => "Ya existe un usuario con el correo: $email",
                                        'email' => $email
                                    ], 422);
                                }
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
    public function detailsProject($ID_PROJECT)
    {
        $proyecto = Proyect::findOrFail($ID_PROJECT);
        $COURSE_NAME_ES_PROJECT = $proyecto->COURSE_NAME_ES_PROJECT;
        $visitas = 2;
        $membresiasActivas = 5;
        $membresiasEmpresas = 5;
        $membresiasIndividuales = 5;
        $historialMembresias = [58, 80, 85, 80, 70, 75, 85, 80, 79, 90, 89, 75];
        $proyectosActivos = 5;
        $proyectosProximos = 5;
        $proyectosFinalizados = 5;
        $accesos = 5;
        $historialMembresias = [58, 80, 85, 80, 70, 75, 85, 80, 79, 90, 89, 75];
        $historialEmpresas = [0, 0, 0, 0, 73, 76, 0, 0, 0, 0, 0, 60];

        return view('Admin.content.Admin.projects.details', compact('COURSE_NAME_ES_PROJECT', 'ID_PROJECT', 'visitas', 'membresiasActivas', 'membresiasEmpresas', 'membresiasIndividuales', 'historialMembresias', 'proyectosActivos', 'proyectosProximos', 'proyectosFinalizados', 'accesos', 'historialEmpresas'));
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
                                            <i class="ri-mail-send-line" style="font-size: 1.2rem;"></i> Enviar credenciales
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
                                            <i class="ri-mail-send-line" style="font-size: 1.2rem;"></i> Enviar credenciales
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
                        'EMAIL' => $estudiante['EMAIL_PROJECT'],
                        'ID_NUMBER' => $estudiante['ID_NUMBER_PROJECT'],
                        'CARGO' => $estudiante['POSITION_PROJECT'],
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
}
