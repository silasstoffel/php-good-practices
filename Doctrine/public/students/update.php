<?php

use PHPLaboratory\Doctrine\Entities\Student;
use PHPLaboratory\Doctrine\Helper\EntityManageFactory;

require '../../vendor/autoload.php';

$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? null;

if (is_null($id) or is_null($name)) {
    $message = sprintf(
        'Set query string with params id and name. Example: %s',
        'http://localhost:8083/students/update.php?id=xxx&name=yyy'
    );
    die($message);
}

$entityManageFactory = new EntityManageFactory();
$entityManage = $entityManageFactory->getEntityManager();


$studentRepository = $entityManage->getRepository(Student::class);

/** @var Student $student*/
$student = $studentRepository->find($id);

if (!$student) {
    die('Student not found.');
}

echo '<h3>Current name</h3>';
echo $student->getName();


echo '<h3>New name</h3>';

// Update (Full mode)
$student->setName($name);
$entityManage->flush();
/** @var Student $student*/
$student = $studentRepository->find($id);


// Update (Simple Mode - without repository):
/** @var Student $student*/
$student = $entityManage->find(Student::class, $id);
$student->setName($name);
$entityManage->flush();


echo $student->getName();

