<?php

namespace App\Module2\SingletonPattern;

class Superman
{
    private static ?Superman $instance = null;

    public static function getInstance(): Superman
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
