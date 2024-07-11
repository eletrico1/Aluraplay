<?php
if(isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null  ) {
    $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ? and fl_deleted = 0 ");
    $query->execute(array($_POST["email"], $_POST["senha"]));
    if ($query->rowCount()){
        $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        session_start();
        $_SESSION["usuario"] = array($user["nome"], $user["adm"]);
        if ($_POST["email"]  == null  || ''){
            echo "<script>alert('Preencha Corretamente os dados');</script>";
            echo "<script>window.location = '../../../../index.php' </script>";
        }
        if ($user["adm"] == "1"){
            echo "<script>window.location = '/administradorLogado' </script>";
        }

       if ($user["adm"] == "0") {
            echo "<script>window.location = '/usuarioLogado' </script>";
        }
            //abaixo chamando redirect via javascript
    } else{
        //tratamento de erro com javascript em caso de login não passar
        echo "<script>alert('Usuário ou senha invalidos');</script>";
        echo "<script>window.location = '../../../../index.php' </script>";

    }
} else {
    //tratamento de erro com javascript em caso de login não passar

    require_once 'index.php';
}