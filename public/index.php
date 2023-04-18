<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

$app = AppFactory::create();

$routes = scandir(__DIR__ . '/../app/routes/');
foreach ($routes as $route) {
    if (is_file(__DIR__ . '/../app/routes/' . $route) && mb_substr($route, -4, 4) === '.php') {
        require __DIR__ . '/../app/routes/' . $route;
    }
}

$app->get('/', function(Request $request, Response $response) {
    $response->getBody()->write(" 
        <html>
        <head>
            <link rel='stylesheet' href='/assets/styles.css'>
        </head>
        <body>
            Hello world!!!
        </body>
        </html>
    ");
    return $response;
});

$app->get('/assets[/{resource:.*}]', \AssetsController::class);

$app->run();
