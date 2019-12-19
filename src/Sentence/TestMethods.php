<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Polidog\SpyGenerator\Code\ClassCode;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class TestMethods implements Sentence
{
    public function __invoke(ClassGenerator $generator, ClassCode $classCode): void
    {
        $methodNodes = $classCode->ast->methods();
        foreach ($methodNodes as $node) {
            $methodGenerator = new MethodGenerator();
            $methodGenerator->setName('test'.ucfirst((string) $node->name));
            $methodGenerator->setReturnType('void');
            $generator->addMethodFromGenerator($methodGenerator);
        }
    }
}
