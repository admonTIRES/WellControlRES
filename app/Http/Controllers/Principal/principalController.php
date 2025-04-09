<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
            return view('Admin.content.Admin.dashboard.dashboard')->with('user_role', 0);
        }
    }
}
