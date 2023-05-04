<?php

//Index possui o papel de controller, sendo assim, os demais arquivos e regras php ficam no diretório "app"
    //Através da configuração Definida no .htacess a leitura dos arquivos é bloqueada por segurança
    declare(strict_types=1);
    require_once 'vendor/autoload.php';
    require_once 'app/conexao.php';

    if (!array_key_exists('REDIRECT_URL', $_SERVER) || $_SERVER['REDIRECT_URL'] === '/') {
        require_once 'app/login.php';
    } elseif ($_SERVER['REDIRECT_URL'] === '/form') {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once 'app/formulario.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once  'app/novo-video.php';
        }

    } elseif ($_SERVER['REDIRECT_URL'] === '/edit') {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once 'app/formulario.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'app/editar-video.php';
        }

    } elseif ($_SERVER['REDIRECT_URL'] === '/remover-video') {
        require_once  'app/remover-video.php';
    }
    elseif($_SERVER['REDIRECT_URL'] === '/loginValidate'){
        require_once 'app/loginValidate.php';
    }
    elseif($_SERVER['REDIRECT_URL'] === '/logout'){
        require_once 'app/logout.php';
    }
    else {
        require_once 'app/exibicao-videos.php';
        //abaixo alternativa para direcionar para 404 caso endereço não exista
        //http_response_code(404);
    }
