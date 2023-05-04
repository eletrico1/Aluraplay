<?php


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false) {
    header('Location: /Acao?sucesso=0');
    exit();
}

$url1 = filter_input(INPUT_POST, 'url1', FILTER_VALIDATE_URL);
if ($url1 === false) {
    header('Location: /Acao?sucesso=0');
    exit();
}
$titulo = filter_input(INPUT_POST, 'titulo');
if ($titulo === false) {
    header('Location: /Acao?sucesso=0');
    exit();
}
    $url = $_SERVER['REQUEST_URI'];
    $components = parse_url($url);

    //condicional abaixo valido quanto houver id na url, ou seja quando estiver na tela de edição.
        parse_str($components['query'], $results);
        ///transformar $results de array para string abaixo
        $resultString = implode("",$results);

$video = new \Alura\Mvc\Entity\Video($url1,$titulo);
$video->setId($resultString);

$repository = new Alura\Mvc\Repository\VideoRepository($conexao);
$repository->update($video);

if ($repository->update($video) === false) {
    echo "<script>alert('Video não Alterado devido a um erro.');</script>";
    echo "<script>window.location = '/Acao' </script>";
} else {
    echo "<script>alert('Video Alterado com sucesso');</script>";
    echo "<script>window.location = '/Acao?sucesso=1' </script>";
}
