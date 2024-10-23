<?php

namespace App\Module2\IteratorPattern;

class InMemoryStringCollection implements StringCollectionInterface
{
    private array $strings;

    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    public function getIterator(): StringIteratorInterface
    {
        return new ArrayStringIterator($this->strings);
    }
}