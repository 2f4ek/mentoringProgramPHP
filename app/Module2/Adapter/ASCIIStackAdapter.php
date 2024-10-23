<?php

namespace App\Module2\Adapter;


readonly class ASCIIStackAdapter implements ASCIIStackInterface
{
    public function __construct(private IntegerStackInterface $integerStack) {}

    public function push(string $char): void
    {
        $asciiValue = \ord($char);
        $this->integerStack->push($asciiValue);
    }

    public function pop(): ?string
    {
        $asciiValue = $this->integerStack->pop();

        return ($asciiValue !== null) ? \chr($asciiValue) : null;
    }
}