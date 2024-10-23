<?php

namespace App\Module2\IteratorPattern;

interface StringCollectionInterface
{
    public function getIterator(): StringIteratorInterface;
}