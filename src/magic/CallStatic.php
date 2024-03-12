<?php

namespace App\magic;

use Error;

class CallStatic
{
    protected static string $name;

    public static function setName(string $name): void
    {
        self::$name = $name;
    }

    public static function getName(): string
    {
        return self::$name;
    }

    public static function __callStatic(string $method, array $args): mixed
    {
        $methods = [
            'set' => 'setName',
            'get' => 'getName',
        ];

        if (!isset($methods[$method])) {
            throw new Error('Метод ' . $method . ' не найден');
        } else {
            $currentMethod = $methods[$method];
            return self::$currentMethod(...$args);
        }
    }
}

//CallStatic::set('Ilya');
//echo CallStatic::get() . PHP_EOL;

