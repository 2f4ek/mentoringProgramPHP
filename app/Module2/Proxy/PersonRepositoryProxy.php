<?php

use App\Module2\AbstractFactory\Person;
use App\Module2\AbstractFactory\PersonRepositoryInterface;

class PersonRepositoryProxy implements PersonRepositoryInterface
{
    private PersonRepositoryInterface $realRepository;
    private array $cache = [];

    public function __construct(PersonRepositoryInterface $realRepository)
    {
        $this->realRepository = $realRepository;
    }

    public function savePerson(Person $person): void
    {
        $this->realRepository->savePerson($person);
        $this->cache[$person->getName()] = $person;
    }

    public function readPeople(): array
    {
        return $this->realRepository->readPeople();
    }

    public function readPerson(string $name): Person
    {
        if (isset($this->cache[$name])) {
            return $this->cache[$name];
        }

        $person = $this->realRepository->readPerson($name);
        $this->cache[$name] = $person;
        return $person;
    }

    public function updatePerson(Person $personToUpdate): void
    {
        $this->realRepository->updatePerson($personToUpdate);
        $this->cache[$personToUpdate->getName()] = $personToUpdate;
    }
}