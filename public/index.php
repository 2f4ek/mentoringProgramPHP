<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Module2\AbstractFactory\Person;
use App\Module2\AbstractFactory\StorageFactoryHandler;

$factory = StorageFactoryHandler::create('fs');

$repository = $factory->createPersonRepository();
$repository->savePerson(new Person("Alice", 100));
print_r($repository->readPeople());
$foundPerson = $repository->readPerson("Alice");
echo "Found: " . $foundPerson->getName() . " with IQ " . $foundPerson->getIq() . "\n";