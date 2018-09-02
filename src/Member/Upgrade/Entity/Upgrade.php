<?php

namespace PhpMentors\BookStore\Member\Upgrade\Entity;

class Upgrade
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Application
     */
    private $application;

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
     * @return Upgrade
     */
    public function setId(int $id): Upgrade
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application;
    }

    /**
     * @param Application $application
     *
     * @return Upgrade
     */
    public function setApplication(Application $application): Upgrade
    {
        $this->application = $application;

        return $this;
    }
}
