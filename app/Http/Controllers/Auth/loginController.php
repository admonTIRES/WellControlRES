<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            
            if ($user->rol === 1) { // Usuario normal
                return redirect()->intended('/')->with('user_role', 1);
            } else { // Administrador (0)
                return redirect()->intended('/')->with('user_role', 0);
            }
        }
    
        $userExists = \App\Models\User::where('username', $request->username)->exists();
    
        if (!$userExists) {
            $errorMessage = (app()->getLocale() === 'es') ? 'El usuario no existe' : 'User does not exist';
        } elseif ($userExists) {
            $errorMessage = (app()->getLocale() === 'es') ? 'Contraseña incorrecta' : 'Incorrect password';
        } else {
            $errorMessage = (app()->getLocale() === 'es') ? 'Error desconocido' : 'Unknown error';
        }
    
    
        return back()->withErrors(['message' => $errorMessage]); // Devuelve el error
    }
    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
