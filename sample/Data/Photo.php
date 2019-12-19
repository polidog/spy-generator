<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sample\Data;

class Photo
{
    /**
     * @var string
     */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(string $baseUrl): string
    {
        return $baseUrl.$this->url;
    }
}
