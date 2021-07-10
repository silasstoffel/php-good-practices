<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use PHPLaboratory\Doctrine\Helper\EntityManageFactory;

require './vendor/autoload.php';

return ConsoleRunner::createHelperSet(
    (new EntityManageFactory())->getEntityManager()
);

