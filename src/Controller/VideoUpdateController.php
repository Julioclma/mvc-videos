<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class VideoUpdateController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao() : void
    {

        $video = new Video($_POST['url'], $_POST['titulo']);
        $video->setId($_POST['id']);
        
        $check = $this->videoRepository->update($video);

        if (!$check) {
            header('Location: /?sucess=0');
        } else {
            header('Location: /?sucess=1');
        }
    }

}