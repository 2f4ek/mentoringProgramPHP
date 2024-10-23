<?php

namespace App\Module2\CompositePattern;

readonly class FileEntity implements FileSystemEntityInterface
{
    public function __construct(private string $name, private int $size)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
