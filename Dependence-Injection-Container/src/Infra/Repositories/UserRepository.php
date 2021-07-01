<?php

namespace DIApp\Infra\Repositories;

use DIApp\UseCase\User\UserRepositoryInterface;
use DIApp\Entities\User;

/**
 * @Injectable(lazy=true)
 */
class UserRepository implements UserRepositoryInterface
{
    public function __construct()
    {
    }

    public function create(User $user)
    {
        echo 'Create user ' . $user->getName();
    }
}
