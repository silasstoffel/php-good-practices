<?php

namespace DIApp\Container;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class AppContainerNotFound extends Exception implements NotFoundExceptionInterface
{

}
