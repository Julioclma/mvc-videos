<?php

namespace Alura\Mvc\Controller;

class VideoEnviarController implements Controller
{
    public function __construct()
    {
       
    }
    public function processaRequisicao() : void
    {
     require_once __DIR__."/../../views/enviar-video.php";
    }
}
