<?php

namespace Alura\Mvc\Controller;

class VideoEnviarController
{
    public function __construct()
    {
       
    }
    public function processaRequisicao() : void
    {
     require_once __DIR__."/../../views/enviar-video.php";
    }
}
