<?php

use App\Module2\AbstractFactory\Person;
use App\Module2\AbstractFactory\StorageFactoryHandler;
use App\Module2\Facade\RacistFacade;


$storageType = \readline("Choose storage type (DB or FS): ");

$type = \strtolower($storageType);
$factory = StorageFactoryHandler::create($type);

echo \sprintf("You choose %s \n", $factory::class);

$repository = $factory->createPersonRepository();
$manager = new RacistFacade($repository);

$person = new Person("White", 120);
$repository->savePerson($person);

$person = new Person("Black", 80);
$repository->savePerson($person);

echo $manager->whoIsTheSmarter("White", "Black")->getName() . " is smarter.\n";

echo "Transferring 10 IQ: \n";
$manager->transferIq("Black", "White", 10);

echo "White IQ: " . $repository->readPerson("White")->getIq() . "\n";
echo "Black IQ: " . $repository->readPerson("Black")->getIq() . "\n";

$manager->changeIqByDelta("Black", -5);

echo "Black IQ after reduction: " . $repository->readPerson("Black")->getIq() . "\n";