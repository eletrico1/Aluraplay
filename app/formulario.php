<?php

$id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);
$video = [
    'url' => '',
    'title' => '',
];
    if($_SERVER['REDIRECT_URL'] !== '/form'){
        $url = $_SERVER['REQUEST_URI'];
        $components = parse_url($url);

        //condicional abaixo valido quanto houver id na url, ou seja quando estiver na tela de edição.
        if ($components !== null && $components !== false ){
            parse_str($components['query'], $results);
            ///transformar $results de array para string abaixo
            $resultString = implode("",$results);
        }

        $query = 'SELECT * FROM videos WHERE id = :resultString';
//condicional abaixo ocorre apenas na tela de edição pois a variavel resultstring é diferente de vazio
        if ( $resultString !== '') {
            $statement = $conexao->prepare($query);
            $statement->bindValue(':resultString', $resultString, PDO::PARAM_INT);
            $statement->execute();
            $video = $statement->fetch(\PDO::FETCH_ASSOC);
        }
    }
    session_start() ;
    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];

    } else {
        echo "<script>window.location = '/' </script>";
    }
?>
<?php include_once 'inicio-html.php'; ?>

    <main class="container">
        <form class="container__formulario"
              method="post">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url1">Link embed</label>
                    <input name="url1"
                           value="<?= $video['url']; ?>"
                           class="campo__escrita"
                           required
                           placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g"
                           id='url1' />
                </div>

                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo"
                           value="<?= $video['title']; ?>"
                           class="campo__escrita"
                           required
                           placeholder="Neste campo, dê o nome do vídeo"
                           id='titulo' />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
      <?php include_once 'fim-html.php'; ?>
