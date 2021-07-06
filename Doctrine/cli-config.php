<?php

require './vendor/autoload.php';
$entityManage = require('./config/entity-manager.php');
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

