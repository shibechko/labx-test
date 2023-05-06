<?php

namespace App\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AssetsController {
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $filePathName = $args['resource'];
        $ext = end(explode('.', $filePathName));
        $assetsDir = dirname(__FILE__) . "/../../assets/";
        $response->getBody()->write(file_get_contents($assetsDir . $filePathName));
        if($ext == 'js') {
            $response = $response->withHeader('Content-Type', 'application/javascript');
        } else if($ext == 'css') {
            $response = $response->withHeader('content-type', 'text/css');
        }
        return $response;
    }
}
