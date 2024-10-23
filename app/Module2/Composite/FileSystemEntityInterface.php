<?php

namespace App\Module2\Composite;

interface FileSystemEntityInterface
{
    public function getName(): string;

    public function getSize(): int;
}
