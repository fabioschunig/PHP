<?php

declare(strict_types=1);

use Alura\Mvc\Controller\{
    Controller,
    Error404Controller,
};
use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\ServerRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

session_start();
$isLoginRoute = $pathInfo === '/login';
if (!array_key_exists('logado', $_SESSION) && (!$isLoginRoute)) {
    header('Location: /login');
    return;
}
if (isset($_SESSION['logado'])) {
    $originalInfo = $_SESSION['logado'];
    unset($_SESSION['logado']);
    session_regenerate_id();
    $_SESSION['logado'] = $originalInfo;
}

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllerClass($videoRepository);
} else {
    $controller = new Error404Controller();
}

// https://packagist.org/packages/nyholm/psr7-server
// Instanciate ANY PSR-17 factory implementations. Here is nyholm/psr7 as an example
// $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

// $creator = new \Nyholm\Psr7Server\ServerRequestCreator(
//     $psr17Factory, // ServerRequestFactory
//     $psr17Factory, // UriFactory
//     $psr17Factory, // UploadedFileFactory
//     $psr17Factory  // StreamFactory
// );

// $serverRequest = $creator->fromGlobals();

/** @var Controller $controller */
$response = $controller->processaRequisicao(new ServerRequest($httpMethod, $_SERVER['REQUEST_URI']));
echo $response->getBody();

// implement PSR-17 factory
