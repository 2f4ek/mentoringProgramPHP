<?php

namespace App\Module2\DecoratorPattern;

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\PersonRepositoryInterface;

class PersonRepositoryDecorator implements PersonRepositoryInterface
{
    public function __construct(private readonly PersonRepositoryInterface $personRepository)
    {
    }

    public function savePerson(Person $person): void
    {
        $this->personRepository->savePerson($person);
    }

    public function readPeople(): array
    {
        return $this->personRepository->readPeople();
    }

    public function readPerson(string $name): ?Person
    {
        return $this->personRepository->readPerson($name);
    }

    public function updatePerson(Person $personToUpdate): void
    {
        $this->personRepository->updatePerson($personToUpdate);
    }
}