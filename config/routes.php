<?php

use Alura\Mvc\Controller\LoginController;
use Alura\Mvc\Controller\LoginViewController;
use Alura\Mvc\Controller\LogoutController;
use Alura\Mvc\Controller\VideoAddController;
use Alura\Mvc\Controller\VideoById;
use Alura\Mvc\Controller\VideoEnviarController;
use Alura\Mvc\Controller\VideoExcluiController;
use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Controller\VideoUpdateController;

return [
    'GET|/' => VideoListController::class,
    'POST|/enviar-video' => VideoAddController::class,
    'GET|/enviar-video' => VideoEnviarController::class,
    'POST|/editar-video' => VideoUpdateController::class,
    'GET|/editar-video' => VideoById::class,
    'GET|/remover-video' => VideoExcluiController::class,
    'GET|/login' => LoginViewController::class,
    'POST|/login' => LoginController::class,
    'GET|/logout' => LogoutController::class
];  