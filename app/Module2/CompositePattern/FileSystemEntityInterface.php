<?php

namespace App\Module2\CompositePattern;

interface FileSystemEntityInterface
{
    public function getName(): string;

    public function getSize(): int;
}
