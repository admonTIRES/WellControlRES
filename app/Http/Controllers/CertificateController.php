<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CertificateController extends Controller
{
   public function generateShortUrl($projectId, $candidateId, $filename)
    {
        // Crear datos concatenados
        $data = "{$projectId}|{$candidateId}|{$filename}";
        
        // Encriptar con la clave de Laravel
        $encrypted = Crypt::encryptString($data);
        
        // Convertir a base64url (seguro para URLs, sin caracteres especiales)
        $shortCode = rtrim(strtr(base64_encode($encrypted), '+/', '-_'), '=');
        
        // Retornar URL completa
        return url("/c/{$shortCode}");
    }

    /**
     * Descargar certificado usando código corto
     * 
     * @param string $shortCode
     * @return \Illuminate\Http\Response
     */
    public function download($shortCode)
    {
        try {
            // Decodificar de base64url a base64 normal
            $encrypted = base64_decode(strtr($shortCode, '-_', '+/'));
            
            // Desencriptar los datos
            $data = Crypt::decryptString($encrypted);
            
            // Separar los componentes
            list($projectId, $candidateId, $filename) = explode('|', $data);
            
            // Construir ruta completa del archivo
            $path = public_path("archivos/proyectos/{$projectId}/candidatos/{$candidateId}/{$filename}");
            
            // Verificar que el archivo existe
            if (!file_exists($path)) {
                abort(404, 'Certificado no encontrado');
            }
            
            // Retornar el archivo para visualización en navegador
            return response()->file($path, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . basename($filename) . '"',
                'Cache-Control' => 'public, max-age=3600'
            ]);
            
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(403, 'Enlace inválido o corrupto');
        } catch (\Exception $e) {
            abort(500, 'Error al procesar el certificado');
        }
    }

    /**
     * Forzar descarga del certificado (alternativa)
     * 
     * @param string $shortCode
     * @return \Illuminate\Http\Response
     */
    public function forceDownload($shortCode)
    {
        try {
            $encrypted = base64_decode(strtr($shortCode, '-_', '+/'));
            $data = Crypt::decryptString($encrypted);
            list($projectId, $candidateId, $filename) = explode('|', $data);
            
            $path = public_path("archivos/proyectos/{$projectId}/candidatos/{$candidateId}/{$filename}");
            
            if (!file_exists($path)) {
                abort(404, 'Certificado no encontrado');
            }
            
            // Forzar descarga en lugar de visualizar
            return response()->download($path, basename($filename), [
                'Content-Type' => 'application/pdf'
            ]);
            
        } catch (\Exception $e) {
            abort(403, 'Enlace inválido');
        }
    }
}
