<?php

    namespace Alura\Mvc\Controller;
    use Alura\Mvc\Repository\VideoRepository;
    use PDO;
    use PDOException;

    class VideoDeleteController implements Controller
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

            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $url = $_SERVER['REQUEST_URI'];
            $components = parse_url($url);
            //condicional abaixo valido quanto houver id na url, ou seja quando estiver na tela de edição.
            parse_str($components['query'], $results);
            ///transformar $results de array para string abaixo
            $resultString = implode("",$results);

            $sql = 'DELETE FROM videos WHERE id = :resultString';
            $statement = $conexao->prepare($sql);
            $statement->bindValue(':resultString', $resultString);

            if ($statement->execute() === false) {
                echo "<script>alert('Video nao excluido devido a erro');</script>";
                echo "<script>window.location = '/excluido?sucesso=0' </script>";
            } else {
                echo "<script>alert('Video excluido com sucesso');</script>";
                echo "<script>window.location = '/excluido?sucesso=1' </script>";
            }

        }
    }