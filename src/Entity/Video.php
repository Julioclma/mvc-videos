<?php

namespace Alura\Mvc\Entity;

use InvalidArgumentException;

class Video
{

    public readonly string $url;
    public readonly int $id;
    public string $image;
    
    public function __construct(string $url, public readonly string $title, string $image)
    {
        $this->setUrl($url);
        $this->image = $image;

    }

    private function setUrl($url)
    {

        $url = filter_var($url, FILTER_VALIDATE_URL);

        if (!$url) {
            throw new InvalidArgumentException();
        }

        $this->url = $url;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
}
