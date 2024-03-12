<?php

namespace App\Shortener\Helpers;

use App\Shortener\Interfaces\IUrlValidator;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\InvalidArgumentException;

class UrlValidator implements IUrlValidator
{

    public function __construct(protected ClientInterface $client)
    {
    }


    public function validateUrl(string $url): true
    {
        if (!isset($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Url is not correct');
        }
        return true;
    }

    public function checkRealUrl(string $url): true
    {
        $codes = [
            200, 201, 301, 302
        ];

        try {
            $response = $this->client->get($url);
            return (!empty($response->getStatusCode() && in_array($response->getStatusCode(), $codes)));
        } catch (ConnectException $exception) {
            throw new InvalidArgumentException($exception->getMessage(), $exception->getCode());
        }
    }
}