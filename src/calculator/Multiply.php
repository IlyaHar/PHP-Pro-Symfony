<?php

namespace App\calculator;

class Multiply extends Plus
{
    public function count(float|int $a, float|int $b): int|float
    {
        return $a * $b;
    }
}