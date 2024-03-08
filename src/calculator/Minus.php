<?php

namespace App\calculator;

class Minus implements ICount
{
    public function count(float|int $a, float|int $b): int|float
    {
        return  $a - $b;
    }
}

