<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendpresupuesto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $nombre;
    public $email;
    public $localidad;
    public $telefono;
    public $mensaje;
    public $plano;
     public $archivo;

    public function __construct($nombre, $email, $localidad, $telefono, $mensaje, $plano, $archivo)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->localidad = $localidad;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
        $this->plano = $plano;
        $this->archivo = $archivo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.enviarpresupuesto')->with([
                        'nombre' => $this->nombre,
                        'email' => $this->email,
                        'localidad' => $this->localidad,
                        'empresa' => $this->telefono,
                        'mensaje' => $this->mensaje,
                        'plano' => $this->plano  
                        ])->attach('/path/to/file');;
    }
}
