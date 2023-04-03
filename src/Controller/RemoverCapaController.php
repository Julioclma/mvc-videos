<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class RemoverCapaController implements Controller
{

    public VideoRepository $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processaRequisicao(): void
    {
        $result =  $this->repository->removerCapa($_GET['id']);

        if ($result) {
            header('Location: /?capa removida!');
            exit();
        }

        header('Location: /?Não foi possivel remover a capa!');
        exit();
    }
}
