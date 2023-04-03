<?php

namespace Alura\Mvc\Entity;

use InvalidArgumentException;

class Video
{

    public readonly string $url;
    public readonly int $id;
    public string|null $image;

    public function __construct(string $url, public readonly string $title, array|string $image)
    {
        $this->setUrl($url);
        $this->setImage($image);
    }

    private function setUrl($url): void
    {

        $url = filter_var($url, FILTER_VALIDATE_URL);

        if (!$url) {
            throw new InvalidArgumentException();
        }

        $this->url = $url;
    }

    private function setImage(array|string $image): void
    {

        if (is_array($image)) {

            if($image['image']['error'] === 4){
        
                $this->image = null;
                return;
            }

            if ($image['image']['error'] === UPLOAD_ERR_OK); {
                move_uploaded_file($image['image']['tmp_name'], __DIR__ . '/../../public/img/uploads' . $image['image']['name']);

                $this->image = $image['image']['name'];

                return;
            }
        }



        $this->image = $image;
    }

    public function getImage(): string|null
    {
        return $this->image;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
