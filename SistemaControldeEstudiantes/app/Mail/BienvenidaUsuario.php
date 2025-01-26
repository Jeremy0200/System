<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenidaUsuario extends Mailable
{
    use SerializesModels;

    public $usuarioNombre;
    public $usuarioRol;

    // Recibe el nombre y rol del usuario para incluir en el correo
    public function __construct($nombre, $rol)
    {
        $this->usuarioNombre = $nombre;
        $this->usuarioRol = $rol;
    }

    public function build()
    {
        return $this->view('emails.bienvenida')
                    ->subject('Bienvenido al sistema')
                    ->with([
                        'usuarioNombre' => $this->usuarioNombre,
                        'usuarioRol' => $this->usuarioRol,
                    ]);
    }
}
