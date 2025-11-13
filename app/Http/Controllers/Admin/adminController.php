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
}
