<?php

    namespace Alura\Mvc\Controller;
    use Alura\Mvc\Repository\VideoRepository;
    use PDO;

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

            if(isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null  ) {
                $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ? ");
                $query->execute(array($_POST["email"], $_POST["senha"]));
                if ($query->rowCount()){
                    $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
                    session_start();
                    $_SESSION["usuario"] = array($user["nome"], $user["adm"]);
                    if ($user["adm"] == "1"){
                        echo "<script>window.location = '/autenticado' </script>";
                    } else {
                        echo "<script>window.location = '/autenticado' </script>";
                    }
                    //abaixo chamando redirect via javascript
                } else{
                    //tratamento de erro com javascript em caso de login não passar
                    echo "<script>alert('Usuário ou senha invalidos');</script>";
                    echo "<script>window.location = '../../index.php' </script>";

                }
            } else {
                //tratamento de erro com javascript em caso de login não passar
                echo "<script>alert('Usuário ou senha invalidos');</script>";
                echo "<script>window.location = '../../index.php' </script>";
            }

        }

        public function logout() :void
        {
            session_start();
            session_destroy();
            echo "<script>window.location = '/' </script>";
        }
    }