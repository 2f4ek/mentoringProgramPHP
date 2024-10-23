<?php

require_once './vendor/autoload.php';

use App\Module2\AbstractFactoryPattern\Person;
use App\Module2\AbstractFactoryPattern\StorageFactoryHandler;
use App\Module2\FacadePattern\RacistFacade;

$storageType = \readline("Choose storage type (DB or FS): ");

$type = \strtolower($storageType);
$factory = StorageFactoryHandler::create($type);

echo \sprintf("You choose %s%s", $factory::class, PHP_EOL);

$repository = $factory->createPersonRepository();
$manager = new RacistFacade($repository);

$person = new Person("White", 120);
$repository->savePerson($person);

$person = new Person("Black", 80);
$repository->savePerson($person);

echo \sprintf("%s is smarter%s", $manager->whoIsTheSmarter("White", "Black")->getName(), PHP_EOL);

echo \sprintf("Transferring 10 IQ: %s", PHP_EOL);
$manager->transferIq("Black", "White", 10);

echo \sprintf("White IQ: %s%s", $repository->readPerson("White")->getIq(), PHP_EOL);
echo \sprintf("Black IQ: %s%s", $repository->readPerson("Black")->getIq(), PHP_EOL);

$manager->changeIqByDelta("Black", -5);

echo \sprintf("Black IQ after reduction: %s%s", $repository->readPerson("Black")->getIq(), PHP_EOL);