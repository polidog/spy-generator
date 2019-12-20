<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Polidog\SpyGenerator\Code\ClassCode;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class SetUpMethod implements Sentence
{
    public function __invoke(ClassGenerator $generator, ClassCode $classCode): void
    {
        $methodGenerator = new MethodGenerator();

        $methodGenerator->setName('setUp');
        $methodGenerator->setBody($classCode->properties->prophesizeCode());
        $methodGenerator->setReturnType('void');
        $methodGenerator->setFlags(MethodGenerator::FLAG_PUBLIC);
        $generator->addMethodFromGenerator($methodGenerator);
    }
}
