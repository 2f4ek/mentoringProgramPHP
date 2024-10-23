<?php

namespace App\Module2\IteratorPattern;

use http\Exception\InvalidArgumentException;

class FileStringIterator implements StringIteratorInterface
{
    private $fileHandle;
    private ?string $nextLine;

    public function __construct(string $filePath)
    {
        $this->fileHandle = \fopen($filePath, 'rb');
        if (!$this->fileHandle) {
            throw new InvalidArgumentException(\sprintf("Can't read the file%s", $filePath));
        }

        $this->nextLine = $this->readNextLine();
    }

    public function hasNext(): bool
    {
        return $this->nextLine !== false;
    }

    public function getNext(): ?string
    {
        $currentLine = $this->nextLine;
        $this->nextLine = $this->readNextLine();

        return $currentLine;
    }

    private function readNextLine(): ?string
    {
        if (!\feof($this->fileHandle)) {
            return \fgets($this->fileHandle);
        }
        \fclose($this->fileHandle);

        return false;
    }
}