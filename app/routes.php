<?php
    //preciso extrair os demais controllers, para assim então criar o restante das rotas,
    //via o arquivo routes.php
 return [
     'GET/logout'=> \ytoShare\Mvc\Controller\loginController::class,
    'GET/remover-video' => \ytoShare\Mvc\Controller\VideoDeleteController::class,
     'GET/loginValidate'=> \ytoShare\Mvc\Controller\loginController::class
 ];