<?php

namespace App\Module2\AdapterPattern;

interface IntegerStackInterface
{
    public function push(int $integer): void;

    public function pop(): ?int;
}