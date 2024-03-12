<?php

namespace App\calculator;

interface ICount
{
   public function count(int|float $a, int|float $b): int|float;
}