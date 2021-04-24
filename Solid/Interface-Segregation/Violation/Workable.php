<?php

interface Workable
{
    public function canCode(): bool;

    public function code(): void;

    public function test(): void;
}
