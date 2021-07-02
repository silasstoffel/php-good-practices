<?php

declare(strict_types=1);

namespace DIApp\Container;

use Psr\Container\ContainerInterface;
use DIApp\Container\AppContainerNotFound;

class AppContainer implements ContainerInterface
{
    private static array $definitions = [];

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new AppContainerNotFound($id . ' no found.');
        }
        return static::$definitions[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, static::$definitions);
    }

    public function addDefinitions(array $definitions)
    {
        self::$definitions = $definitions;
    }

}
