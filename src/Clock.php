<?php

namespace PhpMentors\BookStore;

use DateTimeImmutable;
use DateTimeInterface;

class Clock
{
    /**
     * @return DateTimeInterface
     * @throws \Exception
     */
    public function getCurrentTime(): DateTimeInterface
    {
        return new DateTimeImmutable();
    }
}
