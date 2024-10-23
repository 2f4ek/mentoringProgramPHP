<?php

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\StorageFactoryHandler;
use App\Module2\DecoratorPattern\LowerCaseReadPersonDecorator;
use App\Module2\DecoratorPattern\UppercaseWritePersonDecorator;

require_once './vendor/autoload.php';

$storageType = \readline("Choose storage type (DB or FS): ");

$type = \strtolower($storageType);
$factory = StorageFactoryHandler::create($type);

echo \sprintf("You choose %s %s", $factory::class, PHP_EOL);

$repository = $factory->createPersonRepository();
$decoratedRep = new LowerCaseReadPersonDecorator(new UppercaseWritePersonDecorator($repository));

$person = new Person("Alice", 120);
$decoratedRep->savePerson($person);
\print_r($person);

$retrievedPerson = $decoratedRep->readPerson("ALICE");
echo \sprintf("Person name lowercase: %s%s", $retrievedPerson->getName(), PHP_EOL);