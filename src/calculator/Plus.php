<?php

namespace App\calculator;

class Plus implements ICount
{
    public function count(float|int $a, float|int $b): int|float
    {
        return $a + $b;
    }
}


