<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

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

    public function add(Sentence $sentence)
    {
        $this->sentences[] = $sentence;
    }

    public function resolve(ClassGenerator $generator): void
    {
        foreach ($this->sentences as $sentence) {
            ($sentence)($generator);
        }
    }
}
