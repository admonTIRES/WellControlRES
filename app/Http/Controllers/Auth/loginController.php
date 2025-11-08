<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Project\candidate;
use App\Models\Admin\Project\Course;
use App\Models\Admin\Project\Proyect;
use App\Models\Admin\Access\UsersInformation;

use Illuminate\Support\Carbon;

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
            $profileAdministrador = UsersInformation::where('USER_ID', $user->id)->first();


            if ($profileAdministrador) {
                $roles = $profileAdministrador->ROLES_USER;

                if (is_string($roles)) {
                    $roles = json_decode($roles, true);
                }
            }
            
            $proyecto = null;
            if ($profile) {
                $proyecto = Proyect::where('ID_PROJECT', $profile->ID_PROJECT)->first();

                if ($proyecto) {
                    $now = Carbon::now();
                    $startDate = Carbon::parse($proyecto->MEMBERSHIP_START_PROJECT);
                    $endDate = Carbon::parse($proyecto->MEMBERSHIP_END_PROJECT);

                    if (!($now->greaterThanOrEqualTo($startDate) && $now->lessThanOrEqualTo($endDate))) {
                        Auth::logout(); 
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();

                        $errorMessage = (app()->getLocale() === 'es')
                            ? 'Su membresía ha expirado o aún no está disponible.'
                            : 'Your membership has expired or is not yet available.';

                       
                        return back()->withErrors(['message' => $errorMessage]);
                    }
                }
                
            }
            $profiles = Candidate::where('EMAIL_PROJECT', $user->email)->get();
            if ($profiles->count() > 0) {
                $hasActive = $profiles->contains(function ($candidate) {
                    return $candidate->ACTIVO == 1;
                });

                if (!$hasActive) {
                    Auth::logout(); 
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    $errorMessage = (app()->getLocale() === 'es')
                        ? 'Su cuenta está inactiva. Comuníquese con el administrador.'
                        : 'Your account is inactive. Please contact the administrator.';

                    return back()->withErrors(['message' => $errorMessage]);
                }
            }

            session([
                'profile_name' => $profile->FIRST_NAME_PROJECT ?? null,
                'ACCREDITING_ENTITY_PROJECT' => $proyecto->ACCREDITING_ENTITY_PROJECT ?? null,
                'ID_PROJECT' => $profile->ID_PROJECT ?? null,
                'ROLES_USER' => $roles ?? null

            ]);

            if ($user->rol === 1) { 
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
