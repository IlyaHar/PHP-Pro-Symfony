<?php

namespace App\magic;

class Invoke
{
    public function __invoke(string $name): void
    {
        echo $name;
    }
}

//$invoke = new Invoke();
//$invoke('Ilya' . PHP_EOL);