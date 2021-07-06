<?php

namespace PHPLaboratory\Doctrine\Entities;

class User
{
    private $username;
    private $passwordHash;
    private $bans;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    public function getBans(): array
    {
        return $this->bans;
    }

    public function addBan(Ban $ban): void
    {
        $this->bans[] = $ban;
    }
}
