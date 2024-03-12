<?php

class SomeClass
{

    protected string $name;
    public DateTime $date;

    protected array $vars = [
        'a' => 1,
        'b' => 2,
        'name' => 'NoName'
    ];

    public function __construct(string $name)
    {
        // validation
        $this->name = $name;
        $this->date = new DateTime();
    }

    public function sayHello(): void
    {
        echo 'Hello' . PHP_EOL;
    }

    public function sayHelloUser(): void
    {
        echo 'Hello, ' . $this->name . PHP_EOL;
    }

    public function __destruct()
    {
        // echo 'Деструктор сработал!' . PHP_EOL;
    }

    public function __call(string $method, array $args): mixed
    {
        $methods = [
            'say' => 'sayHello',
            'say2' => 'sayHelloUser'
        ];

        if (!isset($methods[$method])) {
            throw new Error('Method not found');
        }

        $currentMethods = $methods[$method];
        return $this->$currentMethods($args);
    }

    public static function __callStatic(string $method, array $args): mixed
    {
        $methods = [
            'sss' => 'sayHelloStatic',
        ];

        if (!isset($methods[$method])) {
            throw new Error('Method not found');
        }

        $currentMethods = $methods[$method];
        return self::$currentMethods($args);
    }

    public static function sayHelloStatic(): void
    {
        echo 'Hello' . PHP_EOL;
    }

    public function __get(string $var): mixed
    {
        if (!isset($this->vars[$var])) {
            throw new Error('Argument not found');
        }

        return $this->vars[$var];
    }

    public function __set(string $var, $value): void
    {
        $this->vars[$var] = $value;
    }

    public function __serialize(): array
    {
        return [
            'vars' => $this->vars,
            'date' => $this->date->format('Y-m-d, H:i:s'),
            'name' => $this->name
        ];
    }


    public function __unserialize(array $data): void
    {
        $this->date = new DateTime($data['date']);
    }

//    public function __sleep(): array
//    {
//        return [
//            'vars', 'date'
//        ];
//    }
//
//    public function __wakeup(): void
//    {
//        $this->name = 'qqq';
//    }
}

$some = new SomeClass('Ilya');
$some2 = clone $some;
$some2->a = 3;
$some2->date->modify('+1YEAR');
exit;