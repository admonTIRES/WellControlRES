<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class CertificateController extends Controller
{
    
 /**
     * 
     * @param int $projectId
     * @param int $candidateId
     * @param string $filename
     * @return string
     */
    public function generateShortUrl($projectId, $candidateId, $filename)
    {
        $data = "{$projectId}|{$candidateId}|{$filename}";
        
        $encrypted = Crypt::encryptString($data);
        
        $shortCode = str_replace(['+', '/', '='], ['-', '_', ''], $encrypted);
        
        return url("/c/{$shortCode}");
    }

    /**
     * 
     * @param string $shortCode
     * @return \Illuminate\Http\Response
     */
    public function download($shortCode)
    {
        try {
            $base64 = str_replace(['-', '_'], ['+', '/'], $shortCode);
            
            $remainder = strlen($base64) % 4;
            if ($remainder) {
                $base64 .= str_repeat('=', 4 - $remainder);
            }
            
            Log::info("ShortCode recibido: {$shortCode}");
            Log::info("Base64 restaurado: {$base64}");
            
            $data = Crypt::decryptString($base64);
            
            Log::info("Datos desencriptados: {$data}");
            
            $parts = explode('|', $data);
            
            if (count($parts) !== 3) {
                Log::error("Formato inválido. Partes encontradas: " . count($parts));
                abort(403, 'Formato de enlace inválido');
            }
            
            list($projectId, $candidateId, $filename) = $parts;
            
            $filename = basename($filename);
            
            $storagePath = storage_path("app/admin/projects/{$projectId}/candidates/{$candidateId}/{$filename}");
            
            Log::info("Buscando archivo en: {$storagePath}");
            
            if (!file_exists($storagePath)) {
                Log::error("Archivo no encontrado: {$storagePath}");
                abort(404, 'Certificado no encontrado');
            }
            
            if (!is_file($storagePath)) {
                Log::error("La ruta no es un archivo válido: {$storagePath}");
                abort(403, 'Ruta inválida');
            }
            
            Log::info("Archivo encontrado. Tamaño: " . filesize($storagePath) . " bytes");
            
            return response()->file($storagePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
                'Cache-Control' => 'public, max-age=3600'
            ]);
            
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            Log::error("Error de desencriptación: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            abort(403, 'Enlace inválido o corrupto');
        } catch (\Exception $e) {
            Log::error("Error general: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            abort(500, 'Error al procesar el certificado: ' . $e->getMessage());
        }
    }

    /**
     * 
     * @param string $shortCode
     * @return \Illuminate\Http\Response
     */
    public function forceDownload($shortCode)
    {
        try {
            $base64 = str_replace(['-', '_'], ['+', '/'], $shortCode);
            
            $remainder = strlen($base64) % 4;
            if ($remainder) {
                $base64 .= str_repeat('=', 4 - $remainder);
            }
            
            $data = Crypt::decryptString($base64);
            
            $parts = explode('|', $data);
            if (count($parts) !== 3) {
                abort(403, 'Formato de enlace inválido');
            }
            
            list($projectId, $candidateId, $filename) = $parts;
            $filename = basename($filename);
            
            $storagePath = storage_path("app/admin/projects/{$projectId}/candidates/{$candidateId}/{$filename}");
            
            if (!file_exists($storagePath)) {
                abort(404, 'Certificado no encontrado');
            }
            
            return response()->download($storagePath, $filename, [
                'Content-Type' => 'application/pdf'
            ]);
            
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            Log::error("Error de desencriptación en descarga: " . $e->getMessage());
            abort(403, 'Enlace inválido');
        } catch (\Exception $e) {
            Log::error("Error en descarga: " . $e->getMessage());
            abort(500, 'Error al procesar la descarga');
        }
    }
    
    public function test()
    {
        $url = $this->generateShortUrl(1, 1, 'test.pdf');
        
        return response()->json([
            'url_generada' => $url,
            'instrucciones' => 'Copia esta URL y pégala en tu navegador'
        ]);
    }
}
