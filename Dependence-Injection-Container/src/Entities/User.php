<?php

namespace DIApp\Entities;

class User
{
    private ?string $id;
    private string $email;
    private string $name;

    public function __construct(
        string $name,
        string $email,
        ?string $id = null
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
}
