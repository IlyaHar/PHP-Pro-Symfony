<?php

namespace App\Shortener\ValueObjects;

class UrlCodePair
{
    protected string $code;
    protected string $url;

    public function __construct( string $code, string $url)
    {
        $this->code = $code;
        $this->url = $url;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}