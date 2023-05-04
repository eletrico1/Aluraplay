<?php

    use Alura\Mvc\Entity\Video;
    use Alura\Mvc\Repository\VideoRepository;

$url1 = filter_input(INPUT_POST, 'url1', FILTER_VALIDATE_URL);
if ($url1 === false) {
    echo "<script>alert('Erro. Video não enviado');</script>";
    echo "<script>window.location='/validado?sucesso=0';</script>";
    exit();
}
$title = filter_input(INPUT_POST, 'titulo');
if ($title === false) {
    echo "<script>alert('Erro. Video não enviado');</script>";
    echo "<script>window.location='/enviado?sucesso=0';</script>";
    exit();
}

$repository = new VideoRepository($conexao);


if ($repository->add(new Video($url1,$title)) === false) {
    echo "<script>alert('Erro. Video não enviado');</script>";
    echo "<script>window.location = '/enviado?sucesso=0' </script>";

} else {
    echo "<script>alert('Video enviado com sucesso');</script>";
    echo "<script>window.location='/enviado?sucesso=1';</script>";
}