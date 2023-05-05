<?php
    namespace Alura\Mvc\Controller;
    use Alura\Mvc\Repository\VideoRepository;
    use PDO;
    use PDOException;

    class VideoListController
    {
        private VideoRepository $videoRepository;

        public function __construct()
        {
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
            } catch (PDOException $erro) {
                echo "Ocorreu erro conexao : {$erro->getMessage()}";
                $conexao = null;
            }

            $this->videoRepository = new VideoRepository($conexao);
        }

        public function processaRequisicao():void
        {
            $videoList = $this->videoRepository->all();
             require_once 'app/inicio-html.php';
             ?>
    <ul class="videos__container">
        <?php foreach ($videoList as $video): ?>

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
<?php include_once 'app/fim-html.php';

        }
    }
