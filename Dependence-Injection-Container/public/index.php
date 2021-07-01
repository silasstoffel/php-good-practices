<?php

use DIApp\Entities\User;
use DIApp\Infra\Repositories\UserRepository;
use DIApp\UseCase\User\CreateUserUserCase;

require '../vendor/autoload.php';

/** @var \Psr\Container\ContainerInterface $container */
$container = require('../config/container.php');

$user = new User(
    'Silas Stoffel',
    'silasstofel@gamil.com',
    'uuid'
);

// Manualmente
$repository = new UserRepository();
$useCase = new CreateUserUserCase($repository);
$useCase->execute($user);


echo '<hr/>';

// Com injeção de depenencia automática
/** @var  DIApp\UseCase\User\CreateUserUserCase $useCaseWithContainer */
$useCaseWithContainer = $container->get('UseCaseCreateUser');
$user->setName('PHP (Dependence Injection)');
$useCaseWithContainer->execute($user);

