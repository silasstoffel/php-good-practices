<?php

use PHPLaboratory\Doctrine\Entities\Student;
use PHPLaboratory\Doctrine\Helper\EntityManageFactory;

require '../../vendor/autoload.php';

$student = new Student();
$student->setName('Silas Stoffel');

$entityManageFactory = new EntityManageFactory();
$entityManage = $entityManageFactory->getEntityManager();

$entityManage->persist($student);

$entityManage->flush();
