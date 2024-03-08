<?php

namespace App\magic;

class UnsetMethod
{
    public function __unset(string $name): void
    {
        echo 'Вызывается при удалении не существующего поля';
    }

}

//$unset = new UnsetMethod();
//unset($unset->name);
//echo PHP_EOL;