<?php

use App\Actions\AssetsController;
use App\Actions\MainPageController;
use App\Actions\UserController;
use Slim\App;

return function(App $app) {
    $app->get('/assets[/{resource:.*}]', AssetsController::class);

    $app->get('/', MainPageController::class);

    $app->get('/user/login', [UserController::class, 'signin']);
    $app->get('/user/signup', [UserController::class, 'registration']);
    $app->get('/user/profile', [UserController::class, 'profile']);
};
