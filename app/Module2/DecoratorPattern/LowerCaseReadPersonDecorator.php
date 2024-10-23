<?php

namespace App\Module2\DecoratorPattern;

use App\Module2\AbstractFactoryPattern\Person;
use http\Exception\InvalidArgumentException;

class LowerCaseReadPersonDecorator extends PersonRepositoryDecorator
{
    public function readPeople(): array
    {
        $people = parent::readPeople();
        foreach ($people as $person) {
            $person->setName(strtolower($person->getName()));
        }
        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        $person = parent::readPerson($name);
        if (!$person) {
            throw new InvalidArgumentException('There is no such person!');
        }

        $person->setName(strtolower($person->getName()));

        return $person;
    }
}