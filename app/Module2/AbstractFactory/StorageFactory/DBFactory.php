<?php

namespace App\Module2\AbstractFactory\StorageFactory;

use App\Module2\AbstractFactory\DBPersonRepository;

class DBFactory implements StorageFactoryInterface
{
    public function createPersonRepository(): DBPersonRepository
    {
        return new DBPersonRepository();
    }
}