<?php

namespace Alura\Calisthenics\Domain\Video;

class Video
{
    private bool $visibility = false;
    private int $ageLimit;

    public function isPublic(): bool
    {
        return $this->visibility;
    }

    public function publish()
    {
        $this->visibility = true;
    }

    /**
     * @deprecated 1
     * @param integer $visibility
     * @return void
     */
    /*
    public function checkIfVisibilityIsValidAndUpdateIt(int $visibility): void
    {
        if (in_array($visibility, [self::PUBLIC, self::PRIVATE])) {
            $this->visibility = $visibility;
        } else {
            throw new \InvalidArgumentException('Invalid visibility');
        }
    }*/

    public function getAgeLimit(): int
    {
        return $this->ageLimit;
    }

    public function setAgeLimit(int $ageLimit): void
    {
        $this->ageLimit = $ageLimit;
    }
}
