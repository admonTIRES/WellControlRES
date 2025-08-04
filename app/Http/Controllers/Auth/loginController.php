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
            'username' => 'required|string', // Este campo puede ser username o email
            'password' => 'required',
        ]);

        $credentials = $request->only('password');
        $loginValue = $request->username;
        
        // Intentar login primero por email, luego por username
        $loginAttempts = [
            ['email' => $loginValue, 'password' => $request->password],
            ['username' => $loginValue, 'password' => $request->password]
        ];
        
        $authenticated = false;
        foreach ($loginAttempts as $attempt) {
            if (Auth::attempt($attempt)) {
                $authenticated = true;
                break;
            }
        }
        
        if ($authenticated) {
            $user = Auth::user();
            
            if ($user->rol === 1) { // Usuario normal
                return redirect()->intended('/')->with('user_role', 1);
            } else { // Administrador (0)
                return redirect()->intended('/')->with('user_role', 0);
            }
        }

        // Verificar si el usuario existe por username o email
        $userExists = \App\Models\User::where('username', $loginValue)
                                    ->orWhere('email', $loginValue)
                                    ->exists();

        if (!$userExists) {
            $errorMessage = (app()->getLocale() === 'es') 
                ? 'El usuario o email no existe' 
                : 'User or email does not exist';
        } else {
            $errorMessage = (app()->getLocale() === 'es') 
                ? 'Contraseña incorrecta' 
                : 'Incorrect password';
        }

        return back()->withErrors(['message' => $errorMessage]);
    }

    //Cerrar sesión
    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Logout normal
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
