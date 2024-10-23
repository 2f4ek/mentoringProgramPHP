<?php

namespace App\Module2\Adapter;

$asciiStackAdapter = new ASCIIStackAdapter(new IntegerStack());

$asciiStackAdapter->push('A');
$asciiStackAdapter->push('B');
$asciiStackAdapter->push('C');

echo $asciiStackAdapter->pop();
echo $asciiStackAdapter->pop();
echo $asciiStackAdapter->pop();
echo $asciiStackAdapter->pop();