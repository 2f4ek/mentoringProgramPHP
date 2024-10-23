<?php

namespace App\Module2\Observer;

use http\Exception\InvalidArgumentException;

class TextScanner
{
    private array $observers = [];
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function addObserver(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function notifyObservers(string $word): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($word);
        }
    }

    public function scanFile(): void
    {
        $handle = \fopen($this->fileName, 'rb');

        if (!$handle) {
            throw new InvalidArgumentException(\sprintf("Can't read the file%s", $this->fileName));
        }

        while (($line = \fgets($handle)) !== false) {
            $words = \preg_split('/\s+/', $line);
            foreach ($words as $word) {
                $this->notifyObservers($word);
            }
        }
        \fclose($handle);
    }
}