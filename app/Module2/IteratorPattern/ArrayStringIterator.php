<?php

namespace App\Module2\IteratorPattern;

class ArrayStringIterator implements StringIteratorInterface
{
    private array $strings;
    private int $currentIndex = 0;

    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    public function hasNext(): bool
    {
        return $this->currentIndex < count($this->strings);
    }

    public function getNext(): ?string
    {
        if ($this->hasNext()) {
            return $this->strings[$this->currentIndex++];
        }

        return null;
    }
}