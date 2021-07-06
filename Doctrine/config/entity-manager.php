<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$rootApp = dirname(__DIR__);

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(
    [$rootApp."/src"],
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

// or if you prefer yaml or XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters

$conn = [
    'driver' => 'pdo_sqlite',
    'path' => $rootApp . '/database/db.sqlite',
];
// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

return $entityManager;
