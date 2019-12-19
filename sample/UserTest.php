<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sample;

use PHPUnit\Framework\TestCase;
use Polidog\SpyGenerator\Sample\Data\Photo;
use Polidog\SpyGenerator\Sample\Data\Profile;

class UserTest extends TestCase
{
    /**
     * @var Profile
     */
    private $profile;

    /**
     * @var Photo
     */
    private $photo;

    protected function setUp(): void
    {
        $this->profile = $this->prophesize(Profile::class);
        $this->photo = $this->prophesize(Photo::class);
    }

    public function testGetDisplayName(): void
    {
        $this->profile->getNickname()
            ->willReturn('hoge');

        $user = new User($this->profile->reveal(), $this->photo->reveal());
        $user->getDisplayName();

        $this->profile->getNickname()
            ->shouldHaveBeenCalledOnce();
    }
}
