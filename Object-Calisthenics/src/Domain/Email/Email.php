<?php

namespace Alura\Calisthenics\Domain\Email;

class Email
{
    private string $address;

    public function __construct(string $address)
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('Invalid e-mail address');
        }
        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function __toString(): string
    {
        return $this->address;
    }
}
