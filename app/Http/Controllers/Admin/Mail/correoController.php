<?php

namespace App\Http\Controllers\Admin\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class correoController extends Controller
{
    public function enviarCredenciales(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'fechaInicio' => 'required|date_format:Y-m-d H:i:s', 
            'fechaFin' => 'required|date_format:Y-m-d H:i:s', 
        ]);

        try {
            Mail::to($request->email)->send(new \App\Mail\CredencialesEstudiante($request->nombre, $request->password, $request->email, $request->fechaInicio, $request->fechaFin));

            return response()->json(['msj' => 'Correo enviado exitosamente.']);
        } catch (\Exception $e) {
            return response()->json(['msj' => 'Error al enviar el correo: ' . $e->getMessage()], 500);
        }
    }
}
