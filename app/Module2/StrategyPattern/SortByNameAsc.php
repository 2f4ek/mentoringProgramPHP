<?php

namespace App\Module2\StrategyPattern;

class SortByNameAsc implements SortingStrategyInterface
{
    public function sort(array &$employees): void
    {
        \usort($employees, static fn($a, $b) => strcmp($a->getName(), $b->getName()));
    }
}
