<?php

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\StorageFactoryHandler;
use App\Module2\ProxyPattern\PersonRepositoryProxy;

require_once './vendor/autoload.php';

$storageType = \readline("Choose storage type (DB or FS): ");

$type = \strtolower($storageType);
$factory = StorageFactoryHandler::create($type);

echo \sprintf("You choose %s \n", $factory::class);

$repository = new PersonRepositoryProxy($factory->createPersonRepository());
$repository->savePerson(new Person("Alice", 100));
print_r($repository->readPeople());
$person = $repository->readPerson("Alice"); // Cached after first retrieval
echo "Found at first: " . $person->getName() . " with IQ " . $person->getIq() . "\n";
$person = $repository->readPerson("Alice"); // Retrieved from cache
echo "Found at second (cached): " . $person->getName() . " with IQ " . $person->getIq() . "\n";