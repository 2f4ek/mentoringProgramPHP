<?php

namespace App\Module2\AbstractFactoryPattern\StorageFactory;

use App\Module2\AbstractFactoryPattern\DBPersonRepository;

class FSFactory implements StorageFactoryInterface
{
    public function createPersonRepository(): DBPersonRepository
    {
        return new DBPersonRepository();
    }
}