<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;
use PDO;

class VideoListController implements Controller, VerifyLogged
{
    public function __construct(private VideoRepository $videoRepository)
    {
        $this->verifyLogged();
    }
    public function processaRequisicao(): void
    {


        $videoList = $this->videoRepository->all();

        require_once __DIR__ . "/../../views/videos.php";
    }

    public function verifyLogged(): void
    {
        session_start();
        if (!array_key_exists('logado', $_SESSION)) {
            header('Location: /login?message=você deve se logar no sistema');
            exit();
        };
    }
}
