<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Admin\Exercise\Question;


class principalController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->rol === 1) { // Usuario normal
            return view('Principal.principal')->with('user_role', 1);
        } else { // Administrador (0)
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


            return view('Admin.content.Admin.dashboard.dashboard', compact('visitas', 'membresiasActivas', 'membresiasEmpresas', 'membresiasIndividuales', 'historialMembresias', 'proyectosActivos', 'proyectosProximos', 'proyectosFinalizados', 'accesos', 'historialEmpresas'))->with('user_role', 0);
        }
    }
}
