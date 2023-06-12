<?php
    namespace ytoShare\Mvc\Controller;
    use ytoShare\Mvc\Repository\VideoRepository;
    use PDO;
    use PDOException;
    include_once 'app/src/Repository/VideoRepository.php';
    class VideoListController implements Controller
    {
        private VideoRepository $videoRepository;

        public function __construct()
        {
            //passo 1 conexao db
            $server = "127.0.0.1";
            $usuario = "root";
            $senha = "";
            $banco = "course_php";

            try {
                $conexao = new PDO('mysql:host=localhost;dbname=course_php', $usuario, $senha);
                //abaixo tratamento de erro
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //abaixo exibe tratamento de erro
            } catch (PDOException $erro) {
                echo "Ocorreu erro conexao : {$erro->getMessage()}";
                $conexao = null;
            }

            $this->videoRepository = new VideoRepository($conexao);
        }

        public function processaRequisicao():void
        {
            $videoList = $this->videoRepository->all();
            require_once 'app/templates/videoList.php';
        }
    }
