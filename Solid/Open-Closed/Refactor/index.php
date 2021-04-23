<?php

require 'ProductOwner.php';
require 'Programmer.php';
require 'ProjectManagement.php';

$programmer = new Programmer();
$po = new ProductOwner();
$tester = new TestAnalyst();

$members = [$programmer, $po, $tester];

$projectManagement = new ProjectManagement();

foreach ($members as $member) {
    $projectManagement->jobDescription($member);
}


