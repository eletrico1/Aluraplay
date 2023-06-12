<?php

//Index possui o papel de controller, sendo assim, os demais arquivos e regras php ficam no diretório "app"
    //Através da configuração Definida no .htacess a leitura dos arquivos é bloqueada por segurança
    declare(strict_types=1);
    use ytoShare\Mvc\Controller\Controller;
    use ytoShare\Mvc\Controller\loginController;
    use ytoShare\Mvc\Controller\usuariosController;
    use ytoShare\Mvc\Controller\VideoDeleteController;
    use ytoShare\Mvc\Controller\VideoListController;
    use ytoShare\Mvc\Repository\VideoRepository;

    require_once 'app/src/controllers/loginController.php';
    require_once 'app/src/controllers/VideoDeleteController.php';
    require_once 'app/src/controllers/VideoListController.php';
    require_once 'app/src/controllers/usuariosController.php';
    require_once 'vendor/autoload.php';
    require_once 'app/conexao.php';

    if (!array_key_exists('REDIRECT_URL', $_SERVER) || $_SERVER['REDIRECT_URL'] === '/') {
        require_once 'app/templates/login.php';
    } elseif ($_SERVER['REDIRECT_URL'] === '/form') {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once 'app/templates/videoForm.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'app/src/models/novo-video.php';
        }

    } elseif ($_SERVER['REDIRECT_URL'] === '/edit') {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once 'app/templates/videoForm.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'app/src/models/editar-video.php';
        }

    } elseif ($_SERVER['REDIRECT_URL'] === '/remover-video') {
        //require_once  'app/remover-video.php';
        $controller = new VideoDeleteController();
    }
    elseif($_SERVER['REDIRECT_URL'] === '/loginValidate'){
       // require_once 'app/loginValidate.php';
        $controller =  new loginController();

    }
    elseif($_SERVER['REDIRECT_URL'] === '/logout'){
        //require_once 'app/logout.php';
        $controller = new loginController();
        $controller->logout();
    }
    elseif ($_SERVER['REDIRECT_URL'] === '/users'){
        $controller = new usuariosController();
    }
    else {
        $controller = new VideoListController();
       // require_once 'app/exibicao-videos.php';
        //abaixo alternativa para direcionar para 404 caso endereço não exista
        //http_response_code(404);
    }
    error_reporting(E_ALL ^ E_ALL);
  $controller->processaRequisicao();
