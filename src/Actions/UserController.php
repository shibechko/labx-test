<?php

namespace App\Actions;

use App\Services\UserService;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use UMA\DIC\Container;
use Valitron\Validator;

class UserController
{
    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }
    
    public function profile(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'user/profile.html.twig', ['username' => "Alex"]);
    }

    public function signin(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'user/login.html.twig', );
    }

    public function registration(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $data = $request->getParsedBody();
        $errors = array();
        if($data) {
            $v = new Validator($data);
            $v->rule('required', ['username', 'password']);
            $v->rule('lengthMin', 'username', 2);
            $v->rule('lengthMax', 'username', 50);
            $response = $response->withHeader('Content-type', 'application/json');
            $body = $response->getBody();
            if($v->validate()) {
                $body->write(json_encode("Ok"));
                return $response;
            } else {
                $body->write(json_encode($v->errors()));
                return $response;
            }
        }

        $view = Twig::fromRequest($request);
        return $view->render($response, 'user/registration.html.twig', []);

        // $userService = $this->container->get(UserService::class);
        // $user = $userService->create($data['username'], $data['password']);
    }
}
