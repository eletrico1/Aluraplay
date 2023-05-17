<?php
    include_once 'dark-mode.php';
    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');
    ?>
  <!--
    include ("../controllers/ControllerLogin.php");
     abaixo possivel implementação senha segura com criptografia passwordsHASH nativa PHP
   $senha = "86873413";
   $options = ['cost'=>12];
   $senhaSegura = password_hash($senha, PASSWORD_DEFAULT,$options);
    echo $senhaSegura;
    -->
  <!-- Abaixo Link CSS -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../public/css/reset.css">
<link rel="stylesheet" href="../public/css/estilos.css">
<link rel="stylesheet" href="../public/css/estilos-form.css">

    <!-- Inform modern browsers that this page supports both dark and light color schemes,
    and the page author prefers light. -->
    <meta name="color-scheme" content="light dark">

    <!-- Load the alternate CSS first ... -->
    <link id="css-dark" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" media="(prefers-color-scheme: dark)">
    <!-- ... and then the primary CSS last for a fallback on very old browsers that don't support media filtering -->
    <link id="css-light" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" media="(prefers-color-scheme: light)">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="pt-br" data-bs-set-darkmode-onload="true">
<head>
    <title> Login Page System</title>
</head>
<body class="">
<!-- navbar -->

        <nav class="navbar navbar-expand-lg bg-body-tertiary" >
            <div class="container-fluid">
                <a class="navbar-brand" href="#">AutenticationSystem</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                     </button>
                         <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                         <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Admin Panel</a>
                        </li>
                      <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                 </li>
                <li class ="nav-item">
               <form class="ms-auto d-flex" style="margin-top:5%">
            <div class="form-check form-switch tooltip-demo">
        <input class="form-check-input" type="checkbox" id="toggle-btn" title="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Toggle Dark Mode or press [D] hot-key">
      <label class="form-check-label" for="toggle-btn">Modo Escuro</label>
    </form>
   </li>
</ul>
</div>
        </nav>
        <!-- form container login-->
        <div id="divForm">
        <div class="container-sm">
            <form action="/loginValidate" method="post">
                <h1>Abaixo faça o login abaixo </h1>
                <input class="form-control form-control-lg" type="text"  id="email" name="email" placeholder="Email" aria-label="default input example">
                <br>
                <input class="form-control form-control-lg" type="text"  id="senha" name="senha" placeholder="Senha" aria-label="default input example">
                <br>
                <button type="submit" class="btn btn-success btn-lg" value="enviar" name="enviar">Entrar</button>
        </div>
            <a href="criarConta.php"> Não possui acesso? Crie um aqui!</a>
        </div>
<?php
    include_once 'templates/fim-html.php' ?>
</body>
</html>
