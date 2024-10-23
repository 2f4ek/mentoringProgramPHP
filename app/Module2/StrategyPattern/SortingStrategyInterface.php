<?php

namespace App\Module2\StrategyPattern;

interface SortingStrategyInterface
{
    public function sort(array &$employees): void;
}
