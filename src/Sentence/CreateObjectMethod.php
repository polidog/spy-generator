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
        $methodGenerator = new MethodGenerator();
        $methodGenerator->setName('createObject');
        $classCode->properties->createObject($classCode->reflection);
//        $classCode->reflection->getConstructor();
    }
}
