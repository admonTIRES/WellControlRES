<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionVencimientoEstudiante extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Certificación de Control de Pozos - Aviso de Vencimiento')
                    ->view('emails.notificacionVencimiento')
                    ->with([
                    'nombre'               => $this->data['nombre'] ?? 'N/A',
                    'diasRestantes'        => $this->data['dias_restantes'] ?? 0,
                    'nombreCurso'          => $this->data['nombre_curso'] ?? 'N/A',
                    'nivelAcreditacion'    => $this->data['nivel'] ?? 'N/A',
                    'numeroCertificacion'  => $this->data['num_certificacion'] ?? 'N/A',
                    'empresa'              => $this->data['empresa'] ?? 'N/A',
                    'razonSocial'          => $this->data['razon_social'] ?? ($this->data['empresa'] ?? 'N/A'),
                    'fechaCursoReferencia' => $this->data['fecha_curso'] ?? 'N/A', 
                    'fechaVencimiento'     => $this->data['fecha_vencimiento'] ?? 'N/A',
                ]);
    }
}
