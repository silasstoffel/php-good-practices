<?php


class Programmer implements Workable
{

    public function canCode(): bool
    {
        return true;
    }

    public function code(): void
    {
        return 'coding';
    }

    public function test(): void
    {
        return 'testing in localhost';
    }
}
