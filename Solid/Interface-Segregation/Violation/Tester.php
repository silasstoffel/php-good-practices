<?php

class Tester implements Workable
{

    public function canCode(): bool
    {
        return false;
    }

    public function code(): void
    {
        throw new DomainException('I can not code.');
    }

    public function test(): void
    {
        return 'testing in test server';
    }
}
