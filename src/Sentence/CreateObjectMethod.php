<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Polidog\SpyGenerator\Code\ClassCode;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class CreateObjectMethod implements Sentence
{
    public function __invoke(ClassGenerator $generator, ClassCode $classCode): void
    {
        $generator->addUse($classCode->reflection->getName());

        $methodGenerator = new MethodGenerator();
        $methodGenerator->setName('createObject');
        $methodGenerator->setFlags(MethodGenerator::FLAG_PRIVATE);
        $methodGenerator->setReturnType($classCode->reflection->getName());

        $codes = [];
        $revealCodes = $classCode->properties->revealCodes();
        foreach ($classCode->reflection->getConstructor()->getParameters() as $parameter) {
            $codes[] = $revealCodes[$parameter->getName()];
        }
        $methodGenerator->setBody(sprintf('return new %s(%s);', $classCode->reflection->getShortName(), implode(',', $codes)));
        $generator->addMethodFromGenerator($methodGenerator);
    }
}
