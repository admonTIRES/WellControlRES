<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//modelos
use App\Models\Admin\catalogs\EnteAcreditador;
use App\Models\Admin\catalogs\NivelAcreditacion;
use App\Models\Admin\catalogs\TipoBOP;
use App\Models\Admin\catalogs\TemaPreguntas;
use App\Models\Admin\catalogs\IdiomasExamenes;
use App\Models\Admin\catalogs\SubtemaPreguntas;
use App\Models\Admin\catalogs\Operacion;
use App\Models\Admin\Project\Proyect;
use App\Models\Admin\catalogs\NombreProyecto;
use App\Models\Admin\catalogs\CentrosCapacitacion;
use App\Models\Admin\catalogs\Clientes;
use App\Models\Admin\catalogs\Instructor;
use App\Models\Admin\catalogs\Programas;
use App\Models\Admin\catalogs\Ubicaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Project\Course;


use App\Models\User;
use App\Models\Admin\Project\candidate;




class adminController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Admin.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function dashboardInstructor()
    {
        return view('Admin.content.Instructor.dashboard.dashboard')->with('user_role', 0);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function projectsInstructor()
    {
        return view('Admin.content.Instructor.projects.projects')->with('user_role', 0);
    }

    /**
     * @return \Illuminate\View\View
     */

    public function projectsManagement($PROJECT_ID)
    {
        $proyecto = Proyect::findOrFail($PROJECT_ID);

        $FOLIO = $proyecto->FOLIO_PROJECT;
        $NOMBRE_PROYECTO = $proyecto->COURSE_NAME_ES_PROJECT;
        $empresa = $proyecto->COMPANIES_PROJECT[0] ?? null;
        $estudiantes = $empresa['STUDENTS_PROJECT'] ?? [];
        $datosGraficos = $this->prepararDatosGraficos($estudiantes);
        return view('Admin.content.Instructor.students.projectAdmin', compact(
            'FOLIO',
            'NOMBRE_PROYECTO',
            'PROJECT_ID',
            'estudiantes',
            'datosGraficos'
        ));
    }


    private function prepararDatosGraficos($estudiantes)
    {
        $datos = [
            'nombres' => [],
            'hojas' => [],
            'examenes' => [],
            'logins' => [],
            'medallas' => []
        ];

        foreach ($estudiantes as $estudiante) {
            $nombre = $estudiante['FIRST_NAME_PROJECT'] ?? 'Sin nombre';
            $datos['nombres'][] = $nombre;

            $userId = $estudiante['USER_ID_PROJECT'] ?? 0;
            $hojas = $this->obtenerHojasCompletadas($userId);
            $datos['hojas'][] = $hojas;

            $examenes = $this->obtenerExamenesPresentados($userId);
            $datos['examenes'][] = $examenes;

            $logins = $this->obtenerIniciosSesion($userId);
            $datos['logins'][] = $logins;

            $medallas = $this->obtenerMedallasObtenidas($userId);
            $datos['medallas'][] = $medallas;
        }

        return $datos;
    }

    private function obtenerHojasCompletadas($userId)
    {
        // return DB::table('hojas_completadas')
        //     ->where('user_id', $userId)
        //     ->count();

        return rand(0, 0);
    }

    private function obtenerExamenesPresentados($userId)
    {
        // return DB::table('examenes')
        //     ->where('user_id', $userId)
        //     ->where('status', 'completado')
        //     ->count();

        return rand(0, 0);
    }

    private function obtenerIniciosSesion($userId)
    {
        // return DB::table('user_sessions')
        //     ->where('user_id', $userId)
        //     ->whereDate('created_at', '>=', now()->subDays(30))
        //     ->count();

        return rand(0, 0);
    }

    private function obtenerMedallasObtenidas($userId)
    {
        // return DB::table('medallas')
        //     ->where('user_id', $userId)
        //     ->count();

        return rand(0, 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function projectsAdmin()
    {
        $temas = TemaPreguntas::all();
        $subtemas = SubtemaPreguntas::all();
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $bops = TipoBOP::all();
        $idiomas = IdiomasExamenes::all();
        $operaciones = Operacion::all();
        $NombreProyecto = NombreProyecto::all();
        $clientes = Clientes::all();
        $instructores = Instructor::all();
        $ubicaciones = Ubicaciones::all();
        // $programas = Programas::all();
        $programas = Programas::all()->map(function($programa) {
            return [
                'ID_CATALOGO_PROGRAMA' => $programa->ID_CATALOGO_PROGRAMA,
                'NOMBRE_PROGRAMA' => $programa->NOMBRE_PROGRAMA,
                'operaciones_ids' => $programa->OPERATIONS_PROGRAM ?: [],
                'niveles_ids' => $programa->LEVELS_PROGRAM ?: [],
                'bops_ids' => $programa->BOPS_PROGRAM ?: [],
                'complementos' => $programa->COMPLEMENTS_PROGRAM ?: [],
            ];
        });

      
        $comenzarChart = 0;
        $cursoChart = 0;
        $finalizadosChart = 1;
        return view('Admin.content.Admin.projects.projects', compact('entes', 'temas', 'subtemas', 'niveles', 'bops', 'idiomas', 'operaciones', 'comenzarChart', 'cursoChart', 'finalizadosChart',  'NombreProyecto', 'instructores', 'clientes', 'ubicaciones', 'programas'))->with('user_role', 0);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function studentsList()
    {
        $temas = TemaPreguntas::all();
        $subtemas = SubtemaPreguntas::all();
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $bops = TipoBOP::all();
        $idiomas = IdiomasExamenes::all();
        $operaciones = Operacion::all();
        $NombreProyecto = NombreProyecto::all();
        $clientes = Clientes::all();
        $instructores = Instructor::all();
        $comenzarChart = 0;
        $cursoChart = 0;
        $finalizadosChart = 1;
        return view('Admin.content.Admin.projects.students', compact('entes', 'temas', 'subtemas', 'niveles', 'bops', 'idiomas', 'operaciones', 'comenzarChart', 'cursoChart', 'finalizadosChart',  'NombreProyecto', 'instructores', 'clientes'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function exercises()
    {
        $temas = TemaPreguntas::all();
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $subtemas = SubtemaPreguntas::all();
        $bops = TipoBOP::all();
        $idiomas = IdiomasExamenes::all();
        $temasFiltrados = null;
        return view('Admin.content.Instructor.exercises.exercisePanel', compact('entes', 'temas', 'subtemas', 'niveles', 'bops', 'idiomas', 'temasFiltrados'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function math()
    {
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $bops = TipoBOP::all();
        $operaciones = Operacion::all();
        $idiomas = IdiomasExamenes::all();
        return view('Admin.content.Instructor.exercises.math', compact('entes', 'niveles', 'bops', 'operaciones', 'idiomas'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function killsheets()
    {
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $bops = TipoBOP::all();
        $operaciones = Operacion::all();
        $idiomas = IdiomasExamenes::all();

        return view('Admin.content.Instructor.exercises.killsheets', compact('entes', 'niveles', 'bops', 'operaciones', 'idiomas'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function catalogs()
    {
        $temas = TemaPreguntas::all();
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $bops = TipoBOP::all();
        $operaciones = Operacion::all();
        // $centros = CentrosCapacitacion::where('TIPO_CENTRO', '2')->get();
        return view('Admin.content.Instructor.catalogs.catalogs', compact('entes', 'temas', 'niveles', 'bops', 'operaciones'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function users()
    {
        $instructores = Instructor::all();

        return view('Admin.content.Admin.users.usersPanel', compact('instructores'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function enterprise()
    {
        return view('Admin.content.Admin.users.enterprice')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function individual()
    {
        return view('Admin.content.Admin.users.individual')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function membership()
    {
        return view('Admin.content.Admin.users.membership')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function access()
    {
        $instructores = Instructor::all();

        return view('Admin.content.Admin.access.accessPanel', compact('instructores'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function instructors()
    {
        return view('Admin.content.Admin.access.instructors')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function external()
    {
        return view('Admin.content.Admin.access.external')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function roles()
    {
        $instructores = Instructor::all();
        return view('Admin.content.Admin.access.roles', compact('instructores'))->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function recovery()
    {
        return view('Admin.content.Admin.access.recoveryPassword')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function reports()
    {
        return view('Admin.content.Admin.reports.reports')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('Admin.content.Public.profile')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function configuration()
    {
        return view('Admin.content.Public.configuration')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('Admin.content.Public.notifications')->with('user_role', 0);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function messages()
    {
        return view('Admin.content.Public.messages')->with('user_role', 0);
    }

    /**
     * Permite al administrador iniciar sesión como un estudiante.
     */
    public function simulateStudentPanel(Request $request)
    {
        $adminUser = Auth::user();
        if ($adminUser->rol !== 0) {
            // return redirect('/')->with('error', 'Acceso denegado.');
        }

        $request->session()->put('original_admin_id', $adminUser->id);
        $request->session()->put('original_admin_roles', $request->session()->get('ROLES_USER'));

        $request->session()->forget(['ROLES_USER', 'profile_name', 'ACCREDITING_ENTITY_PROJECT', 'ID_PROJECT']);

        session([
            'profile_name' => 'Usuario de Prueba',
            'ID_PROJECT' => 'TEST-PROJECT-001',
            'ACCREDITING_ENTITY_PROJECT' => 'Entidad de Prueba',
        ]);

        return redirect()->intended('/')->with('simulating', true);
    }

    public function leaveSimulatedPanel(Request $request)
    {
        if (!$request->session()->has('original_admin_id')) {
            return redirect('/');
        }

        $originalAdminId = $request->session()->get('original_admin_id');
        $originalAdminRoles = $request->session()->pull('original_admin_roles');


        $request->session()->forget([
            'original_admin_id',
            'profile_name',
            'ID_PROJECT',
            'ACCREDITING_ENTITY_PROJECT'
        ]);

        session([
            'ROLES_USER' => $originalAdminRoles,
            'profile_name' => 'Administrador',
        ]);

        return redirect()->intended('/');
    }

    public function getCandidateStats(Request $request)
    {
        try {
            $periodType = $request->get('period_type', 'month');
            $startDate = $request->get('start_date');
            $endDate = $request->get('end_date');
            $startYear = $request->get('start_year');
            $endYear = $request->get('end_year');
            $chartType = $request->get('chart_type', 'column');

            $backendChartType = $chartType === 'donut' ? 'pie' : $chartType;

            $query = DB::table('proyect')
                ->join('candidate', 'proyect.ID_PROJECT', '=', 'candidate.ID_PROJECT')
                ->join('entes_acreditadores', function ($join) {
                    $join->on(DB::raw('CAST(proyect.ACCREDITING_ENTITY_PROJECT AS UNSIGNED)'), '=', 'entes_acreditadores.ID_CATALOGO_ENTE');
                })
                ->select(
                    'entes_acreditadores.NOMBRE_ENTE as ente_acreditador',
                    'proyect.COURSE_START_DATE_PROJECT',
                    'candidate.ID_CANDIDATE'
                )
                ->whereNotNull('proyect.COURSE_START_DATE_PROJECT')
                ->where('proyect.ACCREDITING_ENTITY_PROJECT', '!=', '');

            if ($periodType === 'year' && $startYear && $endYear) {
                $query->whereYear('proyect.COURSE_START_DATE_PROJECT', '>=', $startYear)
                    ->whereYear('proyect.COURSE_START_DATE_PROJECT', '<=', $endYear);
            } elseif ($startDate && $endDate) {
                $query->whereBetween('proyect.COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
            }

            $baseData = $query->get();
            $processedData = $this->processDataByPeriod($baseData, $periodType);

            return response()->json([
                'success' => true,
                'data' => $this->formatForAmCharts($processedData, $backendChartType),
                'totals' => $this->calculateTotals($processedData),
                'chart_type' => $chartType,
                'period_type' => $periodType
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in getCandidateStats: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Error al obtener datos: ' . $e->getMessage()
            ], 500);
        }
    }

    private function processDataByPeriod($data, $periodType)
    {
        $grouped = [];

        foreach ($data as $record) {
            if (empty($record->COURSE_START_DATE_PROJECT)) {
                \Log::warning('Registro sin fecha de inicio de curso');
                continue;
            }

            $date = $record->COURSE_START_DATE_PROJECT;
            $acreditador = !empty($record->ente_acreditador) ? trim($record->ente_acreditador) : 'Sin Acreditador';

            try {
                $timestamp = strtotime($date);
                if ($timestamp === false) {
                    \Log::error('Fecha inválida: ' . $date);
                    continue;
                }

                if ($periodType === 'year') {
                    $period = date('Y', $timestamp);
                } elseif ($periodType === 'month') {
                    $period = date('M Y', $timestamp);
                } else {
                    $period = date('d M Y', $timestamp);
                }
            } catch (\Exception $e) {
                \Log::error('Error processing date: ' . $date . ' - ' . $e->getMessage());
                continue;
            }

            if (!isset($grouped[$period])) {
                $grouped[$period] = [];
            }

            if (!isset($grouped[$period][$acreditador])) {
                $grouped[$period][$acreditador] = 0;
            }

            $grouped[$period][$acreditador]++;
        }

        \Log::info('Grouped data: ' . json_encode($grouped));

        return $grouped;
    }

    private function formatForAmCharts($processedData, $chartType)
    {
        $formatted = [];

        foreach ($processedData as $period => $acreditadores) {
            $periodStr = trim((string)$period);
            if (empty($periodStr)) {
                continue;
            }

            $row = ['period' => $periodStr];

            foreach ($acreditadores as $acreditador => $count) {
                $acreditadorStr = trim((string)$acreditador);
                if (!empty($acreditadorStr)) {
                    $row[$acreditadorStr] = (int)$count;
                }
            }

            if (count($row) > 1) {
                $formatted[] = $row;
            }
        }

        usort($formatted, function ($a, $b) {
            $periodA = $a['period'];
            $periodB = $b['period'];

            if (preg_match('/^\d{4}$/', $periodA) && preg_match('/^\d{4}$/', $periodB)) {
                return (int)$periodA - (int)$periodB;
            }

            $timeA = strtotime($periodA);
            $timeB = strtotime($periodB);

            if ($timeA !== false && $timeB !== false) {
                return $timeA - $timeB;
            }

            return strcmp($periodA, $periodB);
        });

        // Log para debug
        \Log::info('Formatted data for AmCharts: ' . json_encode($formatted));

        return $formatted;
    }

    private function calculateTotals($processedData)
    {
        $totals = [
            'por_acreditador' => [],
            'total_general' => 0
        ];

        foreach ($processedData as $period => $acreditadores) {
            foreach ($acreditadores as $acreditador => $count) {
                if (!isset($totals['por_acreditador'][$acreditador])) {
                    $totals['por_acreditador'][$acreditador] = 0;
                }
                $totals['por_acreditador'][$acreditador] += $count;
                $totals['total_general'] += $count;
            }
        }

        return $totals;
    }


    public function getAvailableYears()
    {
        $years = DB::table('proyect')
            ->select(DB::raw('DISTINCT YEAR(COURSE_START_DATE_PROJECT) as year'))
            ->whereNotNull('COURSE_START_DATE_PROJECT')
            ->orderBy('year', 'desc')
            ->pluck('year');

        return response()->json([
            'success' => true,
            'years' => $years
        ]);
    }

    public function getDashboardData(Request $request)
    {
        try {
            $periodType = $request->get('period_type', 'month');
            $startDate = $request->get('start_date');
            $endDate = $request->get('end_date');
            $startYear = $request->get('start_year');
            $endYear = $request->get('end_year');
            $chartType = $request->get('chart_type', 'column');

            $applyDateFilter = function ($query) use ($periodType, $startDate, $endDate, $startYear, $endYear) {
                if ($periodType === 'year' && $startYear && $endYear) {
                    $query->whereYear('proyect.COURSE_START_DATE_PROJECT', '>=', $startYear)
                        ->whereYear('proyect.COURSE_START_DATE_PROJECT', '<=', $endYear);
                } elseif ($startDate && $endDate) {
                    $query->whereBetween('proyect.COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
                }
                return $query;
            };

            $totalProyectosQuery = DB::table('proyect')
                ->whereNotNull('COURSE_START_DATE_PROJECT');

            $totalProyectosQuery = $applyDateFilter($totalProyectosQuery);
            $totalProyectos = $totalProyectosQuery->count();

            $totalEstudiantesQuery = DB::table('candidate')
                ->join('proyect', 'candidate.ID_PROJECT', '=', 'proyect.ID_PROJECT')
                ->whereNotNull('candidate.ID_PROJECT');

            $totalEstudiantesQuery = $applyDateFilter($totalEstudiantesQuery);
            $totalEstudiantes = $totalEstudiantesQuery->count();

            $totalDesercionQuery = DB::table('candidate')
                ->join('proyect', 'candidate.ID_PROJECT', '=', 'proyect.ID_PROJECT')
                ->where('candidate.ASISTENCIA', '=', 0)
                ->whereNotNull('candidate.ID_PROJECT');

            $totalDesercionQuery = $applyDateFilter($totalDesercionQuery);
            $totalDesercion = $totalDesercionQuery->count();

            $estudiantesAprobadosQuery = DB::table('course')
                ->join('proyect', 'course.ID_PROJECT', '=', 'proyect.ID_PROJECT')
                ->where('course.FINAL_STATUS', 'Pass');

            $estudiantesAprobadosQuery = $applyDateFilter($estudiantesAprobadosQuery);
            $estudiantesAprobados = $estudiantesAprobadosQuery->count();

            $metricas = [
                'totalProyectos' => $totalProyectos,
                'totalEstudiantes' => $totalEstudiantes,
                'estudiantesAprobados' => $estudiantesAprobados,
                'totalDesercion' => $totalDesercion
            ];

            $proyectosAcreditacionQuery = DB::table('proyect')
                ->join('entes_acreditadores', 'proyect.ACCREDITING_ENTITY_PROJECT', '=', 'entes_acreditadores.ID_CATALOGO_ENTE')
                ->select('entes_acreditadores.NOMBRE_ENTE', DB::raw('COUNT(*) as total'))
                ->whereNotNull('proyect.COURSE_START_DATE_PROJECT');

            $proyectosAcreditacionQuery = $applyDateFilter($proyectosAcreditacionQuery);
            $proyectosAcreditacion = $proyectosAcreditacionQuery
                ->groupBy('entes_acreditadores.NOMBRE_ENTE')
                ->orderByDesc('total')
                ->get();

            $proyectosAnioQuery = DB::table('proyect')
                ->select(DB::raw('YEAR(COURSE_START_DATE_PROJECT) as year'), DB::raw('COUNT(*) as total'))
                ->whereNotNull('COURSE_START_DATE_PROJECT');

            $proyectosAnioQuery = $applyDateFilter($proyectosAnioQuery);
            $proyectosAnio = $proyectosAnioQuery
                ->groupBy(DB::raw('YEAR(COURSE_START_DATE_PROJECT)'))
                ->orderBy('year')
                ->get();

            $proyectosEmpresa = $this->getProyectosPorEmpresa($periodType, $startDate, $endDate, $startYear, $endYear);

            $proyectosTipoCursoQuery = DB::table('proyect')
                ->select('COURSE_TYPE_PROJECT', DB::raw('COUNT(*) as total'))
                ->whereNotNull('COURSE_TYPE_PROJECT')
                ->where('COURSE_TYPE_PROJECT', '!=', '');

            $proyectosTipoCursoQuery = $applyDateFilter($proyectosTipoCursoQuery);
            $proyectosTipoCurso = $proyectosTipoCursoQuery
                ->groupBy('COURSE_TYPE_PROJECT')
                ->orderByDesc('total')
                ->get();

            $tendenciaMensualQuery = DB::table('proyect')
                ->select(
                    DB::raw('YEAR(COURSE_START_DATE_PROJECT) as year'),
                    DB::raw('MONTH(COURSE_START_DATE_PROJECT) as month'),
                    DB::raw('COUNT(*) as total')
                )
                ->whereNotNull('COURSE_START_DATE_PROJECT');

            if ($periodType === 'year' && $startYear && $endYear) {
                $tendenciaMensualQuery->whereYear('COURSE_START_DATE_PROJECT', '>=', $startYear)
                    ->whereYear('COURSE_START_DATE_PROJECT', '<=', $endYear);
            } elseif ($startDate && $endDate) {
                $tendenciaMensualQuery->whereBetween('COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
            } else {
                $tendenciaMensualQuery->whereYear('COURSE_START_DATE_PROJECT', date('Y'));
            }

            $tendenciaMensual = $tendenciaMensualQuery
                ->groupBy(DB::raw('YEAR(COURSE_START_DATE_PROJECT)'), DB::raw('MONTH(COURSE_START_DATE_PROJECT)'))
                ->orderBy('year')
                ->orderBy('month')
                ->get();

            // AQUI VA LO DE LA GRAFICA DE BARRAS (chardiv)
            $backendChartType = $chartType === 'donut' ? 'pie' : $chartType;

            $query = DB::table('proyect')
                ->join('entes_acreditadores', function ($join) {
                    $join->on(DB::raw('CAST(proyect.ACCREDITING_ENTITY_PROJECT AS UNSIGNED)'), '=', 'entes_acreditadores.ID_CATALOGO_ENTE');
                })
                ->select(
                    'entes_acreditadores.NOMBRE_ENTE as ente_acreditador',
                    'proyect.COURSE_START_DATE_PROJECT',
                    'proyect.ID_PROJECT'
                )
                ->whereNotNull('proyect.COURSE_START_DATE_PROJECT')
                ->where('proyect.ACCREDITING_ENTITY_PROJECT', '!=', '');

            if ($periodType === 'year' && $startYear && $endYear) {
                $query->whereYear('proyect.COURSE_START_DATE_PROJECT', '>=', $startYear)
                    ->whereYear('proyect.COURSE_START_DATE_PROJECT', '<=', $endYear);
            } elseif ($startDate && $endDate) {
                $query->whereBetween('proyect.COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
            }

            $baseData = $query->get();
            $processedData = $this->processDataByPeriod($baseData, $periodType);
            // AQUI TERMINA LO DE BARRAS (chardiv)
            //aqui empieza la data de las circulares de estudiantes
            $cursosQuery = Course::with(['candidate' => function ($query) {
                $query->select('ID_CANDIDATE', 'ID_PROJECT', 'LAST_NAME_PROJECT', 'FIRST_NAME_PROJECT', 'MIDDLE_NAME_PROJECT', 'EMAIL_PROJECT', 'ACTIVO', 'ASISTENCIA')
                    ->where('ASISTENCIA', '!=', '0')
                    ->orWhereNull('ASISTENCIA');
            }])
                ->join('proyect', 'course.ID_PROJECT', '=', 'proyect.ID_PROJECT');

            // Aplicar filtros de fecha a los cursos
            if ($periodType === 'year' && $startYear && $endYear) {
                $cursosQuery->whereYear('proyect.COURSE_START_DATE_PROJECT', '>=', $startYear)
                    ->whereYear('proyect.COURSE_START_DATE_PROJECT', '<=', $endYear);
            } elseif ($startDate && $endDate) {
                $cursosQuery->whereBetween('proyect.COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
            }

            $cursos = $cursosQuery->get();

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
            //aqui terminan la data de ciruclares
            //aqui empieaza la ultima de estudiantes opor acreditacion
            $query = DB::table('proyect')
                ->join('candidate', 'proyect.ID_PROJECT', '=', 'candidate.ID_PROJECT')
                ->join('entes_acreditadores', function ($join) {
                    $join->on(DB::raw('CAST(proyect.ACCREDITING_ENTITY_PROJECT AS UNSIGNED)'), '=', 'entes_acreditadores.ID_CATALOGO_ENTE');
                })
                ->select(
                    'entes_acreditadores.NOMBRE_ENTE as ente_acreditador',
                    'proyect.COURSE_START_DATE_PROJECT',
                    'candidate.ID_CANDIDATE'
                )
                ->whereNotNull('proyect.COURSE_START_DATE_PROJECT')
                ->where('proyect.ACCREDITING_ENTITY_PROJECT', '!=', '')
                ->where('candidate.ASISTENCIA', '!=', '0')
                ->orWhereNull('candidate.ASISTENCIA');

            if ($periodType === 'year' && $startYear && $endYear) {
                $query->whereYear('proyect.COURSE_START_DATE_PROJECT', '>=', $startYear)
                    ->whereYear('proyect.COURSE_START_DATE_PROJECT', '<=', $endYear);
            } elseif ($startDate && $endDate) {
                $query->whereBetween('proyect.COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
            }

            $baseData2 = $query->get();
            $processedData2 = $this->processDataByPeriod($baseData2, $periodType);
            //aqui termina estudiantes por acreditacion
            $datosFormateados = [
                'metricas' => $metricas,
                'acreditacion' => [
                    'labels' => $proyectosAcreditacion->pluck('NOMBRE_ENTE')->toArray(),
                    'series' => $proyectosAcreditacion->pluck('total')->toArray()
                ],
                'proyectosAnio' => [
                    'labels' => $proyectosAnio->pluck('year')->toArray(),
                    'series' => $proyectosAnio->pluck('total')->toArray()
                ],
                'proyectosEmpresa' => $proyectosEmpresa,
                'tipoCurso' => [
                    'labels' => $proyectosTipoCurso->pluck('COURSE_TYPE_PROJECT')->toArray(),
                    'series' => $proyectosTipoCurso->pluck('total')->toArray()
                ],
                'tendenciaMensual' => $this->formatTendenciaMensual($tendenciaMensual),
                'dataChartdiv' => $this->formatForAmCharts($processedData, $backendChartType),
                'totals' => $this->calculateTotals($processedData), //pertenece a chartdiv
                'chart_type' => $chartType, //pertenece a chartdiv
                'period_type' => $periodType, //pertenece a chartdiv
                'dataChartdivStacked' => $this->formatForAmCharts($processedData2, $backendChartType), //pertenece a chart ultimo
                'totalsChartdivStacked' => $this->calculateTotals($processedData2) //same del de arriba
            ];

            return response()->json([
                'success' => true,
                'estudiantes' => $estudiantes,
                'total' => count($estudiantes),
                'data' => $datosFormateados
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener datos: ' . $e->getMessage()
            ], 500);
        }
    }

    private function getProyectosPorEmpresa($periodType = null, $startDate = null, $endDate = null, $startYear = null, $endYear = null)
    {
        $query = DB::table('candidate')
            ->join('proyect', 'candidate.ID_PROJECT', '=', 'proyect.ID_PROJECT')
            ->join('costumers', 'candidate.COMPANY_ID_PROJECT', '=', 'costumers.ID_CATALOGO_CLIENTE')
            ->select(
                'costumers.ID_CATALOGO_CLIENTE',
                'costumers.NOMBRE_COMERCIAL_CLIENTE as empresa',
                DB::raw('COUNT(DISTINCT proyect.ID_PROJECT) as total_proyectos')
            )
            ->whereNotNull('candidate.COMPANY_ID_PROJECT')
            ->whereNotNull('candidate.ID_PROJECT')
            ->where('candidate.COMPANY_ID_PROJECT', '!=', '')
            ->where('candidate.COMPANY_ID_PROJECT', '!=', 0)
            ->whereNotNull('proyect.COURSE_START_DATE_PROJECT');

        // Aplicar filtros de fecha según el tipo de periodo
        $hasYearFilter = ($periodType === 'year' && !empty($startYear) && !empty($endYear));
        $hasDateFilter = (!empty($startDate) && !empty($endDate));

        if ($hasYearFilter) {
            $query->whereYear('proyect.COURSE_START_DATE_PROJECT', '>=', $startYear)
                ->whereYear('proyect.COURSE_START_DATE_PROJECT', '<=', $endYear);
        } elseif ($hasDateFilter) {
            $query->whereBetween('proyect.COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
        }

        $empresasCount = $query
            ->groupBy('costumers.ID_CATALOGO_CLIENTE', 'costumers.NOMBRE_COMERCIAL_CLIENTE')
            ->orderByDesc('total_proyectos')
            ->limit(5)
            ->get();

        return [
            'labels' => $empresasCount->pluck('empresa')->toArray(),
            'series' => $empresasCount->pluck('total_proyectos')->toArray()
        ];
    }

    private function getMetricasPrincipales()
    {
        $totalProyectos = DB::table('proyect')
            ->whereNotNull('COURSE_START_DATE_PROJECT')
            ->count();

        $totalEstudiantes = DB::table('candidate')
            ->where('ASISTENCIA', '!=', 0)
            ->whereNotNull('ID_PROJECT')
            ->count();

        $totalDesercion = DB::table('candidate')
            ->where('ASISTENCIA', '=', 0)
            ->whereNotNull('ID_PROJECT')
            ->count();

        $estudiantesAprobados = DB::table('course')
            ->where('FINAL_STATUS', 'Pass')
            ->count();


        return [
            'totalProyectos' => $totalProyectos,
            'totalEstudiantes' => $totalEstudiantes,
            'estudiantesAprobados' => $estudiantesAprobados,
            'totalDesercion' => $totalDesercion
        ];
    }
    private function formatTendenciaMensual($tendenciaMensual)
    {
        $meses = [
            1 => 'Ene',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Abr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Ago',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dic'
        ];

        $datosCompletos = [];
        $seriesCompletos = [];

        foreach ($meses as $numero => $nombre) {
            $datosCompletos[$numero] = [
                'month' => $nombre,
                'total' => 0
            ];
        }

        foreach ($tendenciaMensual as $mes) {
            if (isset($datosCompletos[$mes->month])) {
                $datosCompletos[$mes->month]['total'] = $mes->total;
            }
        }

        $labels = [];
        $series = [];

        foreach ($datosCompletos as $mes) {
            $labels[] = $mes['month'];
            $series[] = $mes['total'];
        }

        return [
            'labels' => $labels,
            'series' => $series
        ];
    }
    public function getAllCoursesData()
    {
        try {
            $cursos = Course::with(['candidate' => function ($query) {
                $query->select('ID_CANDIDATE', 'ID_PROJECT', 'LAST_NAME_PROJECT', 'FIRST_NAME_PROJECT', 'MIDDLE_NAME_PROJECT', 'EMAIL_PROJECT', 'ACTIVO', 'ASISTENCIA')
                    ->where('ASISTENCIA', '!=', '0')
                    ->orWhereNull('ASISTENCIA');
            }])->get();

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

            return response()->json([
                'success' => true,
                'estudiantes' => $estudiantes,
                'total' => count($estudiantes)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos: ' . $e->getMessage(),
                'estudiantes' => []
            ], 500);
        }
    }
    public function estadisticasGeneral()
    {
        try {
            // Obtener todos los cursos con sus candidatos
            $cursos = Course::with(['candidate' => function ($query) {
                $query->select(
                    'ID_CANDIDATE',
                    'ID_PROJECT',
                    'COMPANY_PROJECT',
                    'LAST_NAME_PROJECT',
                    'FIRST_NAME_PROJECT'
                );
            }])->get();

            $resultado = [];

            foreach ($cursos as $curso) {
                $resultado[] = [
                    'equipo_pass' => $curso->EQUIPAMENT_PASS ?? null,
                    'py_pass' => $curso->PYP_PASS ?? null,
                    'resit_inmediato' => $curso->RESIT_INMEDIATO_STATUS ?? null,
                    'resit_programado' => $curso->RESIT_PROGRAMADO_STATUS ?? null,
                    'final_status' => $curso->FINAL_STATUS ?? null
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $resultado,
                'total' => count($resultado)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener estadísticas: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function getDashboardDataTotals()
    {
        try {

            $metricas = $this->getMetricasPrincipales();
            $proyectosAcreditacion = DB::table('proyect')
                ->join('entes_acreditadores', 'proyect.ACCREDITING_ENTITY_PROJECT', '=', 'entes_acreditadores.ID_CATALOGO_ENTE')
                ->select('entes_acreditadores.NOMBRE_ENTE', DB::raw('COUNT(*) as total'))
                ->whereNotNull('proyect.COURSE_START_DATE_PROJECT')
                ->groupBy('entes_acreditadores.NOMBRE_ENTE')
                ->orderByDesc('total')
                ->get();

            $proyectosAnio = DB::table('proyect')
                ->select(DB::raw('YEAR(COURSE_START_DATE_PROJECT) as year'), DB::raw('COUNT(*) as total'))
                ->whereNotNull('COURSE_START_DATE_PROJECT')
                ->groupBy(DB::raw('YEAR(COURSE_START_DATE_PROJECT)'))
                ->orderBy('year')
                ->get();

            $proyectosEmpresa = $this->getProyectosPorEmpresa();

            $proyectosTipoCurso = DB::table('proyect')
                ->select('COURSE_TYPE_PROJECT', DB::raw('COUNT(*) as total'))
                ->whereNotNull('COURSE_TYPE_PROJECT')
                ->where('COURSE_TYPE_PROJECT', '!=', '')
                ->groupBy('COURSE_TYPE_PROJECT')
                ->orderByDesc('total')
                ->get();

            $tendenciaMensual = DB::table('proyect')
                ->select(
                    DB::raw('MONTH(COURSE_START_DATE_PROJECT) as month'),
                    DB::raw('COUNT(*) as total')
                )
                ->whereNotNull('COURSE_START_DATE_PROJECT')
                ->whereYear('COURSE_START_DATE_PROJECT', date('Y'))
                ->groupBy(DB::raw('MONTH(COURSE_START_DATE_PROJECT)'))
                ->orderBy('month')
                ->get();

            $datosFormateados = [
                'metricas' => $metricas,
                'acreditacion' => [
                    'labels' => $proyectosAcreditacion->pluck('NOMBRE_ENTE')->toArray(),
                    'series' => $proyectosAcreditacion->pluck('total')->toArray()
                ],
                'proyectosAnio' => [
                    'labels' => $proyectosAnio->pluck('year')->toArray(),
                    'series' => $proyectosAnio->pluck('total')->toArray()
                ],
                'proyectosEmpresa' => [
                    'labels' => $proyectosEmpresa['labels'],
                    'series' => $proyectosEmpresa['series']
                ],
                'tipoCurso' => [
                    'labels' => $proyectosTipoCurso->pluck('COURSE_TYPE_PROJECT')->toArray(),
                    'series' => $proyectosTipoCurso->pluck('total')->toArray()
                ],
                'tendenciaMensual' => $this->formatTendenciaMensual($tendenciaMensual)
            ];

            return response()->json([
                'success' => true,
                'data' => $datosFormateados
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener datos: ' . $e->getMessage()
            ], 500);
        }
    }
}
