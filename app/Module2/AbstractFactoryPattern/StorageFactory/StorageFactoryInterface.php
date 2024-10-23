<?php

namespace App\Module2\AbstractFactoryPattern\StorageFactory;

use App\Module2\AbstractFactoryPattern\PersonRepositoryInterface;

interface StorageFactoryInterface
{
    public function createPersonRepository(): PersonRepositoryInterface;
}