<?php

use Illuminate\Support\Facades\Route;

// CONTROLLER ROUTES
use Illuminate\Http\Request;
// CONFIG
use App\Http\Controllers\Language\languageController;
use App\Http\Controllers\Auth\loginController;

// USER
use App\Http\Controllers\Principal\principalController;
use App\Http\Controllers\Calculator\calculatorController;
use App\Http\Controllers\Killsheet\killsheetController;
use App\Http\Controllers\Evaluation\evaluationController;

// ADMIN
use App\Http\Controllers\Admin\adminController;
// CATALOGS
use App\Http\Controllers\Admin\Catalogs\CatalogsController;
//PROYECTOS
use App\Http\Controllers\Admin\Projects\ProjectManagementController;
//EXERCISES
use App\Http\Controllers\Admin\Exercises\ExamController;
use App\Http\Controllers\Admin\Exercises\KillsheetsController;
use App\Http\Controllers\Admin\Exercises\MathController;

//usuarios
use App\Http\Controllers\Admin\Access\usuariosController;

//mail
use App\Http\Controllers\Admin\Mail\correoController;
//mail
use App\Mail\Correo;
use Illuminate\Support\Facades\Mail;

use App\Models\Admin\catalogs\CentrosCapacitacion;
use App\Models\Admin\catalogs\NivelAcreditacion;
use App\Models\Admin\catalogs\Programas;
use App\Models\Admin\catalogs\Ubicaciones;


use App\Mail\NotificacionVencimientoEstudiante;
use App\Mail\NotificacionVencimientoCliente;

//---------------------------               ALL              -------------------------------//
//----------------------------LANGUAGE-------------------------------//
Route::get('lang/{lang}', [languageController::class, 'switchLang'])->name('switch.lang');

//----------------------------LOGIN-------------------------------//
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//----------------------------LOGOUT-------------------------------//
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//----------------------------REGISTER-------------------------------//
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
//---------------------------               USER              -------------------------------//
//----------------------------PRINCIPAL-------------------------------//
Route::middleware('auth')->get('/', [PrincipalController::class, 'index'])->name('home');

//----------------------------CALCULATOR-------------------------------//
Route::middleware('auth')->get('/Calculator', [calculatorController::class, 'index'])->name('calculator');
Route::get('/exercise/image/{path}', [MathController::class, 'showImage'])
    ->where('path', '.*')
    ->name('exercise.image');
//----------------------------KILLSHEET-------------------------------//
Route::middleware(['auth'])->group(function () {
    Route::get('/Killsheet', [killsheetController::class, 'index'])->name('killsheet');
    Route::get('/Killsheet/panel/{TIPO}', [KillsheetController::class, 'panel'])->name('killsheet.panel');
    Route::get('/Killsheet/video/{TIPO}', [KillsheetController::class, 'video'])->name('killsheet.video');
    Route::get('/Killsheet/info/{TIPO}', [KillsheetController::class, 'info'])->name('killsheet.info');
    Route::get('/Killsheet/firstExercise/{TIPO}', [KillsheetController::class, 'firstExercise'])->name('killsheet.firstExercise');
    Route::get('/Killsheet/practiceExercise/{TIPO}', [KillsheetController::class, 'practiceExercise'])->name('killsheet.practiceExercise');
    Route::get('/Killsheet/exerciseSimulator/{TIPO}', [KillsheetController::class, 'exerciseSimulator'])->name('killsheet.exerciseSimulator');
    Route::get('/Killsheet/quickExercise/{TIPO}', [KillsheetController::class, 'quickExercise'])->name('killsheet.quickExercise');
});


//----------------------------EXAM-------------------------------//
Route::middleware('auth')->get('/Evaluation', [evaluationController::class, 'index'])->name('evaluation');

