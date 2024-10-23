<?php

namespace App\Module2\Adapter;

interface IntegerStackInterface
{
    public function push(int $integer): void;

    public function pop(): ?int;
}