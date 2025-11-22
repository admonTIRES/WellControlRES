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
use App\Models\Admin\catalogs\Instructor;
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
        $instructores = Instructor::all();
        $comenzarChart = 0;
        $cursoChart = 0;
        $finalizadosChart = 1;
        return view('Admin.content.Admin.projects.projects', compact('entes', 'temas', 'subtemas', 'niveles', 'bops', 'idiomas', 'operaciones', 'comenzarChart', 'cursoChart', 'finalizadosChart',  'NombreProyecto', 'instructores'))->with('user_role', 0);
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
        return view('Admin.content.Instructor.catalogs.catalogs', compact('entes', 'temas'))->with('user_role', 0);
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

    /**
     * Permite al usuario volver a su sesión de administrador.
     */
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
            $year = $request->get('year');
            $chartType = $request->get('chart_type', 'column');
            
            $backendChartType = $chartType === 'donut' ? 'pie' : $chartType;

            $query = DB::table('proyect')
                ->join('candidate', 'proyect.ID_PROJECT', '=', 'candidate.ID_PROJECT')
                ->join('entes_acreditadores', 'proyect.ACCREDITING_ENTITY_PROJECT', '=', 'entes_acreditadores.ID_CATALOGO_ENTE')
                ->select(
                    'entes_acreditadores.NOMBRE_ENTE as ente_acreditador',
                    'proyect.COURSE_START_DATE_PROJECT'
                );

            if ($startDate && $endDate) {
                $query->whereBetween('proyect.COURSE_START_DATE_PROJECT', [$startDate, $endDate]);
            } elseif ($year && $periodType !== 'year') {
                $query->whereYear('proyect.COURSE_START_DATE_PROJECT', $year);
            }

            $baseData = $query->get();
            $processedData = $this->processDataByPeriod($baseData, $periodType, $startDate, $endDate);

            return response()->json([
                'success' => true,
                'data' => $this->formatForAmCharts($processedData, $backendChartType),
                'totals' => $this->calculateTotals($processedData),
                'chart_type' => $chartType,
                'period_type' => $periodType
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener datos: ' . $e->getMessage()
            ], 500);
        }
    }

    private function processDataByPeriod($data, $periodType, $startDate = null, $endDate = null)
    {
        $groupedData = [];

        foreach ($data as $item) {
            $ente = $item->ente_acreditador;
            $date = $item->COURSE_START_DATE_PROJECT;
            
            if (!$date) continue;

            $periodKey = $this->getPeriodKey($date, $periodType, $startDate, $endDate);

            if (!isset($groupedData[$periodKey])) {
                $groupedData[$periodKey] = [
                    'periodo' => $periodKey,
                    'periodo_label' => $this->getPeriodLabel($periodKey, $periodType)
                ];
            }
            if (!isset($groupedData[$periodKey][$ente])) {
                $groupedData[$periodKey][$ente] = 0;
            }

            $groupedData[$periodKey][$ente]++;
        }

        $result = array_values($groupedData);
        usort($result, function($a, $b) use ($periodType) {
            return $this->comparePeriods($a['periodo'], $b['periodo'], $periodType);
        });

        return $result;
    }

    private function getPeriodKey($date, $periodType, $startDate, $endDate)
    {
        $timestamp = strtotime($date);
        
        switch ($periodType) {
            case 'year':
                return date('Y', $timestamp);
                
            case 'month':
                return date('Y-m', $timestamp);
                
            case 'day':
                if ($startDate && $endDate) {
                    return $this->getDateRangeKey($date, $startDate, $endDate);
                }
                return date('Y-m-d', $timestamp);
                
            default:
                return date('Y-m', $timestamp);
        }
    }

    private function getDateRangeKey($date, $startDate, $endDate)
    {
        $start = strtotime($startDate);
        $end = strtotime($endDate);
        $current = strtotime($date);
        
        $totalDays = ($end - $start) / (60 * 60 * 24);
        $daysFromStart = ($current - $start) / (60 * 60 * 24);
        
        $intervalCount = min(15, max(5, ceil($totalDays / 10)));
        $daysPerInterval = ceil($totalDays / $intervalCount);
        
        $intervalIndex = floor($daysFromStart / $daysPerInterval);
        $intervalStart = $start + ($intervalIndex * $daysPerInterval * 24 * 60 * 60);
        $intervalEnd = $intervalStart + ($daysPerInterval * 24 * 60 * 60) - 1;
        
        return date('Y-m-d', $intervalStart) . '_' . date('Y-m-d', $intervalEnd);
    }

    private function getPeriodLabel($periodKey, $periodType)
    {
        switch ($periodType) {
            case 'year':
                return $periodKey;
                
            case 'month':
                $parts = explode('-', $periodKey);
                $months = [
                    '01' => 'Ene', '02' => 'Feb', '03' => 'Mar', '04' => 'Abr',
                    '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Ago',
                    '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic'
                ];
                return $months[$parts[1]] . ' ' . $parts[0];
                
            case 'day':
                if (strpos($periodKey, '_') !== false) {
                    // Es un rango de fechas
                    list($start, $end) = explode('_', $periodKey);
                    return date('d/m', strtotime($start)) . ' - ' . date('d/m', strtotime($end));
                }
                return date('d/m/Y', strtotime($periodKey));
                
            default:
                return $periodKey;
        }
    }

    private function comparePeriods($a, $b, $periodType)
    {
        if ($periodType === 'day' && strpos($a, '_') !== false && strpos($b, '_') !== false) {
            $aStart = explode('_', $a)[0];
            $bStart = explode('_', $b)[0];
            return strcmp($aStart, $bStart);
        }
        
        return strcmp($a, $b);
    }

    private function formatForAmCharts($data, $chartType)
    {
        if (in_array($chartType, ['pie', 'donut'])) {
            return $this->formatForPieChart($data);
        }

        return $this->formatForColumnChart($data);
    }

    private function formatForColumnChart($data)
    {
        $entes = [];
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if ($key !== 'periodo' && $key !== 'periodo_label' && !in_array($key, $entes)) {
                    $entes[] = $key;
                }
            }
        }

        $formattedData = [];
        foreach ($data as $item) {
            $formattedItem = [
                'period' => $item['periodo_label'],
                'category' => $item['periodo_label']
            ];
            
            foreach ($entes as $ente) {
                $formattedItem[$ente] = $item[$ente] ?? 0;
            }
            
            $formattedData[] = $formattedItem;
        }

        return [
            'data' => $formattedData,
            'categories' => $entes
        ];
    }

    private function formatForPieChart($data)
    {
        $totals = [];
        
        foreach ($data as $periodData) {
            foreach ($periodData as $key => $value) {
                if ($key !== 'periodo' && $key !== 'periodo_label') {
                    $totals[$key] = ($totals[$key] ?? 0) + $value;
                }
            }
        }

        $formattedData = [];
        foreach ($totals as $ente => $total) {
            $formattedData[] = [
                'category' => $ente,
                'value' => $total
            ];
        }

        usort($formattedData, function($a, $b) {
            return $b['value'] - $a['value'];
        });

        return $formattedData;
    }

    private function calculateTotals($data)
    {
        $totals = [];
        $generalTotal = 0;
        
        foreach ($data as $periodData) {
            foreach ($periodData as $key => $value) {
                if ($key !== 'periodo' && $key !== 'periodo_label') {
                    $totals[$key] = ($totals[$key] ?? 0) + $value;
                    $generalTotal += $value;
                }
            }
        }

        arsort($totals);
        $totals['general'] = $generalTotal;

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

     public function getDashboardData()
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
     private function getProyectosPorEmpresa()
    {
        $proyectos = DB::table('proyect')
            ->select('COMPANIES_PROJECT')
            ->whereNotNull('COMPANIES_PROJECT')
            ->where('COMPANIES_PROJECT', '!=', '')
            ->get();

        $empresasCount = [];

        foreach ($proyectos as $proyecto) {
            $companiesData = json_decode($proyecto->COMPANIES_PROJECT, true);
            
            if (json_last_error() === JSON_ERROR_NONE && is_array($companiesData)) {
                foreach ($companiesData as $company) {
                    if (isset($company['NAME_PROJECT'])) {
                        $empresa = $company['NAME_PROJECT'];
                        if (!isset($empresasCount[$empresa])) {
                            $empresasCount[$empresa] = 0;
                        }
                        $empresasCount[$empresa]++;
                    }
                }
            } else {
                $empresa = trim($proyecto->COMPANIES_PROJECT);
                if ($empresa && $empresa != '[]') {
                    if (!isset($empresasCount[$empresa])) {
                        $empresasCount[$empresa] = 0;
                    }
                    $empresasCount[$empresa]++;
                }
            }
        }

        arsort($empresasCount);
        $topEmpresas = array_slice($empresasCount, 0, 5, true);

        return [
            'labels' => array_keys($topEmpresas),
            'series' => array_values($topEmpresas)
        ];
    }

     private function getMetricasPrincipales()
    {
        $totalProyectos = DB::table('proyect')
            ->whereNotNull('COURSE_START_DATE_PROJECT')
            ->count();

        $totalEstudiantes = DB::table('candidate')
            ->whereNotNull('ID_PROJECT')
            ->count();

        $estudiantesAprobados = DB::table('course')
            ->where('FINAL_STATUS', 'Pass')
            ->count();


        return [
            'totalProyectos' => $totalProyectos,
            'totalEstudiantes' => $totalEstudiantes,
            'estudiantesAprobados' => $estudiantesAprobados
        ];
    }

    private function formatTendenciaMensual($tendenciaMensual)
    {
        $meses = [
            1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun',
            7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic'
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
        // Obtener todos los cursos con sus candidatos
        $cursos = Course::with(['candidate' => function($query) {
            $query->select('ID_CANDIDATE', 'ID_PROJECT', 'LAST_NAME_PROJECT', 'FIRST_NAME_PROJECT', 'MIDDLE_NAME_PROJECT', 'EMAIL_PROJECT', 'ACTIVO');
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
    
}
