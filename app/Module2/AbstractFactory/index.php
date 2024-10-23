<?php

use App\Module2\AbstractFactory\Person;
use App\Module2\AbstractFactory\RepositoryFactory;

$repository = RepositoryFactory::create(RepositoryFactory::FILE_SYSTEM);

$person = new Person("New Person Name");
$repository->savePerson($person);

$loadedPeople = $repository->readPeople();
$specificPerson = $repository->readPerson("New Person Name");

print_r($loadedPeople);
print_r($specificPerson);
