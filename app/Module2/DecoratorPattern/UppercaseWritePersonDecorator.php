<?php

namespace App\Module2\DecoratorPattern;

use App\Module2\AbstractFactoryPattern\Person;

class UppercaseWritePersonDecorator extends PersonRepositoryDecorator
{
    public function savePerson(Person $person): void
    {
        $person->setName(strtoupper($person->getName()));
        parent::savePerson($person);
    }
}