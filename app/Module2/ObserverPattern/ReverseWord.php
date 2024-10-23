<?php

namespace App\Module2\ObserverPattern;

class ReverseWord implements Observer
{
    private array $reversedText = [];

    public function update(string $word): void
    {
        \array_unshift($this->reversedText, \strrev($word));
    }

    public function getReversedVersion(): string
    {
        return \implode(' ', $this->reversedText);
    }
}