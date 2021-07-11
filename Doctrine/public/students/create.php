<?php

use PHPLaboratory\Doctrine\Entities\Student;
use PHPLaboratory\Doctrine\Helper\EntityManageFactory;

require '../../vendor/autoload.php';

$student = new Student();
$name = 'Student '. rand();
$student->setName($name);

$entityManageFactory = new EntityManageFactory();
$entityManage = $entityManageFactory->getEntityManager();

$entityManage->persist($student);

$entityManage->flush();
