<?php

namespace App\magic;

use Error;

class Call
{
    protected string $name;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __call(string $method, array $args): mixed
    {
        $methods = [
            'set' => 'setName',
            'get' => 'getName'
        ];

        if (!isset($methods[$method])) {
            throw new Error('Метод ' . $method . ' не найден');
        } else {
            $currentMethod = $methods[$method];
            return $this->$currentMethod(...$args);
        }
    }
}

//$call = new Call();
//$call->set('Ilya');
//echo $call->get() . PHP_EOL;