<?php

namespace App\Shortener;

use App\Shortener\Exceptions\DataNotFoundException;
use App\Shortener\Interfaces\IUrlDecoder;
use App\Shortener\Interfaces\IUrlEncoder;
use App\Shortener\Interfaces\IUrlRepository;
use App\Shortener\Interfaces\IUrlValidator;
use App\Shortener\ValueObjects\UrlCodePair;
use http\Exception\InvalidArgumentException;

class UrlConverter implements IUrlEncoder, IUrlDecoder
{
    const CODE_LENGTH = 6;
    const CODE_CHAIRS = 'fokmasdioj8q482314u2e';

    protected IUrlValidator $validate;
    protected IUrlRepository $repository;
    protected int $codeLength = self::CODE_LENGTH;

    public function __construct(IUrlValidator $validate, IUrlRepository $repository, int $codeLength)
    {
        $this->validate = $validate;
        $this->repository = $repository;
        $this->codeLength = $codeLength;
    }

    public function encode(string $url): string
    {
        $this->validateUrl($url);
        try {
            $code = $this->repository->getCodeByUrl($url);
        } catch (DataNotFoundException) {
            $code = $this->generateAndSaveCode($url);
        }
        return $code;
    }

    public function decode(string $code): string
    {
        try {
            $url = $this->repository->getUrlByCode($code);
        } catch (DataNotFoundException $e) {
            throw new InvalidArgumentException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        }
        return $url;
    }

    protected function generateAndSaveCode(string $url): string
    {
        $code = $this->generateUniqueCode();
        $this->repository->saveEntity(new UrlCodePair($code, $url));
        return $code;
    }

    protected function validateUrl(string $url): true
    {
        $this->validate->validateUrl($url);
        $this->validate->checkRealUrl($url);
        return true;
    }

    protected function generateUniqueCode(): string
    {
        $date = new \DateTime();
        $str = static::CODE_CHAIRS . mb_strtoupper(static::CODE_CHAIRS) . $date->getTimestamp();
        $code = substr(str_shuffle($str), 0, $this->codeLength);
        if ($this->repository->codeIsset($code)) {
            $code = $this->generateUniqueCode();
        }
        return $code;
    }
}