<?php

use DIApp\Entities\User;

require '../vendor/autoload.php';

$user = new User(
    'Silas Stoffel',
    'silasstofel@gamil.com',
    'uuid'
);

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAnnotations(true);
$container = $containerBuilder->build();

/** @var  DIApp\UseCase\User\CreateUserUserCase $useCaseWithContainer */
$useCaseWithContainer = $container->get(
    DIApp\UseCase\User\CreateUserUserCase::class
);
$user->setName('PHP (Dependence Injection)');
$useCaseWithContainer->execute($user);

