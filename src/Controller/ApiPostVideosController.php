<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class ApiPostVideosController
{    
    
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $request = file_get_contents('php://input');

        $videoData = json_decode($request, true);
        
        $this->videoRepository->add(new Video($videoData['url'], $videoData['title'], ''));

        http_response_code(201);
    }
}
