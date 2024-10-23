<?php

namespace App\Module2\StrategyPattern;

use http\Exception\InvalidArgumentException;

class SortByNameDesc implements SortingStrategyInterface
{
    public function sort(array &$employees): void
    {
        \usort($employees, static fn($a, $b) => strcmp($b->getName(), $a->getName()));
    }
}
