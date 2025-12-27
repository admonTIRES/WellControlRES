<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\NotificacionVencimientoEstudiante;
use App\Mail\NotificacionVencimientoCliente;

class NotificarVencimientos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificar:vencimientos'; //nombre del comando q se eejcuta en el kernel

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Busca certificaciones por vencer en 90, 60 y 30 días usando la tabla general';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $plazos = [90, 60, 30];
        $hoy = Carbon::now()->startOfDay();

        foreach ($plazos as $dias) {
            $fechaObjetivo = Carbon::now()->addDays($dias)->format('Y-m-d');
            $this->info("Buscando vencimientos para la fecha: " . $fechaObjetivo);

            $vencimientos = DB::table('course as co')
                ->join('candidate as c', 'co.ID_CANDIDATE', '=', 'c.ID_CANDIDATE')
                ->leftJoin('proyect as p', 'c.ID_PROJECT', '=', 'p.ID_PROJECT')
                ->leftJoin('costumers as cust', 'c.COMPANY_ID_PROJECT', '=', 'cust.ID_CATALOGO_CLIENTE')
                ->leftJoin('name_project as np', 'p.COURSE_NAME_ES_PROJECT', '=', 'np.ID_CATALOGO_NPROYECTOS')
                ->leftJoin('nivel_acreditacion as na', 'co.LEVEL', '=', 'na.ID_CATALOGO_NIVELACREDITACION')
                ->select(
                    'co.ID_COURSE',
                    'co.ENABLE_NOTIFICATIONS',
                    'c.FIRST_NAME_PROJECT', 'c.LAST_NAME_PROJECT', 'c.MIDDLE_NAME_PROJECT', 'c.EMAIL_PROJECT',
                    'cust.NOMBRE_COMERCIAL_CLIENTE', 'cust.CONTACTO_CLIENTE',
                    'np.NOMBRE_PROYECTO as nombre_curso',
                    'na.NOMBRE_NIVEL as nivel_nombre',
                    'co.CERTIFICATE_NUMBER', 'co.EXPIRATION',
                    'p.ID_PROJECT',
                    'p.EXAM_DATE_PROJECT'
                )
                ->whereDate('co.EXPIRATION', $fechaObjetivo)
                ->get();

            if ($vencimientos->isEmpty()) {
                $this->line("No se encontraron registros para {$dias} días.");
            } else {
                $this->info("Se encontraron " . $vencimientos->count() . " registros para {$dias} días.");
            }

            foreach ($vencimientos as $reg) {
                $nombreCompleto = trim("{$reg->FIRST_NAME_PROJECT} {$reg->MIDDLE_NAME_PROJECT} {$reg->LAST_NAME_PROJECT}");
                if ($reg->ENABLE_NOTIFICATIONS != 1) {
                    $this->warn("⚠ Saltando a: {$nombreCompleto} (Notificaciones desactivadas)");
                    continue; 
                }
                $emailSupervisor = $this->extraerPrimerEmailCliente($reg->CONTACTO_CLIENTE);
                $emailPrueba = "lperez@results-in-performance.com";

                $contacto = $this->extraerDatosContacto($reg->CONTACTO_CLIENTE);
                
                $nombreSupervisor = $contacto['nombre'] ?? $reg->NOMBRE_COMERCIAL_CLIENTE; 

                $nombreCompleto = trim("{$reg->FIRST_NAME_PROJECT} {$reg->MIDDLE_NAME_PROJECT} {$reg->LAST_NAME_PROJECT}");

                $data = [
                    'nombre'            => $nombreCompleto ?? 'N/A',
                    'email'             => $reg->EMAIL_PROJECT ?? 'N/A',
                    'email_supervisor'  => $emailSupervisor ?? 'N/A',
                    'nombre_supervisor' => $nombreSupervisor ?? 'N/A', 
                    'nombre_curso'      => $reg->nombre_curso ?? 'N/A',
                    'nivel'             => $reg->nivel_nombre ?? 'N/A',
                    'num_certificacion' => $reg->CERTIFICATE_NUMBER,
                    'empresa'           => $reg->NOMBRE_COMERCIAL_CLIENTE,
                    'fecha_vencimiento' => Carbon::parse($reg->EXPIRATION)->format('d/m/Y'),
                    'dias_restantes'    => $dias,
                    'fecha_curso'       => $reg->EXAM_DATE_PROJECT ? Carbon::parse($reg->EXAM_DATE_PROJECT)->format('d/m/Y') : 'N/A',
                ];

                try {
                    $envioExitoso = false;
                    if (!empty($data['email'])) {
                        Mail::to($data['email'])->send(new NotificacionVencimientoEstudiante($data));
                        // Mail::to($emailPrueba)->send(new NotificacionVencimientoEstudiante($data));
                        $envioExitoso = true;
                    }

                    if (!empty($emailSupervisor)) {
                        Mail::to($emailSupervisor)->send(new NotificacionVencimientoCliente($data));
                        $envioExitoso = true;
                    }

                    if ($envioExitoso) {
                        $filasAfectadas = DB::table('course')
                            ->where('ID_COURSE', $reg->ID_COURSE)
                            ->increment('EMAILS_SENT');

                        if ($filasAfectadas > 0) {
                            $this->info("✔ DB ACTUALIZADA: Se incrementó el registro ID: {$reg->ID_COURSE}");
                        } else {
                            $this->error("❌ ERROR: No se encontró el ID {$reg->ID_COURSE} en la tabla 'course'.");
                            DB::table('course')->where('ID_COURSE', $reg->ID_COURSE)->update(['EMAILS_SENT' => 1]);
                        }
                    }

                    $this->info("Notificación de {$dias} días enviada a: {$nombreCompleto}");
                } catch (\Exception $e) {
                    \Log::error("Error en envío automático a {$data['email']}: " . $e->getMessage());
                }
            }
        }
    }

    private function extraerPrimerEmailCliente($jsonContactos)
    {
        if (empty($jsonContactos)) return null;

        $contactos = json_decode($jsonContactos, true);

        if (is_string($contactos)) {
            $contactos = json_decode($contactos, true);
        }

        if (is_array($contactos) && isset($contactos[0]['EMAIL'])) {
            return $contactos[0]['EMAIL'];
        }

        return null;
    }

    private function extraerDatosContacto($jsonContactos)
    {
        $datos = ['nombre' => null, 'email' => null];

        if (empty($jsonContactos)) return $datos;

        $contactos = json_decode($jsonContactos, true);

        if (is_string($contactos)) {
            $contactos = json_decode($contactos, true);
        }

        if (is_array($contactos) && isset($contactos[0])) {
            $datos['nombre'] = $contactos[0]['NOMBRE'] ?? null;
            $datos['email']  = $contactos[0]['EMAIL'] ?? null;
        }

        return $datos;
    }
}
