<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoById
{
    public function __construct(private VideoRepository $repository)
    {
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
}
