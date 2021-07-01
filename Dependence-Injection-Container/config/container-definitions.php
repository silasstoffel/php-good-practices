<?php

use DIApp\Infra\Repositories\UserRepository;
use DIApp\UseCase\User\CreateUserUserCase;
use DIApp\UseCase\User\UserRepositoryInterface;

return [
    'UseCaseCreateUser' => DI\get(CreateUserUserCase::class),
    UserRepositoryInterface::class => \DI\get(UserRepository::class)
];
