<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use PHPUnit\Framework\TestCase;
use Zend\Code\Generator\ClassGenerator;

class TestClassGenerator implements Generator
{
    public function generate(string $className, ?string $namespace = null): string
    {
        $testClass = new ClassGenerator();
        $refClass = new \ReflectionClass($className);
        (new CreateSetUpMethod())($testClass, $className);
        (new CreateTestMethod($refClass))($testClass);

        $testClass->setName($className.'Test')
            ->setNamespaceName($namespace)
            ->setExtendedClass(TestCase::class)
            ;

        return $testClass->generate();
    }
}
