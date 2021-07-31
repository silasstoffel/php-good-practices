<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Video\Video;
use DateTimeImmutable;
use DateTimeInterface;

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private FullName $fullName;
    private Address $address;

    public function __construct(
        Email $email,
        DateTimeInterface $birthDate,
        FullName $fullName,
        Address $address
    )
    {
        $this->watchedVideos = new WatchedVideos();
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->fullName = $fullName;
        $this->address = $address;
    }

    public function getFullName(): string
    {
        return $this->fullName->__toString();
    }

    public function getEmail(): string
    {
        return $this->email->getAddress();
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if (!$this->watchedVideos->count()) {
            return true;
        }

        $firstDate = $this->watchedVideos->dateOfFirstVideo();
        $today = new DateTimeImmutable();

        if ($firstDate->diff($today)->days >= 90) {
            return false;
        }

        return true;
    }

    public function age():int
    {
        $today = new DateTimeImmutable();
        $interval = $this->birthDate->diff($today);
        return $interval->y;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

}
