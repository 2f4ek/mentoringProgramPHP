<?php

namespace App\Module2\CompositePattern;

class DirectoryEntity implements FileSystemEntityInterface
{
    private array $children = [];

    public function __construct(private readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        $totalSize = 0;
        foreach ($this->children as $child) {
            $totalSize += $child->getSize();
        }
        return $totalSize;
    }

    public function add(FileSystemEntityInterface $fileSystemEntity): void
    {
        $this->children[] = $fileSystemEntity;
    }

    public function remove(FileSystemEntityInterface $fileSystemEntity): void
    {
        foreach ($this->children as $index => $child) {
            if ($child === $fileSystemEntity) {
                unset($this->children[$index]);
                $this->children = array_values($this->children);
                break;
            }
        }
    }

    public function listContent(): array
    {
        return $this->children;
    }
}
