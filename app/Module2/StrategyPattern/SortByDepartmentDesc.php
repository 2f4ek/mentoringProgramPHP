<?php

namespace App\Module2\StrategyPattern;

class SortByDepartmentDesc implements SortingStrategyInterface
{
    public function sort(array &$employees): void
    {
        \usort($employees, static fn($a, $b) => strcmp($b->getDepartment(), $a->getDepartment()));
    }
}
