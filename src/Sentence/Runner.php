<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Polidog\SpyGenerator\Code\ClassCode;
use Zend\Code\Generator\ClassGenerator;

class Runner
{
    /**
     * @var Sentence[]
     */
    private $sentences;

    /**
     * @param Sentence[] $sentences
     */
    public function __construct(array $sentences = [])
    {
        $this->sentences = $sentences;
    }

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
