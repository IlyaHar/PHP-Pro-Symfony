<?php

namespace App\Shortener;

use App\Shortener\Exceptions\DataNotFoundException;
use App\Shortener\Interfaces\IUrlRepository;
use App\Shortener\ValueObjects\UrlCodePair;

class FileRepository implements IUrlRepository
{
    protected array $db = [];

    public function __construct(protected string $fileDb)
    {
        $this->getDbFromStorage();
    }

    protected function getDbFromStorage(): void
    {
        if (file_exists($this->fileDb)) {
            $content = file_get_contents($this->fileDb);
            $this->db = (array) json_decode($content, true);
        }
    }

    public function saveEntity(UrlCodePair $urlCodePair): bool
    {
        $this->db[$urlCodePair->getCode()] = $urlCodePair->getUrl();
        return true;
    }

    public function codeIsset(string $code): bool
    {
        return isset($this->db[$code]);
    }

    public function getUrlByCode(string $code): string
    {
        if (!$this->codeIsset($code)) {
            throw new DataNotFoundException();
        }
        return $this->db[$code];
    }

    public function getCodeByUrl(string $url): string
    {

        if (!$code = array_search($url, $this->db)) {
            throw new DataNotFoundException();
        }
        return $code;
    }

    protected function writeCode(string $content): void
    {
        $file = fopen($this->fileDb, 'w+');
        fwrite($file, $content);
        fclose($file);
    }

    public function __destruct()
    {
        $this->writeCode(json_encode($this->db, JSON_PRETTY_PRINT));
    }
}