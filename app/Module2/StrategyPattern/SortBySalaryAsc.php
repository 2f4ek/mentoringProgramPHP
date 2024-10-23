<?php

namespace App\Module2\StrategyPattern;

use http\Exception\InvalidArgumentException;

class SortBySalaryAsc implements SortingStrategyInterface
{
    public function sort(array &$employees): void
    {
        \usort($employees, static fn($a, $b) => $a->getSalary() <=> $b->getSalary());
    }
}
