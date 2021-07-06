<?php

use PHPLaboratory\Doctrine\Entities\Product;

require '../../vendor/autoload.php';

$entityManager = require('../../config/entity-manager.php');

$name = 'Product '. rand();

$product = new Product();
$product->setName($name);

$entityManager->persist($product);
$entityManager->flush();

echo 'Create ' . $name;
