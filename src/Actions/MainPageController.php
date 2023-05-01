<?php

namespace App\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MainPageController
{
    public function __construct() { }
    
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
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
    }
}
