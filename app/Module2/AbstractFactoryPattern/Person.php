<?php

namespace App\Module2\AbstractFactoryPattern;

class Person
{
    public function __construct(private string $name, private int $iq = 0)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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
