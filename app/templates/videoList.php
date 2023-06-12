<?php
require_once 'app/templates/inicio-html.php';

    session_start() ;
    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];

    } else {
        echo "<script>window.location = '/' </script>";
    }

?>


<ul class="videos__container">
    <?php foreach ($videoList as $video):
        ?>

        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $video->url; ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <div class="descricao-video">
                <h3><?= $video->title; ?></h3>
                <div class="acoes-video">
                    <a href="/edit?id=<?= $video->id ;?>">Editar</a>
                    <a href="/remover-video?id=<?= $video->id ; ?>">Excluir</a>
                </div>
            </div>
        </li>

    <?php endforeach ?>
</ul>
<?php include_once 'app/templates/fim-html.php';
