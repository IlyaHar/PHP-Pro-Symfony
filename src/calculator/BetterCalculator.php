<?php

namespace App\calculator;

class BetterCalculator extends GoodCalculator
{
    protected ICount $count;

    public function __construct(ICount $count)
    {
        parent::__construct($count);
    }

    public function count(int|float $a, int|float $b): int|float
    {
        return $this->count->count($a, $b) + 10;
    }
}

//$calculator = new BetterCalculator(new Multiply());
//echo $calculator->count(5, 5) . PHP_EOL;