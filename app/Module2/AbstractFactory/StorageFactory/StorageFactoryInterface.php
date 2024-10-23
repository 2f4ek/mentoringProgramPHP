<?php

namespace App\Module2\AbstractFactory\StorageFactory;

use App\Module2\AbstractFactory\PersonRepositoryInterface;

interface StorageFactoryInterface
{
    public function createPersonRepository(): PersonRepositoryInterface;
}