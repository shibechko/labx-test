<?php

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AssetsController {
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $filePathName = $args['resource'];
        $ext = end(explode('.', $filePathName));
        $assetsDir = dirname(__FILE__) . "/../../assets/";
        if($ext == 'js') {
            $response->withHeader('Content-Type', 'content-type: application/javascript');
        } else if($ext == 'css') {
            $response->withHeader('Content-Type', 'content-type: text/css');
        }
        $response->getBody()->write(file_get_contents($assetsDir . $filePathName));
        return $response;
    }
}
