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

    // Tomar primera empresa (siempre hay al menos una)
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
            // Solo el nombre (first name)
            $nombre = $estudiante['FIRST_NAME_PROJECT'] ?? 'Sin nombre';
            $datos['nombres'][] = $nombre;
            
            // Aquí deberías obtener los datos reales de tu base de datos
            // Estos son ejemplos de cómo podrías obtenerlos:
            
            $userId = $estudiante['USER_ID_PROJECT'] ?? 0;
            
            // Ejemplo: obtener datos reales de hojas completadas
            $hojas = $this->obtenerHojasCompletadas($userId);
            $datos['hojas'][] = $hojas;
            
            // Ejemplo: obtener exámenes presentados
            $examenes = $this->obtenerExamenesPresentados($userId);
            $datos['examenes'][] = $examenes;
            
            // Ejemplo: obtener inicios de sesión
            $logins = $this->obtenerIniciosSesion($userId);
            $datos['logins'][] = $logins;
            
            // Ejemplo: obtener medallas obtenidas
            $medallas = $this->obtenerMedallasObtenidas($userId);
            $datos['medallas'][] = $medallas;
        }
        
        return $datos;
    }
    
    // Métodos para obtener datos reales de la base de datos
    private function obtenerHojasCompletadas($userId)
    {
        // Ejemplo de consulta real
        // return DB::table('hojas_completadas')
        //     ->where('user_id', $userId)
        //     ->count();
        
        // Por ahora retorno datos simulados
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
        return view('Admin.content.Instructor.exercises.exercisePanel', compact('entes', 'temas', 'subtemas', 'niveles', 'bops', 'idiomas'))->with('user_role', 0);
    }
        /**
     * @return \Illuminate\View\View
     */
    public function math()
    {
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $bops = TipoBOP::all();
        return view('Admin.content.Instructor.exercises.math', compact('entes', 'niveles', 'bops'))->with('user_role', 0);
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

        return view('Admin.content.Admin.users.usersPanel' , compact('instructores'))->with('user_role', 0);
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

        return view('Admin.content.Admin.access.accessPanel' , compact('instructores'))->with('user_role', 0);
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
}
