<?php

namespace PHPLaboratory\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManageFactory
{
    /**
     * @param bool $isDevMode
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(bool $isDevMode = true): EntityManagerInterface
    {
        $rootDir = dirname(dirname(__DIR__));
        $pathSQLite = $rootDir .'/database/db.sqlite';

        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir."/src"],
            $isDevMode,
            null,
            null,
            false
        );
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $pathSQLite
        ];
        return EntityManager::create($connection, $config);
    }
}
