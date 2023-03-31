<?php

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Video;
use PDO;

class VideoRepository
{

    public function __construct(private PDO $pdo)
    {
    }

    public function add(Video $video): bool
    {
        $url = filter_var('url', FILTER_VALIDATE_URL);

        $url =  $video->url;
        $titulo = $video->title;
        $image = $video->image;

       
        if (!$titulo || !$url || !$image) {
            header('Location: /?sucess=0');
            exit();
        }

      

        $sql = ("INSERT INTO videos (url, title, image_path) VALUES (?, ?, ?)");

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $video->url);
        $stmt->bindValue(2, $video->title);
        $stmt->bindValue(3, $video->image);


        $response = $stmt->execute();

        $id = $this->pdo->lastInsertId();

        $video->setId(intval($id));

        return $response;
    }
    public function remove($id): bool
    {
        $sql = ("DELETE FROM videos WHERE id = ?");

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }

    public function update(Video $video): bool
    {
        $stmt = $this->pdo->prepare("UPDATE videos set url = :url, title = :title WHERE id = :id");

        $stmt->bindValue(':url', $video->url);

        $stmt->bindValue(':title', $video->title);

        $stmt->bindValue(':id', $video->id);

        return $stmt->execute();
    }

    public function all(): array
    {
        $query = ("SELECT * FROM videos");

        $videoList = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function (array $videoData) {
                if($videoData['image_path']){
                    $video = new Video($videoData['url'], $videoData['title'], $videoData['image_path']);
                }

                if(!$videoData['image_path'])
                {
                    $video = new Video($videoData['url'], $videoData['title'], "invalid");
                }
                
                
                $video->setId($videoData['id']);
                return $video;
            },
            $videoList
        );
    }

    public function videoById($id): array|bool
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /?sucess=0');
            exit();
        }

        $stmt = $this->pdo->prepare("SELECT * FROM videos WHERE id = ?;");

        $stmt->bindValue(1, $id);

        $exist = $stmt->execute();

        if($exist){
            return $video = $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return false;

    }
}
