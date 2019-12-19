<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Helicon\ObjectTypeParser\Parser;
use PHPUnit\Framework\TestCase;
use Polidog\SpyGenerator\Sentence\SetUpMethod;
use Polidog\SpyGenerator\Sentence\TestMethods;
use Polidog\SpyGenerator\Sentence\UseSentence;
use Zend\Code\Generator\ClassGenerator;

class ClassSpyGenerator implements SpyGenerator
{
    public function generate(string $className, ?string $namespace = null): string
    {
        $classGenerator = new ClassGenerator();
        $refClass = new \ReflectionClass($className);
        $code = file_get_contents($refClass->getFileName());
        $ast = new Ast($code);

        // generate code.
        (new UseSentence($ast))($classGenerator);
        (new SetUpMethod($className, new Parser()))($classGenerator);
        (new TestMethods($ast))($classGenerator);

        $classGenerator->addUse(TestCase::class);
        $classGenerator->setName($className.'Test')
            ->setNamespaceName($namespace)
            ->setExtendedClass(TestCase::class)
            ;

        return $classGenerator->generate();
    }
}
