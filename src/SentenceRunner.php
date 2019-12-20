<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Polidog\SpyGenerator\Code\ClassCode;
use Polidog\SpyGenerator\Sentence\Sentence;
use Zend\Code\Generator\ClassGenerator;

class SentenceRunner
{
    /**
     * @var Sentence[]
     */
    private $sentences = [];

    public function add(Sentence $sentence): void
    {
        $this->sentences[] = $sentence;
    }

    public function run(ClassGenerator $generator, ClassCode $classCode): void
    {
        foreach ($this->sentences as $sentence) {
            ($sentence)($generator, $classCode);
        }
    }
}
