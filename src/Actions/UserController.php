<?php

namespace App\Actions;

use App\Services\UserService;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use UMA\DIC\Container;

class UserController
{
    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }
    
    public function profile(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $userService = $this->container->get(UserService::class);
        $userService->createUser('test@test.vt', '12345');

        $view = Twig::fromRequest($request);
        return $view->render($response, 'user/profile.html.twig', ['username' => "Alex"]);
    }

    public function signin(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'user/login.html.twig', );
    }

    public function registration(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $response->getBody()->write(" 
            <html>
            <head>
                <link rel='stylesheet' href='/assets/styles.css'>
            </head>
            <body>
                Registration form
            </body>
            </html>
        ");
    
        return $response;
    }
}
