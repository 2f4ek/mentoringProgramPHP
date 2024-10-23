<?php

namespace App\Module2\AdapterPattern;

class IntegerStack implements IntegerStackInterface
{
    private array $stack = [];

    public function push(int $integer): void
    {
        $this->stack[] = $integer;
    }

    public function pop(): ?int
    {
        return \array_pop($this->stack);
    }
}