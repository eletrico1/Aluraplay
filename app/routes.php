<?php
    //preciso extrair os demais controllers, para assim então criar o restante das rotas,
    //via o arquivo routes.php
 return [
     'GET/logout'=> \Alura\Mvc\Controller\loginController::class,
    'GET/remover-video' => \Alura\Mvc\Controller\VideoDeleteController::class,
     'GET/loginValidate'=> \Alura\Mvc\Controller\loginController::class
 ];