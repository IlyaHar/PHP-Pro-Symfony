<?php

namespace App\calculator;

class Division extends Minus
{
    public function count(float|int $a, float|int $b): int|float
    {
        return $a / $b;
    }
}