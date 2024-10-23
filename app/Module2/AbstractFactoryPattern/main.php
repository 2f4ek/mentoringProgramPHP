<?php

require_once './vendor/autoload.php';

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\StorageFactoryHandler;

$storageType = \readline("Choose storage type (DB or FS): ");

$type = \strtolower($storageType);
$factory = StorageFactoryHandler::create($type);

echo \sprintf("You choose %s %s", $factory::class, PHP_EOL);

$repository = $factory->createPersonRepository();
$repository->savePerson(new Person("Alice", 100));

\print_r($repository->readPeople());

$foundPerson = $repository->readPerson("Alice");
echo \sprintf("Found: %s with IQ %s%s", $foundPerson->getName(), $foundPerson->getIq(), PHP_EOL);