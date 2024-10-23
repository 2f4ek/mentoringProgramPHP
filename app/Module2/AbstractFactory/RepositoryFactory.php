<?php

namespace App\Module2\AbstractFactory;

use InvalidArgumentException;

class RepositoryFactory
{
    public const string DATABASE = 'DB';
    public const string FILE_SYSTEM = 'DB';

    public static function create(string $type): PersonRepositoryInterface
    {
        return match ($type) {
            self::DATABASE => new DBPersonRepository(),
            self::FILE_SYSTEM => new FSPersonRepository(),
            default => throw new InvalidArgumentException("Unknown repository type"),
        };
    }
}
