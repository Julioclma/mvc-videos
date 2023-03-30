<?php

namespace Alura\Mvc\Controller;

class VideoEnviarController implements Controller, verifyLogged
{
    public function __construct()
    {
       $this->verifyLogged();
    }
    public function processaRequisicao() : void
    {
     require_once __DIR__."/../../views/enviar-video.php";
    }
    public function verifyLogged() : void
    {
        session_start();
if(!array_key_exists('logado', $_SESSION)){
    header('Location: /login?message=você deve se logar no sistema');
    exit();
};

    }
}
