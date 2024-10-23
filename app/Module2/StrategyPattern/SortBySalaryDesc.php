<?php

namespace App\Module2\StrategyPattern;

class SortBySalaryDesc implements SortingStrategyInterface
{
    public function sort(array &$employees): void
    {
        \usort($employees, static fn($a, $b) => $b->getSalary() <=> $a->getSalary());
    }
}
