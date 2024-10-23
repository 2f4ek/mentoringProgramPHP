<?php

namespace App\Module2\AbstractFactory;

class Person
{
    public function __construct(private readonly string $name, private int $iq = 0)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIq(): int
    {
        return $this->iq;
    }

    public function setIq(int $iq): void
    {
        $this->iq = $iq;
    }
}
