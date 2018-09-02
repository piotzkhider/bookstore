<?php

namespace PhpMentors\BookStore;

use DateTimeImmutable;
use Exception;
use PhpMentors\BookStore\Member\Upgrade\Entity\Application;
use PhpMentors\BookStore\Member\Upgrade\Entity\OrdinaryMember;
use PhpMentors\BookStore\Member\Upgrade\Entity\Upgrade;
use PhpMentors\BookStore\Member\Upgrade\Exception\NotRegularException;
use PhpMentors\BookStore\Member\Upgrade\Repository\UpgradeRepository;
use PhpMentors\BookStore\Member\Upgrade\Specification\RegularSpecification;
use PhpMentors\BookStore\Member\Upgrade\Usecase\UpgradeToPremium;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UpgradeToPremiumTest extends TestCase
{
    /**
     * @var UpgradeToPremium
     */
    private $SUT;

    /**
     * @var UpgradeRepository|MockObject
     */
    private $upgradeRepository;

    /**
     * @var RegularSpecification|MockObject
     */
    private $specification;

    public function testRun()
    {
        $application = (new Application())
            ->setMember($member = new OrdinaryMember())
            ->setAppliedAt($datetime = new DateTimeImmutable());

        $upgrade = (new Upgrade())
            ->setApplication($application);

        $this->specification->expects($this->once())
            ->method('isSatisfiedBy')
            ->with($member, $datetime)
            ->willReturn(true);

        $this->upgradeRepository->expects($this->once())
            ->method('save')
            ->with($upgrade);

        $this->SUT->run($application);
    }

    public function testRun__申請日より1年以内に10件以上の購入履歴がない場合_常連ではない場合_例外()
    {
        $application = (new Application())
            ->setMember($member = new OrdinaryMember())
            ->setAppliedAt($datetime = new DateTimeImmutable());

        $this->specification->expects($this->once())
            ->method('isSatisfiedBy')
            ->with($member, $datetime)
            ->willReturn(false);

        $this->expectException(NotRegularException::class);

        $this->SUT->run($application);
    }

    protected function setUp()
    {
        $this->upgradeRepository = $this->getMockBuilder(UpgradeRepository::class)->getMock();
        $this->specification = $this->getMockBuilder(RegularSpecification::class)->getMock();

        $this->SUT = new UpgradeToPremium($this->upgradeRepository, $this->specification);
    }
}
