<?php

namespace App\Shortener\Interfaces;

interface IUrlEncoder
{
    public function encode(string $url): string;
}