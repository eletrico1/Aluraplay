<?php

    namespace Alura\Mvc\Controller;
    use Alura\Mvc\Controller\Controller;
    include_once 'Controller.php';
    use Alura\Mvc\Repository\VideoRepository;
    use PDO;
    use PDOException;

    final class usuariosController implements Controller
    {
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

        }
        public function processaRequisicao():void
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
            require_once 'app/templates/usuarios.php';
        }
    }
