<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class JsonVideos
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
      $response =  $this->videoRepository->all();

      echo json_encode($response);
    }
}
