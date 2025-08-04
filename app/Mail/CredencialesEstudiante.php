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


  public function __construct($nombre, $password, $email)
    {
        $this->nombre = $nombre;
        $this->password = $password;
        $this->email = $email;

    }

   public function build()
    {

        // En tu controlador o Mailable
        return $this->subject('Tus credenciales de acceso')
                    ->view('emails.credenciales');
    }
}
