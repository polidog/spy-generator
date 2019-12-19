<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sample;

class User
{
    /**
     * @var Profile
     */
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function getDisplayName(): string
    {
        return $this->profile->getNickname();
    }
}
