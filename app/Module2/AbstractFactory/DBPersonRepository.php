<?php

namespace App\Module2\AbstractFactory;

class DBPersonRepository implements PersonRepositoryInterface
{
    private array $database = [];

    public function savePerson(Person $person): void
    {
        $this->database[$person->getName()] = $person;
    }

    public function readPeople(): array
    {
        return array_values($this->database);
    }

    public function readPerson(string $name): ?Person
    {
        return $this->database[$name] ?? null;
    }

    public function updatePerson(Person $personToUpdate): void
    {
        $this->database[$personToUpdate->getName()] = $personToUpdate;
    }
}