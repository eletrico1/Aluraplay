<?php
    namespace Alura\Mvc\Repository;
    use Alura\Mvc\Entity\Video;
    include_once 'app/src/Entity/Video.php';
    class VideoRepository
    {
        public function __construct(private \PDO $conexao)
        {

        }

        public function add(Video $video): bool
        {
            $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
            $statement = $this->conexao->prepare($sql);
            $statement->bindValue(1,$video->url);
            $statement->bindValue(2, $video->title);
            $video->setId($this->conexao->lastInsertId());
            $result =  $statement->execute();
             return $result;
        }

        public function remove(int $id): bool
        {
            $sql = 'DELETE FROM videos WHERE id = ?';
            $statement = $this->conexao->prepare($sql);
            $statement->bindValue('1', $id);
           return  $statement->execute();

        }

        public function update(video $video): bool
        {
            $sql = 'UPDATE videos SET  url = :url1, title = :title WHERE id = :id;';
            $statement = $this->conexao->prepare($sql);
            $statement->bindValue(':url1', $video->url);
            $statement->bindValue(':title', $video->title);
            $statement->bindValue(':id', $video->id, \PDO::PARAM_INT);
            return $statement->execute();
        }

        /**
         * @return Video[]
         */
        public function all():array
        {
            $videoList = $this->conexao
                ->query('SELECT * FROM videos;')
                ->fetchAll(\PDO::FETCH_ASSOC);
            return array_map(
                function (array $videoData) {
                  $video = new Video($videoData['url'],$videoData['title']);
                  $video->setId($videoData['id']);

           return $video;
            },
               $videoList
            );
        }

    }
