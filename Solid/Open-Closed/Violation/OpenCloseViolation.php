<?php

class Programmer
{
    public function code()
    {
        echo 'Code';
    }
}

class ProductOwner
{
    public function manages()
    {
        echo 'Manages backlog';
    }
}

class TestAnalyst
{
    public function test()
    {
        echo 'Manages backlog';
    }
}

class ProjectManagement
{
    public function process($member)
    {
        if ($member instanceof Programmer) {
            $member->code();
        } elseif ($member instanceof ProductOwner) {
            $member->manages();
        } elseif ($member instanceof TestAnalyst) {
            $member->test();
        } else {
            $member->manages();
        }
    }
}

// use
$programmer = new Programmer();
$po = new ProductOwner();
$tester = new TestAnalyst();

$pm = new ProjectManagement();
$pm->process($programmer);
$pm->process($po);
$pm->process($tester);

