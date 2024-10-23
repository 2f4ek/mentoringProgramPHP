<?php

namespace App\Module2\IteratorPattern;

class FileStringIterator implements StringIteratorInterface
{
    private $fileHandle;
    private ?string $nextLine;

    public function __construct(string $filePath)
    {
        $this->fileHandle = \fopen($filePath, 'rb');
        $this->nextLine = $this->readNextLine();
    }

    public function hasNext(): bool
    {
        return !empty($this->nextLine);
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