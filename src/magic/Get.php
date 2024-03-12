<?php

namespace App\magic;

class Get
{
    protected int $age = 10;
    public function __get(string $var): mixed
    {
        if (!isset($this->$var)) {
            throw new \Error('Такого поля не существует!');
        } else {
            return $this->$var;
        }
    }
}

// $get = new Get();
// echo $get->name . PHP_EOL;
