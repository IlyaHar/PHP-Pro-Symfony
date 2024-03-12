<?php

namespace App\Shortener\Interfaces;

use App\Shortener\ValueObjects\UrlCodePair;

interface IUrlRepository
{
    public function saveEntity(UrlCodePair $urlCodePair): bool;
    public function codeIsset(string $code): bool;
    public function getUrlByCode(string $code): string;
    public function getCodeByUrl(string $url): string;

}