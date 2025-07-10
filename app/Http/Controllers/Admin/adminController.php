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
    public function students()
    {
        return view('Admin.content.Instructor.students.studentsPanel')->with('user_role', 0);
    }

     /**
     * @return \Illuminate\View\View
     */

    public function projectsManagement(Request $request)
    {
        // $projectId = $request->input('project_id'); 

        // if ($projectId) {
        //     $project = Project::find($projectId);
        //     return view('admin.projects-management', compact('project'));
        // }

        $FOLIO = "RES-001";
        $NOMBRE_PROYECTO = "Nivel 2 - IWCF - PERENCO MEXICO";

        return view('Admin.content.Instructor.students.projectAdmin', compact('FOLIO', 'NOMBRE_PROYECTO'));
    }

        /**
     * @return \Illuminate\View\View
     */
    public function asignaments()
    {
        $temas = TemaPreguntas::all();
        $subtemas = SubtemaPreguntas::all();
        $entes = EnteAcreditador::all();
        $niveles = NivelAcreditacion::all();
        $bops = TipoBOP::all();
        return view('Admin.content.Instructor.students.asignaments', compact('entes', 'temas', 'subtemas', 'niveles', 'bops'))->with('user_role', 0);
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
        return view('Admin.content.Instructor.exercises.killsheets', compact('entes', 'niveles', 'bops'))->with('user_role', 0);
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
        return view('Admin.content.Admin.users.usersPanel')->with('user_role', 0);
    }
        /**
     * @return \Illuminate\View\View
     */
    public function enterprise()
    {
        return view('Admin.content.Admin.users.enterprise')->with('user_role', 0);
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
        return view('Admin.content.Admin.access.accessPanel')->with('user_role', 0);
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
        return view('Admin.content.Admin.access.roles')->with('user_role', 0);
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
