<?php

namespace PhpMentors\BookStore\Member\Upgrade\Entity;

class OrdinaryMember
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

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
     * @return OrdinaryMember
     */
    public function setId(int $id): OrdinaryMember
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return OrdinaryMember
     */
    public function setName(string $name): OrdinaryMember
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return OrdinaryMember
     */
    public function setAddress(string $address): OrdinaryMember
    {
        $this->address = $address;

        return $this;
    }
}
