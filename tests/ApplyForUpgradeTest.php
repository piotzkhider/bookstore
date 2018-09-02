<?php

namespace PhpMentors\BookStore;

use DateTimeImmutable;
use PhpMentors\BookStore\Member\Upgrade\Entity\Application;
use PhpMentors\BookStore\Member\Upgrade\Entity\OrdinaryMember;
use PhpMentors\BookStore\Member\Upgrade\Repository\ApplicationRepository;
use PhpMentors\BookStore\Member\Upgrade\Repository\OrdinaryMemberRepository;
use PhpMentors\BookStore\Member\Upgrade\Usecase\ApplyForUpgradeToPremium;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ApplyForUpgradeTest extends TestCase
{
    /**
     * @var ApplyForUpgradeToPremium
     */
    private $SUT;

    /**
     * @var ApplicationRepository|MockObject
     */
    private $applicationRepository;

    /**
     * @var OrdinaryMemberRepository|MockObject
     */
    private $ordinaryMemberRepository;

    /**
     * @var Clock|MockObject
     */
    private $clock;

    public function testRun()
    {
       $this->ordinaryMemberRepository->expects($this->once())
           ->method('findOneByIdAndName')
           ->with(1, 'sato')
           ->willReturn($member = new OrdinaryMember());

       $this->clock->expects($this->once())
           ->method('getCurrentTime')
           ->willReturn($current = new DateTimeImmutable());

       $application = (new Application())
           ->setMember($member)
           ->setEmail('sato@example.com')
           ->setAppliedAt($current);

        $this->applicationRepository->expects($this->once())
            ->method('save')
            ->with($application);

        $this->SUT->run(1, 'sato', 'sato@example.com');
    }

    protected function setUp()
    {
        $this->applicationRepository = $this->getMockBuilder(ApplicationRepository::class)->getMock();
        $this->ordinaryMemberRepository = $this->getMockBuilder(OrdinaryMemberRepository::class)->getMock();
        $this->clock = $this->getMockBuilder(Clock::class)->getMock();

        $this->SUT = new ApplyForUpgradeToPremium($this->applicationRepository, $this->ordinaryMemberRepository, $this->clock);
    }
}
