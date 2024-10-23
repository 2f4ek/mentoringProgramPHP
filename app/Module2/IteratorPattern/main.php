<?php

require_once './vendor/autoload.php';

use App\Module2\IteratorPattern\FileStringCollection;
use App\Module2\IteratorPattern\InMemoryStringCollection;

$memoryCollection = new InMemoryStringCollection(['Lorem', 'ipsum', 'dolor', 'sit amet', 'consectetur']);
$iterator = $memoryCollection->getIterator();

while ($iterator->hasNext()) {
    echo $iterator->getNext() . PHP_EOL;
}

$fileCollection = new FileStringCollection('example.txt');
$fileIterator = $fileCollection->getIterator();

while ($fileIterator->hasNext()) {
    echo $fileIterator->getNext();
}