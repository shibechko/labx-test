<?php

namespace App\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController
{
    public function __construct() { }
    
    public function profile(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $response->getBody()->write(" 
            <html>
            <head>
                <link rel='stylesheet' href='/assets/styles.css'>
            </head>
            <body>
                Hello {{username}}!!!
            </body>
            </html>
        ");
    
        return $response;
    }

    public function signin(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $response->getBody()->write(" 
            <html>
            <head>
                <link rel='stylesheet' href='/assets/styles.css'>
            </head>
            <body>
                Login form!!!
            </body>
            </html>
        ");
    
        return $response;
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
