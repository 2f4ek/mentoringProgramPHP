<?php

require_once './vendor/autoload.php';

use App\Module2\AbstractFactory\Person;
use App\Module2\AbstractFactory\StorageFactoryHandler;


$storageType = \readline("Choose storage type (DB or FS): ");

$type = \strtolower($storageType);
$factory = StorageFactoryHandler::create($type);

echo \sprintf("You choose %s \n", $factory::class);

$repository = $factory->createPersonRepository();
$repository->savePerson(new Person("Alice", 100));

\print_r($repository->readPeople());

$foundPerson = $repository->readPerson("Alice");
echo \sprintf("Found: %s with IQ %s\n", $foundPerson->getName(), $foundPerson->getIq());