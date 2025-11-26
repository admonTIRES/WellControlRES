<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\catalogs\CentrosCapacitacion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/centros-capacitacion', function (Request $request) {
    $tipo = $request->get('tipo', '2');
    $fechaHoy = now()->toDateString();
    
    $centros = CentrosCapacitacion::where('TIPO_CENTRO', $tipo)
        ->where(function($query) use ($fechaHoy) {
            $query->where('VIGENCIA_HASTA_CENTRO', '>=', $fechaHoy)
                  ->orWhereNull('VIGENCIA_HASTA_CENTRO');
        })
        ->orderBy('NOMBRE_COMERCIAL_CENTRO', 'asc')
        ->get();
    
    return response()->json([
        'centros' => $centros,
        'total' => $centros->count(),
        'fecha_consulta' => $fechaHoy
    ]);
});
