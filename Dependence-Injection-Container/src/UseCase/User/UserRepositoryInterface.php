<?php

namespace DIApp\UseCase\User;

use DIApp\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user);
}
