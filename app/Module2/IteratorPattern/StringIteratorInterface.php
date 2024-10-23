<?php

namespace App\Module2\IteratorPattern;

interface StringIteratorInterface
{
    public function hasNext(): bool;

    public function getNext(): ?string;
}