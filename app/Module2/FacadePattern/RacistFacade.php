<?php

declare(strict_types=1);

namespace App\Module2\FacadePattern;

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\PersonRepositoryInterface;

readonly class RacistFacade
{
    public function __construct(private PersonRepositoryInterface $repository)
    {
    }

    public function whoIsTheSmarter(string $person1Name, string $person2Name): Person
    {
        $person1 = $this->repository->readPerson($person1Name);
        $person2 = $this->repository->readPerson($person2Name);
        if (!$person1 || !$person2) {
            throw new \InvalidArgumentException("There is no such person");
        }

        if ($person1->getIq() > $person2->getIq()) {
            return $person1;
        }

        return $person2;
    }

    public function transferIq(string $fromName, string $toName, int $amountToTransfer): void
    {
        $fromPerson = $this->repository->readPerson($fromName);
        $toPerson = $this->repository->readPerson($toName);
        if (!$fromPerson || !$toPerson) {
            throw new \InvalidArgumentException("There is no such person");
        }

        if ($fromPerson->getIq() < $amountToTransfer) {
            throw new \InvalidArgumentException("There is nothing to transfer :(((");
        }

        $fromPerson->setIq($fromPerson->getIq() - $amountToTransfer);
        $toPerson->setIq($toPerson->getIq() + $amountToTransfer);

        $this->repository->updatePerson($fromPerson);
        $this->repository->updatePerson($toPerson);
    }

    public function changeIqByDelta(string $personName, int $delta): void
    {
        $person = $this->repository->readPerson($personName);
        if (!$person) {
            throw new \InvalidArgumentException("There is nothing to transfer :(((");
        }

        $person->setIq($person->getIq() + $delta);

        $this->repository->updatePerson($person);
    }
}