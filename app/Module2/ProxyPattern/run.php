<?php

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\StorageFactoryHandler;
use App\Module2\ProxyPattern\PersonRepositoryProxy;

require_once './vendor/autoload.php';

$storageType = \readline("Choose storage type (DB or FS): ");

$type = \strtolower($storageType);
$factory = StorageFactoryHandler::create($type);

echo \sprintf("You choose %s %s", $factory::class, PHP_EOL);

$repository = new PersonRepositoryProxy($factory->createPersonRepository());
$repository->savePerson(new Person("Alice", 100));
print_r($repository->readPeople());
$person = $repository->readPerson("Alice");

echo \sprintf("Not cached: %s with IQ %s%s", $person->getName(), $person->getIq(), PHP_EOL);

$person = $repository->readPerson("Alice");
echo \sprintf("Cached: %s with IQ %s%s", $person->getName(), $person->getIq(), PHP_EOL);
