<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public $nombre;
    public $apellido;
    public $email;
    public $empresa;
    public $mensaje;

    public function __construct($nombre, $apellido, $empresa, $email, $mensaje)
    {
        $this->nombre = $nombre;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->provincia = $apellido;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.mail')
            ->with([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'empresa' => $this->empresa,
                'email' => $this->email,
                'mensaje' => $this->mensaje,
            ]);

    }
}
