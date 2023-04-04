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


session_start();
// session_regenerate_id();


//Verifica se não está na rota de login, se não estiver e não existir a SESSION 'logado', o usuário é redirecionado para o login
if (!strpos($pathInfo, 'login') && !array_key_exists('logado', $_SESSION)) {
    header('Location: /login');
    exit();
}

if (strpos($pathInfo, 'login') && array_key_exists('logado', $_SESSION)) {
    header('Location: /');
    exit();
}

if(strpos($pathInfo, 'login') && $httpMethod === 'POST'){
    $repository = new UsuarioRepository($pdo);

}

if ($pathInfo === '/' || strpos($pathInfo, 'video') || strpos($pathInfo, 'capa')) {
    $repository = new VideoRepository($pdo);
}

if (strpos($pathInfo, 'logout')) {
    $repository = new UsuarioRepository($pdo);
}


$routes = require_once __DIR__ . "/../config/routes.php";

$controllerClass = $routes["$httpMethod|$pathInfo"];

$controller = new $controllerClass($repository);



//Interface que processa todas as requisições
$controller->processaRequisicao();
