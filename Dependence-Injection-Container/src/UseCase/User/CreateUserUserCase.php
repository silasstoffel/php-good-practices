<?php

namespace DIApp\UseCase\User;

use DIApp\Entities\User;
use DIApp\UseCase\User\UserRepositoryInterface;

/**
 * @Injectable(lazy=true)
 */
class CreateUserUserCase
{
    /**
     * @Inject
     * @var UserRepositoryInterface
     */
    protected UserRepositoryInterface $repository;

    /**
     * Constructor
     *
     * @param UserRepositoryInterface $repository repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(User $user): void
    {
        $this->repository->create($user);
    }
}
