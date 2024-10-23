<?php

namespace App\Module2\StrategyPattern;

class SortByDepartmentAsc implements SortingStrategyInterface
{
    public function sort(array &$employees): void
    {
        \usort($employees, static fn($a, $b) => strcmp($a->getDepartment(), $b->getDepartment()));
    }
}
