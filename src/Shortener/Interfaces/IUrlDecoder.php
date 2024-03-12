<?php

namespace App\Shortener\Interfaces;

interface IUrlDecoder
{
    public function decode(string $code): string;
}