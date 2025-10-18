<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use DB;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin\Access\UsersInformation;

class usuariosController extends Controller
{
    public function usuariosDatatable()
{
    try {
        $usuarios = DB::table('user_information as ui')
            ->join('users as u', 'ui.ID_USER', '=', 'u.id')
            ->select('ui.*', 'u.username', 'u.email', 'u.rol')
            ->get();

        foreach ($usuarios as $value) {
            if ($value->ACTIVO_USER == 0) {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                                    <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_USER . '">
                                                                </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
                                                                    <span class="btn-inner">
                                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                </button>';
                } else {
                    $value->BTN_ACTIVO = '<div class="form-check form-switch">
                                                <input class="form-check-input ACTIVAR" type="checkbox" data-id="' . $value->ID_USER . '" checked>
                                            </div>';
                    $value->BTN_EDITAR = ' <button type="button" class="btn btn-sm btn-icon btn-warning EDITAR" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#entesModal">
                                                                    <span class="btn-inner">
                                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                </button>';
                }
        }

        return response()->json([
            'data' => $usuarios,
            'msj' => 'Usuarios cargados correctamente'
        ]);
    } catch (Exception $e) {
        return response()->json([
            'msj' => 'Error: ' . $e->getMessage(),
            'data' => []
        ]);
    }
}

    public function store(Request $request)
    {
        try {
            if (intval($request->api) === 1) {
                $email = $request->email ?? null;
                $username = $request->username ?? null;
                $password = $request->password ?? null;

                if (!$email || !$username || !$password) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Faltan datos obligatorios'
                    ], 422);
                }

                // Revisar si el usuario ya existe
                $existingUser = DB::table('users')->where('email', $email)->first();
                if ($existingUser) {
                    $userId = $existingUser->id;
                } else {
                    $userId = DB::table('users')->insertGetId([
                        'username'   => $username,
                        'email'      => $email,
                        'password'   => Hash::make($password),
                        'rol'        => 2, // Rol por defecto
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }

                // Insertar en user_information
                DB::table('user_information')->updateOrInsert(
                    ['ID_USER' => $userId],
                    [
                        'FNAME_USER'      => $request->FNAME_USER,
                        'MDNAME_USER'     => $request->MDNAME_USER,
                        'LSNAME_USER'     => $request->LSNAME_USER,
                        'INSTRUCTOR_USER' => $request->INSTRUCTOR_USER,
                        'INSTRUCTOR_ID'   => $request->INSTRUCTOR_ID,
                        'ROLES_USER'      => $request->ROLES_USER,
                        'ACTIVO_USER'     => 1,
                        'created_at'      => now(),
                        'updated_at'      => now()
                    ]
                );

                // Traer datos completos para enviar de vuelta
                $usuario = DB::table('user_information as ui')
                    ->join('users as u', 'ui.ID_USER', '=', 'u.id')
                    ->select('ui.*', 'u.username', 'u.email', 'u.rol')
                    ->where('ui.ID_USER', $userId)
                    ->first();

                return response()->json([
                    'code' => 1,
                    'usuario' => $usuario
                ]);
            }

            return response()->json([
                'code' => 0,
                'msj' => 'API no encontrada'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Error interno: ' . $e->getMessage()
            ], 500);
        }
    }

}
