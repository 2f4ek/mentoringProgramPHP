<?php

namespace App\Module2\ObserverPattern;

class WordCounter implements Observer
{
    private int $count = 0;

    public function update(string $word): void
    {
        $this->count++;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}