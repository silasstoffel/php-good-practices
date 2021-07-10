<?php

use PHPLaboratory\Doctrine\Entities\Product;
use PHPLaboratory\Doctrine\Helper\EntityManageFactory;

require '../../vendor/autoload.php';

//$entityManager = require('../../config/entity-manager.php');

$entityManagerFactory = new EntityManageFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$name = 'Product '. rand();

$product = new Product();
$product->setName($name);

$entityManager->persist($product);
$entityManager->flush();

echo 'Create ' . $name;
