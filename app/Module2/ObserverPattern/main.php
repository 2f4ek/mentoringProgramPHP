<?php

use App\Module2\ObserverPattern\LongestWordKeeper;
use App\Module2\ObserverPattern\NumberCounter;
use App\Module2\ObserverPattern\ReverseWord;
use App\Module2\ObserverPattern\TextScanner;
use App\Module2\ObserverPattern\WordCounter;

require_once './vendor/autoload.php';

$textScanner = new TextScanner('example.txt');
$textScanner->addObserver($wordCounter = new WordCounter());
$textScanner->addObserver($numberCounter = new NumberCounter());
$textScanner->addObserver($longestWordKeeper = new LongestWordKeeper());
$textScanner->addObserver($reverseWord = new ReverseWord());

$textScanner->scanFile();

print_r([
    \sprintf("Words count: %s\n", $wordCounter->getCount()),
    \sprintf("Numbers count: %s\n", $numberCounter->getCount()),
    \sprintf("Longest word: %s\n", $longestWordKeeper->getLongestWord()),
    \sprintf("Reversed version: %s\n", $reverseWord->getReversedVersion())
]);