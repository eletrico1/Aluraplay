<?php
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
        echo "<script>window.location = '../../../../index.php' </script>";

    }
} else {
    //tratamento de erro com javascript em caso de login não passar
    var_dump($_SESSION);
    die();
    echo "<script>alert('Usuário ou senha invalidos');</script>";
    echo "<script>window.location = '../../../../index.php' </script>";
}