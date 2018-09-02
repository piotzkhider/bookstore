<?php

namespace PhpMentors\BookStore\Member\Upgrade\Entity;

use DateTimeInterface;

class Application
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var OrdinaryMember
     */
    private $member;

    /**
     * @var string
     */
    private $email;

    /**
     * @var DateTimeInterface
     */
    private $appliedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Application
     */
    public function setId(int $id): Application
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return OrdinaryMember
     */
    public function getMember(): OrdinaryMember
    {
        return $this->member;
    }

    /**
     * @param OrdinaryMember $member
     *
     * @return Application
     */
    public function setMember(OrdinaryMember $member): Application
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Application
     */
    public function setEmail(string $email): Application
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getAppliedAt(): DateTimeInterface
    {
        return $this->appliedAt;
    }

    /**
     * @param DateTimeInterface $appliedAt
     *
     * @return Application
     */
    public function setAppliedAt(DateTimeInterface $appliedAt): Application
    {
        $this->appliedAt = $appliedAt;

        return $this;
    }
}
