<?php

use App\Actions\AssetsController;
use App\Actions\MainPageController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function(App $app) {
    $app->get('/assets[/{resource:.*}]', AssetsController::class);

    $app->get('/', MainPageController::class);
};
