<?php

use DIApp\Container\AppContainer;
use DIApp\Entities\User;
use DIApp\Infra\Repositories\UserRepository;
use DIApp\UseCase\User\UserRepositoryInterface;
use Psr\Container\ContainerInterface;

require '../vendor/autoload.php';

$container = new AppContainer();
$container->addDefinitions([
    UserRepositoryInterface::class => new UserRepository(),
    User::class => new User('Silas Container', 'container@mail.com')
]);

class UserController
{
    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index()
    {
        /** @var DIApp\Entities\User $user*/
        $user = $this->container->get(User::class);
        echo $user->getName(), '<br/>';
        echo $user->getEmail();
    }
}

$contoller = new UserController(
    $container
);

$contoller->index();
