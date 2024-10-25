<?php

require_once './vendor/autoload.php';

use App\Module2\AdapterPattern\ASCIIStackAdapter;
use App\Module2\AdapterPattern\IntegerStack;

$asciiStackAdapter = new ASCIIStackAdapter(new IntegerStack());

$asciiStackAdapter->push('A');
$asciiStackAdapter->push('B');
$asciiStackAdapter->push('C');

echo $asciiStackAdapter->pop() . PHP_EOL;
echo $asciiStackAdapter->pop() . PHP_EOL;
echo $asciiStackAdapter->pop() . PHP_EOL;
echo $asciiStackAdapter->pop() . PHP_EOL;