<?php

namespace App\Module2\AbstractFactory;

use InvalidArgumentException;

class RepositoryFactory
{
    public static function create(string $type): PersonRepositoryInterface
    {
        if ($type === 'DB') {
            return new DBPersonRepository();
        } elseif ($type === 'FS') {
            return new FSPersonRepository();
        } else {
            throw new InvalidArgumentException("Unknown repository type");
        }
    }
}
