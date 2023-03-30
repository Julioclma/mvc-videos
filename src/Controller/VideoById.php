<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoById implements Controller, VerifyLogged
{
    public function __construct(private VideoRepository $repository)
    {
        $this->verifyLogged();  
    }
    public function processaRequisicao(): void
    {
        $video = $this->repository->videoById($_GET['id']);

        if (!$video) {
           

           header("Location: /?find=0");

            exit();
        }

        require_once __DIR__ . "/../../views/editar-video.php";
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
