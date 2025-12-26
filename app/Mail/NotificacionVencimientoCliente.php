<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



class NotificacionVencimientoCliente extends Mailable
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
       return $this->subject('Aviso de Vencimiento de Certificación de Control de Pozos')
                    ->view('emails.notificacionVencimientoCliente')
                    ->with([
                    'nombreSupervisor'    => $this->data['nombre_supervisor'] ?? 'Representante de Empresa',
                    'empresa'             => $this->data['empresa'] ?? 'Cliente',
                    'diasRestantes'       => $this->data['dias_restantes'] ?? 0,
                    'nombreTrabajador'    => $this->data['nombre'] ?? 'Personal Operativo', 
                    'puestoTrabajador'    => $this->data['puesto'] ?? 'Operativo',
                    'nombreCurso'         => $this->data['nombre_curso'] ?? 'Curso de Control de pozos',
                    'nivelAcreditacion'   => $this->data['nivel'] ?? 'N/A',
                    'numeroCertificacion' => $this->data['num_certificacion'] ?? 'S/N',
                    'fechaVencimiento'    => $this->data['fecha_vencimiento'] ?? 'N/A',
                ]);
    }
}
