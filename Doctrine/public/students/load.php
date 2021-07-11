<?php


use PHPLaboratory\Doctrine\Entities\Student;
use PHPLaboratory\Doctrine\Helper\EntityManageFactory;

require '../../vendor/autoload.php';

$student = new Student();
$name = 'Student ' . rand();
$student->setName($name);

$entityManageFactory = new EntityManageFactory();
$entityManage = $entityManageFactory->getEntityManager();

$studentRepository = $entityManage->getRepository(Student::class);

/** @var Student[] $students */
$students = $studentRepository->findAll();
echo '<h3>Load All</h3>';
foreach ($students as $item) {
    echo '#', $item->getId() , '-', $item->getName();
    echo  '<hr>';
}

// Load By ID
echo '<h3>Load ID: 1</h3>';
$id = 1;
$result = $studentRepository->find($id);

var_dump($result);

// Load One
echo '<h3>Load One: by name: Silas Stoffel</h3>';
$result = $studentRepository->findOneBy([
    'name' => 'Silas Stoffel'
]);
var_dump($result);

// Load By filter
echo '<h3>Load with filter: name=Silas Stoffel</h3>';
$result = $studentRepository->findBy([
    'name' => 'Silas Stoffel'
]);
var_dump($result);
