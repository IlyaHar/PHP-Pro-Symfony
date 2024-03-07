<?php

interface ICount
{
    public function plus(int $a, int $b): int;
    public function minus(int $a, int $b): int;
}

interface ICount2
{
    public function multiple(int $a, int $b): int;
    public function division(int $a, int $b): int;
}

class GoodCalculator implements ICount, ICount2
{
    public function plus(int $a, int $b): int
    {
        return $a + $b;
    }

    public function minus(int $a, int $b): int
    {
        return $a - $b;
    }

    public function multiple(int $a, int $b): int
    {
        return $a * $b;
    }

    public function division(int $a, int $b): int
    {
        return $a / $b;
    }
}

class BetterCalculator implements ICount, ICount2
{
    public function plus(int $a, int $b): int
    {
        return $a + $b + 5;
    }

    public function minus(int $a, int $b): int
    {
        return $a - $b - 5;
    }

    public function multiple(int $a, int $b): int
    {
        return $a * $b * 5;
    }

    public function division(int $a, int $b): int
    {
        return $a / $b / 5;
    }
}

class BestCalculator extends GoodCalculator
{
    public function plus(int $a, int $b): int
    {
        return $a + $b + rand(1, 10);
    }

    public function minus(int $a, int $b): int
    {
        return $a - $b - rand(1, 10);
    }

    public function multiple(int $a, int $b): int
    {
        return $a * $b * rand(1, 10);
    }

    public function division(int $a, int $b): int
    {
        if ($a == 0 || $b == 0) {
            throw new InvalidArgumentException('Делить на 0 нельзя');
        }

        return $a / $b / rand(1, 10);
    }
}


$calculator = new BestCalculator();
echo $calculator->plus(5,5) . PHP_EOL;