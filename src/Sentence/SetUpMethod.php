<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Helicon\ObjectTypeParser\ParserInterface;
use Polidog\SpyGenerator\MockProperties;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class SetUpMethod
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var ParserInterface
     */
    private $parser;

    public function __construct(string $className, ParserInterface $parser)
    {
        $this->className = $className;
        $this->parser = $parser;
    }

    public function __invoke(ClassGenerator $generator): void
    {
        $methodGenerator = new MethodGenerator();
        $mockProperties = new MockProperties();

        foreach (($this->parser)($this->className) as $property => $schema) {
            $mockProperties->add($property, $schema['type']);
        }

        $methodGenerator->setName('setUp');
        $methodGenerator->setBody($mockProperties->generateMockCode());
        $methodGenerator->setReturnType('void');
        $methodGenerator->setFlags(MethodGenerator::FLAG_PUBLIC);
        $generator->addMethodFromGenerator($methodGenerator);
    }
}
