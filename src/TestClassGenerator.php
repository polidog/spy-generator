<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Helicon\ObjectTypeParser\Parser;
use PHPUnit\Framework\TestCase;
use Polidog\SpyGenerator\Sentence\SetUpMethod;
use Polidog\SpyGenerator\Sentence\UseSentence;
use Zend\Code\Generator\ClassGenerator;

class TestClassGenerator implements Generator
{
    public function generate(string $className, ?string $namespace = null): string
    {
        $testClass = new ClassGenerator();
        $refClass = new \ReflectionClass($className);
        $code = file_get_contents($refClass->getFileName());
        $ast = new Ast($code);

        // generate code.
        (new UseSentence($ast))($testClass);
        (new SetUpMethod($className, new Parser()))($testClass);

        $testClass->addUse(TestCase::class);
        $testClass->setName($className.'Test')
            ->setNamespaceName($namespace)
            ->setExtendedClass(TestCase::class)
            ;

        return $testClass->generate();
    }
}
