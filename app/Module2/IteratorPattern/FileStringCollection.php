<?php

namespace App\Module2\IteratorPattern;

class FileStringCollection implements StringCollectionInterface
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function getIterator(): StringIteratorInterface
    {
        return new FileStringIterator($this->filePath);
    }
}