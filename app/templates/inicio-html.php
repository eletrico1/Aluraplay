    <!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include_once 'app/src/models/loginValidate.php';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/reset.css">
    <link rel="stylesheet" href="../../public/css/estilos.css">
    <link rel="stylesheet" href="../../public/css/estilos-form.css">
    <link rel="stylesheet" href="../../public/css/flexbox.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;700&display=swap" rel="stylesheet">
    <!-- FONTS -->

    <title>ytoShare</title>
    <link rel="shortcut icon" href="../../public/img/cabecalho/video_call.png" type="image/x-icon">
</head>

<body>

    <header>

        <nav class="cabecalho">

            <a class="logo" href="/autenticado"></a>


            <div class="cabecalho__icones">
                <?php
      //abaixo temos validação caso o usuário seja administrador, o botão de Listagem de usuários será exibido
                    if ($_SESSION == null || '') {
                        session_start();
                        if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
                            $adm = $_SESSION["usuario"][1];
                            $nome = $_SESSION["usuario"][0];

                        } else {
                            echo "<script>window.location = '/' </script>";
                        }
                    }
                    if($adm == 1):
                ?>
                <a href="/users" class="users">Gestão Usuários</a>
                  <?php
                    endif;?>

                <a href="/form" class="cabecalho__videos"></a>
                <a href="/logout" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>