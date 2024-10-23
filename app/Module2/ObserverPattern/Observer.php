<?php

namespace App\Module2\ObserverPattern;

interface Observer
{
    public function update(string $word): void;
}