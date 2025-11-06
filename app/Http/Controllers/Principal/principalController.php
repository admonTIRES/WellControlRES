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
        
       
        $isSimulatingStudent = session()->has('original_admin_id'); 
        
        if ($user->rol === 1 || $isSimulatingStudent) { 
            
            
            $profileData = [
                'profile_name' => session('profile_name', 'Usuario de Prueba'),
                'ID_PROJECT' => session('ID_PROJECT', 'TEST-PROJECT-001'),
            ];
            
            // Retorna la vista del Usuario normal/Estudiante
            return view('Principal.principal', $profileData)->with('user_role', 1);

        } else { 
            // Administrador (0) sin simulación activa
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
