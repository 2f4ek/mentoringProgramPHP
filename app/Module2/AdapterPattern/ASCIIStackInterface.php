<?php

namespace App\Module2\AdapterPattern;

interface ASCIIStackInterface
{
    public function push(string $char): void;

    public function pop(): ?string;
}