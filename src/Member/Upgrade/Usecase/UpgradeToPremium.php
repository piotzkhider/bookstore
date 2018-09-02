<?php

namespace PhpMentors\BookStore\Member\Upgrade\Usecase;

use Exception;
use PhpMentors\BookStore\Member\Upgrade\Entity\Application;
use PhpMentors\BookStore\Member\Upgrade\Entity\Upgrade;
use PhpMentors\BookStore\Member\Upgrade\Exception\NotRegularException;
use PhpMentors\BookStore\Member\Upgrade\Repository\UpgradeRepository;
use PhpMentors\BookStore\Member\Upgrade\Specification\RegularSpecification;

class UpgradeToPremium
{
    /**
     * @var UpgradeRepository
     */
    private $repository;

    /**
     * @var RegularSpecification
     */
    private $specification;

    /**
     * UpgradeToPremium constructor.
     *
     * @param UpgradeRepository    $repository
     * @param RegularSpecification $specification
     */
    public function __construct(UpgradeRepository $repository, RegularSpecification $specification)
    {
        $this->repository = $repository;
        $this->specification = $specification;
    }

    /**
     * @param Application $application
     *
     * @return void
     * @throws Exception
     */
    public function run(Application $application): void
    {
        if (! $this->specification->isSatisfiedBy($application->getMember(), $application->getAppliedAt())) {
            throw new NotRegularException();
        }

        $upgrade = (new Upgrade())
            ->setApplication($application);

        $this->repository->save($upgrade);
    }
}
