<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use PHPUnit\Framework\TestCase;
use Polidog\SpyGenerator\Code\ClassCode;
use Zend\Code\Generator\ClassGenerator;

class ClassName implements Sentence
{
    public function __invoke(ClassGenerator $generator, ClassCode $classCode): void
    {
        $generator->setName($classCode->reflection->getShortName().'Test');
        $generator->setExtendedClass(TestCase::class);
    }
}
