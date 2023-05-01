<?php

namespace App\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class UserController
{
    public function __construct() { }
    
    public function profile(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
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
