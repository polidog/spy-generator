<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use PhpParser\Node;
use Polidog\SpyGenerator\Code\ClassCode;
use Polidog\SpyGenerator\Sentence\TestMethod\MethodSentence;
use Zend\Code\Generator\MethodGenerator;

class SentenceMethodRunner
{
    /**
     * @var MethodSentence[]
     */
    private $methodSentences = [];

    public function add(MethodSentence $methodSentence): void
    {
        $this->methodSentences[] = $methodSentence;
    }

    public function run(MethodGenerator $methodGenerator, Node $node, ClassCode $classCode)
    {
        foreach ($this->methodSentences as $methodSentence) {
            ($methodSentence)($methodGenerator, $node, $classCode);
        }
    }
}
