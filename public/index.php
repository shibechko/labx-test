<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$app = AppFactory::create();

$twig = Twig::create(__DIR__. '/../templates', ['cache' => false]);
$app->add(TwigMiddleware::create($app, $twig));

$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();
