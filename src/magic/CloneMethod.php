<?php

namespace App\magic;

use DateTime;

class CloneMethod
{
    public DateTime $date;

    public function __construct()
    {
        $this->date = new DateTime();
    }

    public function __clone(): void
    {
        $this->date = clone $this->date;
    }
}

//$o1 = new CloneMethod();
//$o2 = clone $o1;
//$o2->date->modify('+1YEAR');