<?php

namespace App\Module2\Observer;

$textScanner = new TextScanner('test.txt');
$textScanner->addObserver($wordCounter = new WordCounter());
$textScanner->addObserver($numberCounter = new NumberCounter());
$textScanner->addObserver($longestWordKeeper = new LongestWordKeeper());
$textScanner->addObserver($reverseWord = new ReverseWord());

$textScanner->scanFile();

print_r([
    sprintf("Words count: %s\n", $wordCounter->getCount()),
    sprintf("Numbers count: %s\n", $numberCounter->getCount()),
    sprintf("Longest word: %s\n", $longestWordKeeper->getLongestWord()),
    sprintf("Reversed version: %s\n", $reverseWord->getReversedVersion())
]);