<?php
   final class Database {

        public function conectar() {
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
            } catch
            (PDOException $erro) {
                echo "Ocorreu erro conexao : {$erro->getMessage()}";
                $conexao = null;
            }
            return $conexao;
        }
    }