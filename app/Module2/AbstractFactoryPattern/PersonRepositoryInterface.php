<?php

namespace App\Module2\AbstractFactoryPattern;

interface PersonRepositoryInterface
{
    public function savePerson(Person $person): void;

    public function readPeople(): array;

    public function readPerson(string $name): ?Person;

    public function updatePerson(Person $personToUpdate): void;
}