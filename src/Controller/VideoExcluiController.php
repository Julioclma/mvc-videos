<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoExcluiController implements Controller
{

    public function __construct(private VideoRepository $videoRepository)
    {
    }


    public function processaRequisicao() : void
    {
        $check = $this->videoRepository->remove($_GET['id']);

        if (!$check) {
            header('Location: /?sucess=0');
        } else {
            header('Location: /?sucess=1');
        }
    }
}
