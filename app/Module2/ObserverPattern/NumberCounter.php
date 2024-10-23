<?php

namespace App\Module2\ObserverPattern;

class NumberCounter implements Observer
{
    private int $count = 0;

    public function update(string $word): void
    {
        !\is_numeric($word) ?: $this->count++;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}