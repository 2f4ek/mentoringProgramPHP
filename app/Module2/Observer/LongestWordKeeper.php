<?php

namespace App\Module2\Observer;

class LongestWordKeeper implements Observer
{
    private string $longestWord = '';

    public function update(string $word): void
    {
        if (\strlen($word) > \strlen($this->longestWord)) {
            $this->longestWord = $word;
        }
    }

    public function getLongestWord(): string
    {
        return $this->longestWord;
    }
}