<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Project\candidate;
use App\Models\Admin\Project\Course;
use App\Models\Admin\Project\Proyect;


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

        $credentials = $request->only('password');
        $loginValue = $request->username;
        
        $loginAttempts = [
            ['email' => $loginValue, 'password' => $request->password],
            ['username' => $loginValue, 'password' => $request->password]
        ];

        $usuario = \App\Models\User::where('username', $loginValue)
                        ->orWhere('email', $loginValue)
                        ->first();
        
        $authenticated = false;
        foreach ($loginAttempts as $attempt) {
            if (Auth::attempt($attempt)) {
                $authenticated = true;
                break;
            }
        }

        
        
        if ($authenticated) {
            $user = Auth::user();
            
            $profile = Candidate::where('EMAIL_PROJECT', $user->email)->first();
            $proyecto = null;
            if ($profile) {
                $proyecto = Proyect::where('ID_PROJECT', $profile->ID_PROJECT)->first();
            }


            session([
                'profile_name' => $profile->FIRST_NAME_PROJECT ?? null,
                'ACCREDITING_ENTITY_PROJECT' => $proyecto->ACCREDITING_ENTITY_PROJECT ?? null,
                'ID_PROJECT' => $profile->ID_PROJECT ?? null
            ]);

            if ($user->rol === 1) { // Usuario normal
                return redirect()->intended('/')->with('user_role', 1);
            } else { // Administrador (0)
                return redirect()->intended('/')->with('user_role', 0);
            }
        }

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

    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
