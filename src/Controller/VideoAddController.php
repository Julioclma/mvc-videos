<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class VideoAddController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }
    public function processaRequisicao(): void
    {

        $check = $this->videoRepository->add(new Video($_POST['url'], $_POST['titulo'], $_FILES));

        if (!$check) {
            header('Location: /?sucess=0');
            exit();
        }

        header('Location: /?sucess=1');
        exit();
    }
}
