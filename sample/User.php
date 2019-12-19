<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sample;

use Polidog\SpyGenerator\Sample\Data\Photo;
use Polidog\SpyGenerator\Sample\Data\Profile;

class User
{
    /**
     * @var Profile
     */
    private $profile;

    /**
     * @var Photo
     */
    private $photo;

    public function __construct(Profile $profile, Photo $photo)
    {
        $this->profile = $profile;
        $this->photo = $photo;
    }

    public function getDisplayName(): string
    {
        return $this->profile->getNickname();
    }

    public function getPhotoURL(): string
    {
        return $this->photo->getUrl();
    }
}
