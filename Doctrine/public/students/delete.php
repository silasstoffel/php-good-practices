<?php

use PHPLaboratory\Doctrine\Entities\Student;
use PHPLaboratory\Doctrine\Helper\EntityManageFactory;

require '../../vendor/autoload.php';

$id = $_GET['id'] ?? null;

if (is_null($id)) {
    $message = sprintf(
        'Set query string with params id. Example: %s',
        'http://localhost:8083/students/update.php?id=xxx'
    );
    die($message);
}

$entityManageFactory = new EntityManageFactory();
$entityManage = $entityManageFactory->getEntityManager();

// No performance mode
/** @var Student $student*/
// $student = $entityManage->find(Student::class, $id);
// $entityManage->remove($student);

// Performance mode
// Entity with only ID
/** @var Student $student*/
$student = $entityManage->getReference(Student::class, $id);
$entityManage->remove($student);


$entityManage->flush();
