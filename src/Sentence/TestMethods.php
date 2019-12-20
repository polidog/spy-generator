<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Polidog\SpyGenerator\Code\ClassCode;
use Polidog\SpyGenerator\SentenceMethodRunner;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class TestMethods implements Sentence
{
    /**
     * @var SentenceMethodRunner
     */
    private $runner;

    public function __construct(SentenceMethodRunner $runner)
    {
        $this->runner = $runner;
    }

    public function __invoke(ClassGenerator $generator, ClassCode $classCode): void
    {
        $methodNodes = $classCode->ast->methods();
        foreach ($methodNodes as $node) {
            $methodGenerator = new MethodGenerator();
            $this->runner->run($methodGenerator, $node, $classCode);
            $generator->addMethodFromGenerator($methodGenerator);
        }
    }
}
