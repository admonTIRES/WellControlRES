<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredencialesEstudiante extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $password;
    public $email;
    public $fechaInicio;
    public $fechaFin;

  public function __construct($nombre, $password, $email, $fechaInicio, $fechaFin)
    {
        $this->nombre = $nombre;
        $this->password = $password;
        $this->email = $email;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;


    }

   public function build()
    {

        // En tu controlador o Mailable
        return $this->subject('Tus credenciales de acceso')
                    ->view('emails.credenciales');
    }
}
