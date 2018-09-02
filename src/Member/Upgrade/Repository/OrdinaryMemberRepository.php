<?php

namespace PhpMentors\BookStore\Member\Upgrade\Repository;

use PhpMentors\BookStore\Member\Upgrade\Entity\OrdinaryMember;

class OrdinaryMemberRepository
{
    /**
     * @param int    $id
     * @param string $name
     *
     * @return OrdinaryMember
     */
    public function findOneByIdAndName(int $id, string $name): OrdinaryMember
    {
        //
    }
}
