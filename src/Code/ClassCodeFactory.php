<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Code;

use Helicon\ObjectTypeParser\ParserInterface;

class ClassCodeFactory
{
    /**
     * @var ParserInterface
     */
    private $parser;

    public function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @throws \ReflectionException
     */
    public function __invoke(string $className): ClassCode
    {
        $reflection = new \ReflectionClass($className);
        $ast = new Ast(file_get_contents($reflection->getFileName()));
        $mockProperties = new Properties();
        foreach (($this->parser)($reflection->getName()) as $property => $schema) {
            $mockProperties->add($property, $schema['type']);
        }

        return new ClassCode($reflection, $ast, $mockProperties);
    }
}
