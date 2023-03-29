<?php

use Alura\Mvc\Repository\UsuarioRepository;
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$dbname = "projeto_videos";
$hostName = "localhost";
$userName = "root";
$password = "1234";

$pdo = new PDO("mysql:host=$hostName;dbname=$dbname", "$userName", "$password");

// $videoRepository = new VideoRepository($pdo);

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';   

$httpMethod = $_SERVER['REQUEST_METHOD'];

if(strpos($pathInfo, 'video')){
    $repository = new VideoRepository($pdo);

}

if($pathInfo === '/'){
    $repository = new VideoRepository($pdo);

}

if(strpos($pathInfo, 'login')){
    $repository = new UsuarioRepository($pdo);

}

$routes = require_once __DIR__ . "/../config/routes.php";

$controllerClass = $routes["$httpMethod|$pathInfo"];

$controller = new $controllerClass($repository);

//Interface que processa todas as requisições
$controller->processaRequisicao();  