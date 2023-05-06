<?php

namespace App\Services;

use App\Domain\User;
use Doctrine\ORM\EntityManager;

class UserService {
    private EntityManager $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createUser(string $email, string $password) {
        $user = new User($email, $password);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }
}