Route::middleware(['auth'])->group(function () {
    //---------------------------               ADMIN              -------------------------------//
    //----------------------------DASHBOARD-------------------------------//
    Route::get('/api/chart/candidates', [adminController::class, 'getCandidateStats']);
    Route::get('/api/chart/years', [adminController::class, 'getAvailableYears']);
    Route::get('/api/dashboard/data', [adminController::class, 'getDashboardDataTotals']);
    Route::get('/getAllCoursesData', [adminController::class, 'getAllCoursesData']);
    Route::get('/api/estadisticas-general', [adminController::class, 'estadisticasGeneral']);
    Route::get('/dashboard/data', [adminController::class, 'getDashboardData']);



    //----------------------------INSTRUCTOR-------------------------------//
    Route::get('/dashboardInstructor', [adminController::class, 'dashboardInstructor'])->name('dashboardInstructor');
    Route::get('/projectsManagement/{PROJECT_ID}', [adminController::class, 'projectsManagement'])->name('projects.management');


    //-------------------------------PROJECT----------------------------------------//
    Route::get('/projectsAdmin', [adminController::class, 'projectsAdmin'])->name('projectsAdmin');
    Route::post('/proyectoSave', [ProjectManagementController::class, 'store']);

    Route::prefix('projectsAdmin/details')->group(function () {
        Route::post('/cursoSave', [ProjectManagementController::class, 'store']);
        Route::post('/candidateSave', [ProjectManagementController::class, 'store']);
    });

    Route::get('/getProjectDates/{ID_PROJECT}', [ProjectManagementController::class, 'getProjectDates']);
    Route::get('/getNivelData/{nivelId}', [ProjectManagementController::class, 'getNivelData']);
    Route::get('/getProgramRules/{programId}', [ProjectManagementController::class, 'getProgramRules']);
    Route::post('/uploadCertificate', [ProjectManagementController::class, 'uploadCertificate']);

    Route::get('/proyectoDatatable', [ProjectManagementController::class, 'proyectoDatatable']);
    Route::get('/projectsAdmin/details/{ID_PROJECT}', [ProjectManagementController::class, 'detailsProject'])->name('projectsAdmin.details');
    Route::get('/projectStudentDatatable', [ProjectManagementController::class, 'projectStudentDatatable']);
    Route::get('/projectCourseDatatable', [ProjectManagementController::class, 'projecTCourseDatatable']);
    Route::get('/editarTablaCandidato/{ID_PROJECT}', [ProjectManagementController::class, 'editarTablaCandidato']);
    Route::get('/editarTablaCurso/{ID_PROJECT}', [ProjectManagementController::class, 'editarTablaCurso']);
    Route::get('/exportProjectExcel/{id}', [ProjectManagementController::class, 'exportProjectExcel'])->name('exportProjectExcel');
    Route::get('/exportProjectPdf/{id}', [ProjectManagementController::class, 'exportProjectPdf'])->name('exportProjectPdf');

    Route::get('/project/template/download', [ProjectManagementController::class, 'downloadTemplate'])->name('project.download.template');
    Route::post('/projectExcelImport', [ProjectManagementController::class, 'store']);
    //mails
    Route::post('/sendStudentCredentials', [correoController::class, 'enviarCredenciales']);
    Route::get('/projectsInstructor', [adminController::class, 'projectsInstructor'])->name('projectsInstructor');

    //---------------------------STUDENTS----------------------------------------//
    Route::get('/studentsList', [adminController::class, 'studentsList'])->name('studentsList');
    Route::get('/tablaEstudiantesGeneral', [ProjectManagementController::class, 'tablaEstudiantesGeneral']);
});
// --------------------------EXERCISES-------------------------------------- //
// --------------------------QUESTIONS-------------------------------------- //
Route::middleware(['auth'])->group(function () {
    Route::get('/exercises', [adminController::class, 'exercises'])->name('exercises');
    Route::get('/questionDatatable', [ExamController::class, 'questionDatatable']);
    Route::post('/questionSave', [ExamController::class, 'store']);
    Route::get('/questionActive', [ExamController::class, 'store']);
    Route::get('/showImage/{ruta}', [ExamController::class, 'showImage'])->where('ruta', '.*');

    // --------------------------EXAMS-------------------------------------- //
    Route::get('/examDatatable', [ExamController::class, 'examDatatable']);
    Route::post('/examSave', [ExamController::class, 'store']);
    Route::get('/examActive', [ExamController::class, 'store']);
    Route::get('/temas', [ExamController::class, 'getTemas']);



Route::get('/hora', function() {
    return "Hora de Laravel: " . now()->toDateTimeString();
});

    // --------------------------MATH-------------------------------------- //
    Route::get('/math', [adminController::class, 'math'])->name('math');
    Route::get('/mathDatatable', [MathController::class, 'mathDatatable']);
    Route::post('/mathSave', [MathController::class, 'store']);
    Route::get('/mathActive', [MathController::class, 'store']);

    // --------------------------KILLSHEETS-------------------------------------- //
    Route::get('/killsheets', [adminController::class, 'killsheets'])->name('killsheets');
    Route::get('/killsheetsDatatable', [KillsheetsController::class, 'killsheetsDatatable']);
    Route::post('/killsheetsSave', [KillsheetsController::class, 'store']);
    Route::get('/killsheetsActive', [KillsheetsController::class, 'store']);

    Route::get('/get-iadc-form-content', function (Request $request) {
        $id = $request->get('id', 'default-id');
        return view('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => $id]);
    })->name('get.iadc.content');
});
// ----------------------------CATALOGS--------------------------------------- //
Route::middleware(['auth'])->group(function () {
    Route::get('/catalogs', [adminController::class, 'catalogs'])->name('catalogs');
    Route::post('/enteSave', [CatalogsController::class, 'store']);
    Route::get('/enteActive', [CatalogsController::class, 'store']);
    Route::get('/entesDatatable', [CatalogsController::class, 'entesDatatable']);

    Route::get('/nivelesDatatable', [CatalogsController::class, 'nivelesDatatable']);
    Route::post('/nivelSave', [CatalogsController::class, 'store']);
    Route::get('/nivelActive', [CatalogsController::class, 'store']);

    Route::get('/tiposbopDatatable', [CatalogsController::class, 'tiposbopDatatable']);
    Route::post('/tipobopSave', [CatalogsController::class, 'store']);
    Route::get('/tipobopActive', [CatalogsController::class, 'store']);

    Route::get('/temasDatatable', [CatalogsController::class, 'temasDatatable']);
    Route::post('/temaSave', [CatalogsController::class, 'store']);
    Route::get('/temaActive', [CatalogsController::class, 'store']);

    Route::get('/subtemasDatatable', [CatalogsController::class, 'subtemasDatatable']);
    Route::post('/subtemaSave', [CatalogsController::class, 'store']);
    Route::get('/subtemaActive', [CatalogsController::class, 'store']);

    Route::get('/idiomasDatatable', [CatalogsController::class, 'idiomasDatatable']);
    Route::post('/idiomaSave', [CatalogsController::class, 'store']);
    Route::get('/idiomaActive', [CatalogsController::class, 'store']);

    Route::get('/membresiasDatatable', [CatalogsController::class, 'membresiasDatatable']);
    Route::post('/membresiaSave', [CatalogsController::class, 'store']);
    Route::get('/membresiaActive', [CatalogsController::class, 'store']);

    Route::get('/operacionDatatable', [CatalogsController::class, 'operacionDatatable']);
    Route::post('/operacionSave', [CatalogsController::class, 'store']);
    Route::get('/operacionActive', [CatalogsController::class, 'store']);

    Route::get('/nombresDatatable', [CatalogsController::class, 'nombresDatatable']);
    Route::post('/nombresProyectosSave', [CatalogsController::class, 'store']);
    Route::get('/nombresProyectosActive', [CatalogsController::class, 'store']);

    Route::get('/instructoresDatatable', [CatalogsController::class, 'instructoresDatatable']);
    Route::post('/instructorSave', [CatalogsController::class, 'store']);
    Route::get('/instructorActive', [CatalogsController::class, 'store']);

    Route::get('/centrosDatatable', [CatalogsController::class, 'centrosDatatable']);
    Route::post('/centroSave', [CatalogsController::class, 'store']);

    Route::get('/clienteDatatable', [CatalogsController::class, 'clienteDatatable']);
    Route::post('/clienteSave', [CatalogsController::class, 'store']);
    Route::get('/clienteActive', [CatalogsController::class, 'store']);

    Route::get('/ubicacionesDatatable', [CatalogsController::class, 'ubicacionesDatatable']);
    Route::post('/ubicacionesSave', [CatalogsController::class, 'store']);
    Route::get('/ubicacionesActive', [CatalogsController::class, 'store']);

    Route::get('/programasDatatable', [CatalogsController::class, 'programasDatatable']);
    Route::post('/programaSave', [CatalogsController::class, 'store']);
    Route::get('/programaActive', [CatalogsController::class, 'store']);

    

    Route::get('/archivos/centros/{id}/{filename}', function ($id, $filename) {
        $path = storage_path('app/admin/catalogs/centros/' . $id . '/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'Archivo no encontrado: ' . $path);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    })->name('archivos.centros');

    Route::get('/archivos/proyectos/{id_proyecto}/candidatos/{id_candidato}/{filename}', function ($id_proyecto, $id_candidato, $filename) {
    
        // Construimos la ruta física basada en tu estructura de carpetas
        $path = storage_path('app/admin/projects/' . $id_proyecto . '/candidates/' . $id_candidato . '/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'Archivo no encontrado: ' . $path);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    })->name('archivos.candidatos');
    
    Route::get('/centros-capacitacion', function (Request $request) {
        $acreditacion = $request->get('acreditacion', 0);

        $query = CentrosCapacitacion::where(function ($q) {
            $q->whereRaw('DATE(VIGENCIA_HASTA_CENTRO) >= CURDATE()')
                ->orWhereNull('VIGENCIA_HASTA_CENTRO');
        });

        if ($acreditacion == 0) {
            $query->whereIn('ACREDITACION_CENTRO', [1, 2]);
        } else {
            $query->where('ACREDITACION_CENTRO', $acreditacion);
        }

        $centros = $query->orderBy('NOMBRE_COMERCIAL_CENTRO', 'asc')->get();

        \Log::info('=== CONSULTA CENTROS CAPACITACION ===', [
            'acreditacion_recibida' => $acreditacion,
            'fecha_actual' => now()->format('Y-m-d'),
            'total_centros_encontrados' => $centros->count(),
            'centros_detalle' => $centros->map(function ($c) {
                return [
                    'id' => $c->ID_CATALOGO_CENTRO,
                    'nombre' => $c->NOMBRE_COMERCIAL_CENTRO,
                    'tipo_centro' => $c->TIPO_CENTRO,
                    'acreditacion' => $c->ACREDITACION_CENTRO,
                    'vigencia_hasta' => $c->VIGENCIA_HASTA_CENTRO
                ];
            })
        ]);

        return response()->json([
            'success' => true,
            'centros' => $centros,
            'total' => $centros->count(),
            'fecha_consulta' => now()->format('Y-m-d'),
            'filtro_acreditacion' => $acreditacion,
            'nota' => 'Se traen centros de cualquier tipo (primario o asociado) que estén vigentes'
        ]);
    });

    Route::get('/ubicaciones', function (Request $request) {

        $ubicaciones = Ubicaciones::get();


        return response()->json([
            'success' => true,
            'ubicaciones' => $ubicaciones,
            'total' => $ubicaciones->count(),
            'nota' => 'Se traen ubicaciones que esten activas en el catálogo'
        ]);
    });

    Route::get('/programas', function (Request $request) {

        $programas = NivelAcreditacion::get();


        return response()->json([
            'success' => true,
            'programas' => $programas,
            'total' => $programas->count(),
            'nota' => 'Se traen programas que esten activas en el catálogo'
        ]);
    });
   Route::get('/obtener-datos-centro', function (Request $request) {
    $centroId = $request->get('centro_id');

    if (!$centroId) {
        return response()->json(['success' => false, 'message' => 'ID no proporcionado']);
    }

    $centro = CentrosCapacitacion::find($centroId);
    if (!$centro) {
        return response()->json(['success' => false, 'message' => 'Centro no encontrado']);
    }

    $getContactos = function($centroModel) {
        $contactos = [];
        $data = is_string($centroModel->CONTACTOS_CENTRO) 
                ? json_decode($centroModel->CONTACTOS_CENTRO, true) 
                : $centroModel->CONTACTOS_CENTRO;

        if (is_array($data)) {
            foreach ($data as $c) {
                $contactos[] = [
                    'nombre' => $c['NOMBRE'] ?? '',
                    'cargo'  => $c['CARGO'] ?? '',
                    'email'  => $c['EMAIL'] ?? '',
                    'celular'=> $c['CELULAR'] ?? '',
                    'fijo'   => $c['FIJO'] ?? ''
                ];
            }
        }
        return $contactos;
    };

    $respuesta = [
        'success' => true,
        'tipo' => ($centro->TIPO_CENTRO == 1) ? 'asociado' : 'primario',
        'centro_solicitado' => [
            'nombre' => $centro->NOMBRE_COMERCIAL_CENTRO,
            'numero' => $centro->NUMERO_CENTRO,
            'contactos' => $getContactos($centro)
        ]
    ];

    // Si es ASOCIADO (Tipo 1), buscamos el primario
    if ($centro->TIPO_CENTRO == 1 && $centro->ASOCIADO_CENTRO) {
        $primario = CentrosCapacitacion::find($centro->ASOCIADO_CENTRO);
        if ($primario) {
            $respuesta['centro_primario'] = [
                'nombre' => $primario->NOMBRE_COMERCIAL_CENTRO,
                'numero' => $primario->NUMERO_CENTRO,
                'contactos' => $getContactos($primario)
            ];
        }
    }

    return response()->json($respuesta);
});
});


Route::middleware(['auth'])->group(function () {
    Route::get('/access', [adminController::class, 'access'])->name('access');
    Route::get('/usuariosDatatable', [usuariosController::class, 'usuariosDatatable']);
    Route::post('/usuarioSave', [usuariosController::class, 'store']);
    Route::get('/usuarioActive', [usuariosController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/simulate/student', [AdminController::class, 'simulateStudentPanel'])->name('test.student');

    Route::get('/simulate/leave', [AdminController::class, 'leaveSimulatedPanel'])->name('test.leave');
});

Route::get('/users', [adminController::class, 'users'])->name('users');
Route::get('/enterprise', [adminController::class, 'enterprise'])->name('enterprise');
Route::get('/individual', [adminController::class, 'individual'])->name('individual');
Route::get('/membership', [adminController::class, 'membership'])->name('membership');


Route::get('/instructors', [adminController::class, 'instructors'])->name('instructors');
Route::get('/external', [adminController::class, 'external'])->name('external');
Route::get('/roles', [adminController::class, 'roles'])->name('roles');
Route::get('/recovery', [adminController::class, 'recovery'])->name('recovery');

Route::get('/reports', [adminController::class, 'reports'])->name('reports');

Route::get('/profile', [adminController::class, 'profile'])->name('profile');
Route::get('/configuration', [adminController::class, 'configuration'])->name('configuration');
Route::get('/notifications', [adminController::class, 'notifications'])->name('notifications');
Route::get('/messages', [adminController::class, 'messages'])->name('messages');

Route::get('/enviar-correo', function () {
    $mensaje = "Este es un correo enviado usando SMTP de Gmail en Laravel 8.";
    Mail::to('lperez@results-in-performance.com')->send(new Correo($mensaje));

    return 'Correo enviado correctamente.';
});
