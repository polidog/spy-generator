<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Helicon\ObjectTypeParser\ParserInterface;
use Polidog\SpyGenerator\Code\ClassCode;
use Polidog\SpyGenerator\MockProperties;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class SetUpMethod implements Sentence
{
    /**
     * @var ParserInterface
     */
    private $parser;

    public function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    public function __invoke(ClassGenerator $generator, ClassCode $classCode): void
    {
        $methodGenerator = new MethodGenerator();
        $mockProperties = new MockProperties();

        foreach (($this->parser)($classCode->reflection->getName()) as $property => $schema) {
            $mockProperties->add($property, $schema['type']);
        }

        $methodGenerator->setName('setUp');
        $methodGenerator->setBody($mockProperties->generateMockCode());
        $methodGenerator->setReturnType('void');
        $methodGenerator->setFlags(MethodGenerator::FLAG_PUBLIC);
        $generator->addMethodFromGenerator($methodGenerator);
    }
}
