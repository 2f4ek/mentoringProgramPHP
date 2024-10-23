<?php

namespace App\Module2\Observer;

interface Observer
{
    public function update(string $word): void;
}