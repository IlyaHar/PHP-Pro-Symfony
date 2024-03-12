<?php

namespace App\magic;

class Set
{
    public function __set(string $var, mixed $value): void
    {
        echo $var = $value;
    }
}

//$set = new Set();
//$set->value = 'value' . PHP_EOL;