<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class CreateTestMethod
{
    /**
     * @var \ReflectionClass
     */
    private $refClass;

    public function __construct(\ReflectionClass $refClass)
    {
        $this->refClass = $refClass;
    }

    public function __invoke(ClassGenerator $generator)
    {
        foreach (array_filter($this->refClass->getMethods(), function (\ReflectionMethod $method) {
            return !$method->isConstructor();
        }) as $method) {
            $generator->addMethodFromGenerator($this->createTestMethod($method));
        }
    }

    private function createTestMethod(\ReflectionMethod $method): MethodGenerator
    {
        $methodName = 'test'.ucfirst($method->getName());
        $generator = new MethodGenerator();
        $generator->setName($methodName);

        return $generator;
    }
}
