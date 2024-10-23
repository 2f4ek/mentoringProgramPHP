<?php

namespace App\Module2\ProxyPattern;

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\PersonRepositoryInterface;

class PersonRepositoryProxy implements PersonRepositoryInterface
{
    private array $personsList = [];

    public function __construct(private readonly PersonRepositoryInterface $repository)
    {
    }

    public function savePerson(Person $person): void
    {
        $this->repository->savePerson($person);
    }

    public function readPeople(): array
    {
        return $this->repository->readPeople();
    }

    public function readPerson(string $name): ?Person
    {
        if (isset($this->personsList[$name])) {
            return $this->personsList[$name];
        }

        $person = $this->repository->readPerson($name);
        if ($person !== null) {
            $this->personsList[$name] = $person;
        }

        return $person;
    }

    public function updatePerson(Person $personToUpdate): void
    {
        $this->repository->updatePerson($personToUpdate);
    }
}