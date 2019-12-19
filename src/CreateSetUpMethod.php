<?php

declare(strict_types=1);

namespace Polidog\UnitTestGenerator;

use Helicon\ObjectTypeParser\Parser;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class CreateSetUpMethod
{
    public function __invoke(ClassGenerator $classGenerator, string $className)
    {
        $generator = new MethodGenerator();
        $mockProperties = new MockProperties();

        foreach ((new Parser())($className) as $property => $schema) {
            $classGenerator->addUse($schema['type']);
            $mockProperties->add($property, $schema['type']);
        }

        $generator->setName('setUp');
        $generator->setBody($mockProperties->generateMockCode());
        $generator->setReturnType('void');
        $generator->setFlags(MethodGenerator::FLAG_PUBLIC);
        $classGenerator->addMethodFromGenerator($generator);
    }
}
