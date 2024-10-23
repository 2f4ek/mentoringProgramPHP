<?php

namespace App\Module2\AbstractFactoryPattern;

use App\Module2\AbstractFactoryPattern\StorageFactory\DBFactory;
use App\Module2\AbstractFactoryPattern\StorageFactory\FSFactory;
use App\Module2\AbstractFactoryPattern\StorageFactory\StorageFactoryInterface;
use InvalidArgumentException;

class StorageFactoryHandler
{
    public const string DATABASE = 'db';
    public const string FILE_SYSTEM = 'fs';

    public static function create(string $type): StorageFactoryInterface
    {
        return match ($type) {
            self::DATABASE => new DBFactory(),
            self::FILE_SYSTEM => new FSFactory(),
            default => throw new InvalidArgumentException("Unknown repository type"),
        };
    }
}
