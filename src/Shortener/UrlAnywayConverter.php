<?php

namespace App\Shortener;

class UrlAnywayConverter extends UrlConverter
{
    public function encode(string $url): string
    {
        $this->validateUrl($url);
        return $this->generateAndSaveCode($url);
    }
}