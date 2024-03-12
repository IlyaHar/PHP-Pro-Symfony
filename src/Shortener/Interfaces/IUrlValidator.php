<?php

namespace App\Shortener\Interfaces;

interface IUrlValidator
{
    public function validateUrl(string $url): true;
    public function checkRealUrl(string $url): true;

}