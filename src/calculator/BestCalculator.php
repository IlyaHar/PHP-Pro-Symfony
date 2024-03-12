<?php

namespace App\calculator;

use Error;

class BestCalculator implements ICount
{
    protected ICount $count;

    public function __construct(ICount $count)
    {
        $this->count = $count;
    }

    public function count(float|int $a, float|int $b): int|float
    {
        return $this->count->count($a, $b) + rand(1, 10);
    }
}

// $calculator = new BestCalculator(new Plus());
// echo $calculator->count(5, 5) . PHP_EOL;