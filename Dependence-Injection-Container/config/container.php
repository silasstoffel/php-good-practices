<?php

$definitions = require('container-definitions.php');

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions($definitions);

$container = $builder->build();

return $container;
