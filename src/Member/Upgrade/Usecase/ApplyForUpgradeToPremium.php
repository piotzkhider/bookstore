<?php

namespace PhpMentors\BookStore\Member\Upgrade\Usecase;

use Exception;
use PhpMentors\BookStore\Clock;
use PhpMentors\BookStore\Member\Upgrade\Entity\Application;
use PhpMentors\BookStore\Member\Upgrade\Repository\ApplicationRepository;
use PhpMentors\BookStore\Member\Upgrade\Repository\OrdinaryMemberRepository;

class ApplyForUpgradeToPremium
{
    /**
     * @var ApplicationRepository
     */
    private $applicationRepository;

    /**
     * @var OrdinaryMemberRepository
     */
    private $ordinaryMemberRepository;

    /**
     * @var Clock
     */
    private $clock;

    /**
     * ApplyForUpgradeToPremium constructor.
     *
     * @param ApplicationRepository    $applicationRepository
     * @param OrdinaryMemberRepository $ordinaryMemberRepository
     * @param Clock                    $clock
     */
    public function __construct(
        ApplicationRepository $applicationRepository,
        OrdinaryMemberRepository $ordinaryMemberRepository,
        Clock $clock
    ) {
        $this->applicationRepository = $applicationRepository;
        $this->ordinaryMemberRepository = $ordinaryMemberRepository;
        $this->clock = $clock;
    }

    /**
     * @param int    $id
     * @param string $name
     * @param string $email
     *
     * @return void
     * @throws Exception
     */
    public function run(int $id, string $name, string $email): void
    {
        $member = $this->ordinaryMemberRepository->findOneByIdAndName($id, $name);

        $application = (new Application())
            ->setMember($member)
            ->setEmail($email)
            ->setAppliedAt($this->clock->getCurrentTime());

        $this->applicationRepository->save($application);
    }
}
