<?php

namespace App\magic;

class ToString
{
    protected string $name;

    public function __toString(): string
    {
        return 'Object ToString';
    }
}

// $obj = new ToString();
// echo $obj;