<?php
    namespace Alura\Mvc\Controller;
    use Alura\Mvc\Repository\VideoRepository;
    use PDO;
    include_once 'app/src/controllers/Controller.php';
    include_once 'app/src/Repository/VideoRepository.php';
    class loginController implements Controller
    {
        private VideoRepository $videoRepository;

        public function __construct()
        {
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

        public function processaRequisicao(): void
        {
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
            require_once 'app/src/models/loginValidate.php';

        }

        public function logout() :void
        {
            session_start();
            session_destroy();
            echo "<script>window.location = '/' </script>";
        }
    }