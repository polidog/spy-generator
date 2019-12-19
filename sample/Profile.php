<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sample;

class Profile
{
    /**
     * @var string
     */
    private $nickname;

    public function __construct(string $nickname)
    {
        $this->nickname = $nickname;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }
}
