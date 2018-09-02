<?php

namespace PhpMentors\BookStore\Member\Upgrade\Specification;

use DateTimeInterface;
use PhpMentors\BookStore\Member\Upgrade\Entity\OrdinaryMember;

class RegularSpecification
{
    /**
     * @param OrdinaryMember    $member
     * @param DateTimeInterface $datetime
     *
     * @return bool
     */
    public function isSatisfiedBy(OrdinaryMember $member, DateTimeInterface $datetime): bool
    {
        //
    }
}
