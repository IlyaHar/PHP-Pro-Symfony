<?php

namespace App\calculator;

class GoodCalculator
{
    protected ICount $count;

    public function __construct(ICount $count)
    {
        $this->count = $count;
    }

    public function count(int|float $a, int|float $b): int|float
    {
       return $this->count->count($a, $b);
    }
}

//$calculator = new GoodCalculator(new Minus());
//echo $calculator->count(5, 5) . PHP_EOL;