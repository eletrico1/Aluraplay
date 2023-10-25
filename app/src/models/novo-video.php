<?php

    use ytoShare\Mvc\Entity\Video;
    use ytoShare\Mvc\Repository\VideoRepository;
    $conexao= new Database();
    $con = $conexao->conectar();
    $alertaNaoPassou = 'echo ' . '<script>alert("Erro. Video não enviado");</script>' . "<script>window.location = '/enviado?sucesso=0' </script>";
    $alertaPassou = '<script>alert("Video enviado com sucesso");</script>' . "<script>window.location = '/enviado?sucesso=1' </script>";
    $tratativaOk = 'echo' . "Dados validados";
    $url1 = filter_input(INPUT_POST, 'url1', FILTER_VALIDATE_URL);
    $title = filter_input(INPUT_POST, 'titulo');

    echo $url1 === false ? $alertaNaoPassou : $tratativaOk;
    echo $title === false ? $alertaNaoPassou : $tratativaOk;

    $repository = new VideoRepository($con);

    echo $repository->add(new Video($url1, $title)) === false ? $alertaNaoPassou : $alertaPassou;